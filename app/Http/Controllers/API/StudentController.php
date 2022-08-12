<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Reason;
use App\Models\StudentAffairForm;
use Carbon\Carbon;

class StudentController extends Controller
{
    //

    public function studentAffairStudentList(Request $request){

        $students = Student::all();
        return self::success("Student List", ["data" => $students ]);

    }

    public function studentAffairReasonList(Request $request){
        $reason = Reason::all();
        return self::success("Reason List", ["data" => $reason ]);
    }

    public function submitStudentAffairsForm(Request $request){
        $data = $request->all();


        $affairForm = new StudentAffairForm();

        $affairForm->student_id =  $data['student_id'];
        $affairForm->reason_id =  $data['reason_id'];
        $affairForm->due_date =  Carbon::parse($data['due_date']);
        $affairForm->parent_concern =  $data['parent_concern'];
        $affairForm->reason_from_student =  $data['reason_from_student'];
        $affairForm->remarks =  $data['remarks'];
        $affairForm->created_by = auth()->user()->id;

        $affairForm->save();

        // send a push notification to two department teams 


        return self::success("Reason Added", ["data" => $affairForm ]);
    }
}
