<?php

namespace App;

use App\Candidate;
use App\Category;
use App\Company;
use App\Job;
use App\JobType;
use App\Province;
use App\Sector;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
	use SoftDeletes;
	
    protected $table = "jobs";
    protected $guarded = ['id'];

    protected $withCount = ['candidates'];

    const PUBLISHED = 1;
    const PENDING = 2;
    const REJECTED = 3;

    const APPLIED = 1;
    const REVIEWED = 2;

    public function getRouteKeyName() {
		return 'slug';
	}

	public function subcategory () {
		return $this->belongsTo(Subcategory::class);
	}

	public function province () {
		return $this->belongsTo(Province::class)->select('id', 'department_id', 'province');
	}

	public function company () {
		return $this->belongsTo(Company::class);
	}

	public function candidates () {
    	return $this->belongsToMany(Candidate::class);
    }

    public function jobType () {
		return $this->belongsTo(JobType::class);
	}

    public function relatedJobs () {
		return Job::with('company', 'province')
			->whereSubcategoryId($this->subcategory_id)
			->where('id', '!=', $this->id)
			->latest()
			->limit(2)
			->get();
	}

	public function publishedDate()
	{
		if (Carbon::now()->diffInHours($this->created_at) < 24) {
			return "Hace ".Carbon::now()->diffInHours($this->created_at)." horas";
		}else{
			return "Hace ".Carbon::now()->diffInDays($this->created_at)." días";
		}
	}

	public function status()
	{
		switch ($this->status) {
			case Job::PUBLISHED:
				return  'Publicado';
				break;

			case Job::PENDING:
				return 'Pendiente';
				break;

			case Job::REJECTED:
				return 'Rechazado';
				break;

			default:
				return 'Expirado';
				break;
		}
	}
}
