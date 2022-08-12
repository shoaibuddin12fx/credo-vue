<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //

    public function importView(Request $request){

        return view('/vendor/voyager/students/import');

    }
}
