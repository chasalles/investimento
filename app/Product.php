<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
		'instituition_id',
		'name',
		'description',
		'index',
		'interest_rate',
    ];

	public function instituition(){
    	return $this->belongsTo(Instituition::class);
    }

    public function valueFromUser(User $user)
    {
		$inflows = $this->moviments()->product($this)->applications()->sum('value');
		$outflows = $this->moviments()->product($this)->outflows()->sum('value');

    	return $inflows - $outflows;
    }

    public function moviments()
    {
    	return $this->hasMany(Moviment::class);
    }
}
