<?php

namespace App\Http\Controllers;

use App\Category;
use App\Department;
use App\Helpers\Helper;
use App\Http\Requests\PostRequest;
use App\Job;
use App\Province;
use App\Subcategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jobs = Job::orderBy('created_at')->paginate(10);
        return view('job.list', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load([
            'company' => function ($q) {
                $q->select('id', 'user_id', 'title', 'links', 'biography', 'slug');
            },
            'province' => function ($q) {
                $q->select('id', 'department_id', 'province');
            },
            'province.department',
            'company.user',
            'jobType'
        ])->get();

        $related = $job->relatedJobs();

        return view('job.show', compact('job', 'related'));
    }

    public function categories()
    {
        $categories = Category::with('subcategories')->get();
        return view('category.index', compact('categories'));
    }

    public function jobByCategory(Category $category)
    {
        $subcategories_array = Subcategory::whereCategoryId($category->id)
                                            ->get()
                                            ->map
                                            ->only(['id']);
        $subcategories = Helper::dataToArray($subcategories_array);
        $jobs = Job::orderBy('created_at')
                        ->whereIn('subcategory_id', $subcategories)
                        ->paginate(10);
        return view('job.list', compact('jobs'));
    }

    public function jobBySubcategory($subcategories)
    {
        if ($subcategories == 'all') {
            $jobs = Job::orderBy('created_at')
                        ->paginate(10);
        }else{
            $subcategories = explode( '-', $subcategories );
            $jobs = Job::orderBy('created_at')
                        ->whereIn('subcategory_id', $subcategories)
                        ->paginate(10);
        }
        return view('job.list', compact('jobs'));
    }

    public function jobByDepartment(Department $department)
    {
        $provinces_array = Province::whereDepartmentId($department->id)
                                            ->get()
                                            ->map
                                            ->only(['id']);
        $provinces = Helper::dataToArray($provinces_array);
        $jobs = Job::orderBy('created_at')
                        ->whereIn('province_id', $provinces)
                        ->paginate(10);
        return view('job.list', compact('jobs'));
    }

    public function jobByType($type)
    {
        if ($type == 'all') {
            $jobs = Job::orderBy('created_at')
                        ->paginate(10);
        }else{
            $types = explode( '-', $type );
            $jobs = Job::orderBy('created_at')
                        ->whereIn('job_type_id', $types)
                        ->paginate(10);
        }
        
        return view('job.list', compact('jobs'));
    }

    public function keywordCategoryPost(Request $request)
    {
        if ($request['category_id'] != null) {
            $category = Category::whereId($request['category_id'])->first();
            if ($request['keyword'] != null) {
                return redirect()->route('job.keyword.category.get', 
                    ['keyword' => $request['keyword'],'category' => $category->slug]);
            }else{
                return redirect()->route('job.by.category', $category->slug);
            }
        }else{
            if ($request['keyword'] != null) {
                return redirect()->route('job.keyword.get', $request['keyword']);
            }else{
                return redirect()->route('job.index');
            }
        }
    }

    public function keywordCategoryGet($keyword, Category $category)
    {
        $subcategories_array = Subcategory::whereCategoryId($category->id)
                                            ->get()
                                            ->map
                                            ->only(['id']);
        $subcategories = Helper::dataToArray($subcategories_array);
        $jobs = Job::orderBy('created_at')
                        ->where('description', 'like', '%'.$keyword.'%')
                        ->whereIn('subcategory_id', $subcategories)
                        ->paginate(10);
        return view('job.list', compact('jobs'));
    }

    public function keywordGet($keyword, Request $request)
    {
        $jobs = Job::orderBy('created_at')
                        ->where('description', 'like', '%'.$keyword.'%')
                        ->paginate(10);
        return view('job.list', compact('jobs'));
                        // return $request->session()->all();
    }

    public function searchAyax()
    {
        if (!request()->ajax()) {
            return back();
        }

        $data = \request('data');

        switch ($data['title']) {
            case "category":
                $category = Category::whereId($data['value'])->first();
                $url = route('job.by.category', $category->slug);
                break;
            case "subcategory":
                if (isset($data['value'])) {
                    $types = implode("-", $data['value']);
                }else{
                    $types = 'all';
                }
                $url = route('job.by.subcategory', $types);
                break;
            case "date":
                return $data['value'];
                break;
            case "type":
                if (isset($data['value'])) {
                    $types = implode("-", $data['value']);
                }else{
                    $types = 'all';
                }
                $url = route('job.by.type', $types);
                break;
            case "department":
                $department = Department::whereId($data['value'])->first();
                $url = route('job.by.department', $department->slug);
                break;
            default:
                return 'nothing';
        }

        return $url;
    }

    public function store(PostRequest $request)
    {
        $request->merge(['company_id' => auth()->user()->company->id ?: 0 ]);   
        $request->merge(['slug' => str_slug($request['title'], '-')]);
        $input = $request->except(['category_id', 'department_id']);
        Job::create($input);
        return back()->with('message', ['status' => 'success', 'message' => "El anuncio de empleo ha sido creado correctamente"]);
    }

    public function edit(job $job)
    {
        $word = "post";
        $btn = "Actualizar datos";
        return view('partials.dashboard.index', compact('word', 'job', 'btn'));
    }

    public function update(Job $job, PostRequest $request)
    {
        $input = $request->except(['category_id', 'department_id']);
        $job->fill($input)->save();
        return back()->with('message', ['status' => 'success', 'message' => "El anuncio de empleo ha sido editado correctamente"]);
    }

    public function delete(job $job)
    {
        $job->delete();
        return back()->with('message', ['status' => 'success', 'message' => "El anuncio de empleo ha sido correctamente eliminado"]);
    }

    public function secondAjax()
    {
        if (!request()->ajax()) {
            return back();
        }
        
        $data = \request('data');

        switch ($data['title']) {
            case "department":
                $data = Province::whereDepartmentId($data['value'])->orderBy('province')->get();
                break;
            case "category":
                $data = Subcategory::whereCategoryId($data['value'])->orderBy('subcategory')->get();
                break;
            default:
                return 'nothing';
        }
        return $data;
    }
}
