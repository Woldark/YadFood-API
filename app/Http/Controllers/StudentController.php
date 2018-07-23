<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{


    public function login2(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');

        $student = Student::where("student_id", $username)->first();
        if ($student) {
            if ($student->password == $password)
                return response()->json([
                    'error' => false
                ], 200);
            else
                return response()->json([
                    'error' => true,
                    'error_msg' => 'خطا بوجود آمده است!!'
                ], 200);
        } elseif ($student2 = Student::where("food_id", $username)->first()) {
            if ($student2->password == $password)
                return response()->json([
                    'error' => false
                ], 200);
            else
                return response()->json([
                    'error' => true,
                    'error_msg' => 'خطا بوجود آمده است!!'
                ], 200);
        } else
            return response()->json([
                'error' => true,
                'error_msg' => 'خطا بوجود آمده است!!'
            ], 200);
    }

    public function register(Request $request)
    {
        $students = $request->get('students');
        foreach ($students as $student)
            new Student($student);
        return response()->json([
            'error' => false
        ], 200);
    }
}