<?php

namespace App\Http\Controllers\API;

use App\Libraries\JDF;
use Illuminate\Routing\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function login(Request $request)
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

    public function index()
    {
        $students = Student::all();

        return response()->json([
            'error' => false,
            'students' => $students
        ], 200);
    }

    public function show($student)
    {
        $student = Student::find($student);

        return response()->json([
            'error' => false,
            'student' => $student
        ], 200);
    }

    public function store(Request $request)
    {

        $name = $request->get('name');
        $student_id = $request->get('student_id');
        $food_id = $request->get('food_id');

        $student = new Student();

        $jdf= new JDF();

        $student->name = $name;
        $student->student_id = $student_id;
        $student->food_id = $food_id;
        $student->password = $food_id;
        $student->create_date = $jdf->getTimestamp();
        $student->save();

        if ($student)
            return response()->json([
                'error' => false
            ], 200);
        else
            return response()->json([
                'error' => true,
                'error_msg' => 'خطا بوجود آمده است !!'
            ], 200);
    }

    public function update(Request $request, $student)
    {
        $name = $request->get('name');
        $student_id = $request->get('student_id');
        $food_id = $request->get('food_id');

        $student = Student::find($student);

        $student->name = $name;
        $student->student_id = $student_id;
        $student->food_id = $food_id;

        $student->save();

        return response()->json([
            'error' => false
        ], 200);


    }

}