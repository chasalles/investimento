<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituition extends Model
{
    protected $fillable = [
        'name',
    ];

    public function group()
    {
    	return $this->hasMany(Group::class);
    }

    public function products(){
    	return $this->hasMany(Product::class);
    }
}
