<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'roll_no',
        'image',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'father_name',
        'father_email',
        'father_phone_number',

    ];

}
