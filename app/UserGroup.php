<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
	protected $fillable = [
        'user_id',
		'group_id',
		'permission',
    ];
}
