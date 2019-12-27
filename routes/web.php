<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/images/{path}/{attachment}', function($path, $attachment) {
	$file = sprintf('storage/%s/%s', $path, $attachment);
	if(File::exists($file)) {
		return Image::make($file)->response();
	}
});

Route::get('/', 'HomeController@index')->name('home.index');

/*----------  search  ----------*/

Route::get('/jobs', 'JobController@index')->name('job.index');

// Route::get('/jobs/{word}', 'JobController@word')->name('job.word');

Route::get('/jobs/category/{category}', 'JobController@jobByCategory')->name('job.by.category');

Route::get('/jobs/subcategory/{subcategory}', 'JobController@list')->name('job.list');

Route::get('/{department}/jobs', 'JobController@jobByDepartment')->name('job.by.department');

Route::get('/{department}/jobs/category/{category}', 'JobController@list')->name('job.list');

Route::get('/{department}/jobs/subcategory/{subcategory}', 'JobController@list')->name('job.list');

Route::get('/categories', 'JobController@categories')->name('category.index');

Route::get('/jobs/subcategories/{subcategories}', 'JobController@jobBySubcategory')->name('job.by.subcategory');

Route::post('/search', 'JobController@keywordCategoryPost')->name('job.keyword.category.post');

Route::get('/search/{keyword}/category/{category}', 'JobController@keywordCategoryGet')->name('job.keyword.category.get');

Route::get('/search/{keyword}', 'JobController@keywordGet')->name('job.keyword.get');

Route::get('/date/{date}', 'JobController@date')->name('job.date');

Route::get('/type/{type}', 'JobController@jobByType')->name('job.by.type');


Route::post('/searchAjax', 'JobController@searchAyax')->name('search.ajax');

/*----------  end search  ----------*/


Route::prefix('company')->group(function () {

	Route::get('/register', 'CompanyController@register')->name('company.register');

	Route::get('/job-list/{company}', 'CompanyController@jobs')->name('company.jobs');

	Route::get('/{company}', 'CompanyController@show')->name('company.show');
	
});

Route::post('/secondAjax', 'JobController@secondAjax')->name('second.ajax');

Route::prefix('job')->group(function () {

	Route::get('/free-post', function(){

		return view('job.free-post');

	})->name('job.freePost');

	

	Route::get('/{job}', 'JobController@show')->name('job.show');
});

Route::group(['middleware' => ['auth']], function(){

	Route::prefix('dashboard')->group(function () {

		Route::get('/company/{word?}', 'CompanyController@dashboard')->name('company.dashboard.index')->middleware([sprintf("role:%s", \App\Role::COMPANY)])->where('word', 'dashboard|profile|password|manage|post');

		Route::get('/company/candidates/{job}', 'CompanyController@candidates')->name('company.dashboard.candidates')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);

		Route::get('/candidate/{word?}', 'CandidateController@dashboard')->name('candidate.dashboard.index')->middleware([sprintf("role:%s", \App\Role::CANDIDATE)])->where('word', 'dashboard|profile|password|applications');

		Route::put('/company/password', 'CompanyController@updatePassword')->name('company.password.update')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);

		Route::put('/company/profile', 'CompanyController@updateProfile')->name('company.profile.update')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);
		
		/*=====  JOB CRUD  ======*/

		Route::post('/company/job/store', 'JobController@store')->name('company.job.store')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);
		
		Route::get('/company/job/{job}/edit', 'jobController@edit')->name('company.job.edit')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);

		Route::put('/company/job/{job}/update', 'jobController@update')->name('company.job.update')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);

		Route::delete('/company/job/{job}/delete', 'jobController@delete')->name('company.job.delete')->middleware([sprintf("role:%s", \App\Role::COMPANY)]);

		/*=====  END OF JOB CRUD  ======*/

		Route::put('/candidate/password', 'CandidateController@updatePassword')->name('candidate.password.update')->middleware([sprintf("role:%s", \App\Role::CANDIDATE)]);

		Route::get('/{word}', function($word = 'dashboard'){

			return view('partials.dashboard.index', compact('word'));

		})->name('dashboard.index')->where('word', 'password');
	});


	Route::prefix('candidate')->group(function () {

		Route::put('/profile/{candidate}', 'CandidateController@updateProfile')->name('update.candidate.profile')->middleware([sprintf("role:%s", \App\Role::CANDIDATE)]);
		
	});

	Route::get('/{job}/apply', 'CandidateController@apply')->name('candidate.apply')->middleware([sprintf("role:%s", \App\Role::CANDIDATE)]);	
		
});

Route::post('/fast-mail/{job}', 'CompanyController@fastMail')->name('job.fast_mail');


Route::prefix('admin')->group(function () {

	Route::group(['middleware' => ['auth']], function(){
		Route::get('/', 'AdminController@index')->name('admin.index');
		Route::prefix('company')->group(function () {
			Route::get('/create', 'AdminController@companyCreate')->name('admin.company.create');
			Route::post('/create', 'AdminController@companyStore')->name('admin.company.store');
		});
	});
});