<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Exports\StudentsExport;
use App\Imports\StudentsImport;
use App\User;
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
        Excel::import(new StudentsImport, $request->file('file'));
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
