<?php

namespace App;

use App\Offert;
use App\Subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = ['id'];

    public function offerts () {
		return $this->hasMany(Offert::class);
	}

	public function subcategories () {
		return $this->hasMany(Subcategory::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}
}
