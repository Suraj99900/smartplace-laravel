<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{

    protected $table = 'student_semester';

    protected $primaryKey = 'id';

    protected $fillable = [
        'semester',
        'status',
        'deleted',
    ];
}
