<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'name',
        'major',
    ];

    public function teachers()
    {
        return $this->belongsTo(
            Teacher::class,
            'teacher_id'
        );
    }

    public function students()
    {
        return $this->hasMany(
            Students::class,
            'class_id'
        );
    }
}
