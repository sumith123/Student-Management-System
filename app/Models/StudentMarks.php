<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','student_term','maths_mark','science_mark','history_mark'];
}
