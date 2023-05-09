<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\Jobs\SendStudentRegistrationEmail;
//use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    //
    public function exportStudent()
    {
        //dd('export');
        return Excel::download(new StudentsExport, 'students.xlsx');
    }

    public function importStudent(Request $request)
    {
        //dd('import');
        // Excel::import(new StudentsImport, $request->file('file'));
        $file = $request->file('file');
        $students = Excel::toArray(new StudentsImport, $request->file('file'))[0];

        foreach ($students as $studentData) {
            $student = new Student([
                'name' => $studentData[0],
                'email' => $studentData[1],
                'phone' => $studentData[2],
            ]);
            $student->save();
            //dispatch(new SendStudentRegistrationEmail($student));
            dispatch(new SendStudentRegistrationEmail($student))->onQueue('emails');
        }

        return redirect()->route('students.index');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user =  Student::latest()->get();
            // dd($user);

            return DataTables::of($user)->make(true);
        }
        return view('students');
    }
}
