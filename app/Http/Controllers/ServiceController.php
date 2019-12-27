<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
	public function index()
	{
		$services = Service::latest()->paginate(12);

		return view('service.index', compact('services'));
	}

    public function redirect(Request $request)
    {

        $url = "/search/".$request['word']."/".$request['location_id'];
        
        return redirect($url);
    }

    public function search($word, $location)
    {
        $services = Service::where('location_id', $location)
                            ->where('description', 'like', "%".$word."%")
                            ->orWhere('title', 'like', "%".$word."%")
                            ->paginate(12);

        return view('service.index', compact('services'));
    }

    public function show(Service $service )
    {
        $service->load([
            'company' => function ($q) {
                $q->select('id', 'user_id', 'title', 'website', 'biography', 'slug');
            },
            'company.user'
        ])->get();

        $related = $service->relatedServices();

        return view('service.show', compact('service', 'related'));
    }
}
