<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAffairForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'reason_id',
        'due_date',
        'parent_concern',
        'reason_from_student',
        'remarks',
        'created_by'

    ];
}
