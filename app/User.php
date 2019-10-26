<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cpf', 'name', 'phone', 'birth', 'gender', 'notes', 'email', 'password', 'status', 'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups(){
        return $this->belongsToMany(Group::class, 'user_groups');
    }

    public function moviments()
    {
        return $this->hasMany(Moviment::class);
    }

    public function setPasswordAtribute($value){
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getFormattedCpfAttribute()
    {
        $cpf = $this->attributes['cpf'];

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 7, 3) . '.' . substr($cpf, -2);
    }

    public function getFormattedPhoneAttribute()
    {
        $phone = $this->attributes['phone'];

        return '(' . substr($phone, 0, 2) . ') ' . substr($phone, 2, 4) . '-' . substr($phone, -4);
    }

    public function getFormattedBirthAttribute()
    {
        $birth = explode('-', $this->attributes['birth']);

        if(count($birth) != 3){
            return "";
        }


        return  $birth[2] . '/' . $birth[1] . '/' . $birth[0];
    }
}
