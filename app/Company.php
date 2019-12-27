<?php

namespace App;

use App\Job;
use App\Offert;
use App\Province;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id', 'title', 'biography', 'links', 'address', 'slug', 'sector_id', 'phone', 'province_id'
    ];

    protected $withCount = ['jobs'];

    public function jobs () {
		return $this->hasMany(Job::class);
	}

	public function user () {
		return $this->belongsTo(User::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}

	public function province () {
		return $this->belongsTo(Province::class);
	}

	public function sector () {
		return $this->belongsTo(Sector::class);
	}
}
