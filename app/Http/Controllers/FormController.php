<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\form_design;

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

        $validated = $request->validate([
            'student_name' => 'required|unique:form_designs',
            'fathers_name' => 'required', 
            'mothers_name' => 'required', 
            'fees' => 'required', 
            'status' => 'required', 
        ],[
            'student_name.required'=>'ছাত্র/ছাত্রীর নাম দিন',
            'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
            'fathers_name.required'=>'পিতার নাম দিন',
            'mothers_name.required'=>'মাতার নাম দিন',
            'fees.required'=>'ফিস উল্লেখ করুন',
            'status.required'=>'স্টেটাস দিন',
        ]);

        $insert = form_design::create($request->except('_token'));
        

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
