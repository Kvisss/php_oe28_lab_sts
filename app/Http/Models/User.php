<?php

namespace App\Http\Models;

use Illuminate\Foundation\Auth\User as Users;
//use Illuminate\Database\Eloquent\Model as User;

class User extends Users
{
    protected $table = 'users';
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'phone',
        'avatar',
        'role_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('start_time', 'end_time', 'status');
    }

}
