<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journals extends Model
{
    protected $fillable = [
        'student_id',
        'date',
        'activity',
        'note',
        'status'
    ];

    public function student()
    {
        return $this->belongsTo(Students::class);
    }
}
