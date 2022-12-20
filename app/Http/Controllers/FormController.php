<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    public function create()
    {
        return view('Form.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        // dd($request->all());

        // return $request->student_name;

        // Query Builder
        
        // $insert = DB::table('form_design')->insert([
        //     'student_name'=>$request->student_name,
        //     'fathers_name'=>$request->fathers_name,
        //     'mothers_name'=>$request->mothers_name,
        //     'address'=>$request->address,
        //     'fees'=>$request->fees,
        //     'status'=>$request->status,
        // ]);

        // $insert = DB::table('form_design')->insert($request->except('_token'));

        

        


        if($insert)
        {
            return redirect()->back()->with('success', 'Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Insert Unsuccessfull');
        }


        // Elequent Orm
    }
}
