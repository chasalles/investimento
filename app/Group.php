<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\{Instituition, Moviment, User};

class Group extends Model
{
	protected $fillable = [
        'name',
		'user_id',
		'instituition_id',
    ];

    public function user(){
    	return $this->belongsTo(User::class);
    }    

    public function users(){
        return $this->belongsToMany(User::class, 'user_groups');
    }

	public function instituition(){
    	return $this->belongsTo(Instituition::class);
    }

    public function moviments(){
        return $this->hasMany(Moviment::class);
    }

    public function getTotalValueAttribute()
    {
        return $this->moviments()->applications()->sum('value') - $this->moviments()->outflows()->sum('value');
    }
}
