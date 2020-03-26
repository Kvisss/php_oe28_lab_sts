<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'description',
        'image',
        'creator_id',
        'time',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, Subject::class);
    }

    public function users()
    {

    }
}
