<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\student_info;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('Frontend.Registration.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        // dd($request->all());

        //Query Builder


        // $insert = DB::table('student_info')->insert([
        //     'student_name'=>$request->student_name,
        //     'fathers_name'=>$request->fathers_name,
        //     'mothers_name'=>$request->mothers_name,
        //     'address'=>$request->address,
        //     'fees'=>$request->fees,
        //     'status'=>$request->status,
        // ]);


        // $insert = DB::table('student_info')->insert($request->except('_token'));

        $validated = $request->validate([
            'student_name' => 'required|unique:student_infos',
            'fathers_name' => 'required', 
            'mothers_name' => 'required', 
            'fees' => 'required', 
            'status' => 'required', 
        ],[
            'student_name.required'=>'ছাত্র/ছাত্রীর নাম দিন',
            'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
        ]);

        $insert = student_info::create($request->except('_token'));


        if($insert)
        {
            return redirect()->back()->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }



        //elequent orm
    }
}
