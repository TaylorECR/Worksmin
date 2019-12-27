<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proffesional extends Model
{
    protected $table = "proffesionals";
    protected $guarded = ['id'];

	public function user () {
		return $this->belongsTo(App\User::class)->select('id', 'role_id', 'name', 'email');
	}

    public function offerts () {
        return $this->belongsToMany(App\Offert::class);
    }

    public function getRouteKeyName() {
		return 'slug';
	}
}
