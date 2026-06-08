<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'nip',
        'subject',
        'addres'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
