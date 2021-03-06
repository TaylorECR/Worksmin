<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category () {
		return $this->belongsTo(Category::class);
	}

	public function getRouteKeyName() {
		return 'slug';
	}
}
