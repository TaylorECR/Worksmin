<?php

namespace App;

use App\Province;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function provinces () {
		return $this->hasMany(Province::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}
}
