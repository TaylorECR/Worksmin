<?php

namespace App;

use App\Job;
use App\Province;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidates";
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id', 'name', 'last_name', 'proffesional_title', 'biography', 'slug', 'address', 'department_id', 'province_id', 'phone', 'skills', 'languages'
    ];

    public function user () {
		return $this->belongsTo(User::class);
	}

	public function jobs () {
		return $this->belongsToMany(Job::class);
	}

    public function province(){
        return $this->belongsTo(Province::class);
    }
}
