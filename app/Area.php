<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";
    protected $guarded = ['id'];

    public function offerts () {
		return $this->hasMany(Offert::class);
	}
}
