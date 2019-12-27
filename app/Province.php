<?php

namespace App;

use App\Department;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	protected $table = "provinces";
    protected $guarded = ['id'];

    public function department () {
		return $this->belongsTo(Department::class);
	}
}
