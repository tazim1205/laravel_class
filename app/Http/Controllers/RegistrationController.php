<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('Frontend.registration.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        // dd($request->all());

        // query builder


        // $insert = DB::table('student_info')->insert([
        //     'name'=>$request->name,
        //     'father_name'=>$request->father_name,
        //     'mother_name'=>$request->mother_name,
        //     'phone'=>$request->phone,
        //     'email'=>$request->email,
        //     'address'=>$request->address,
        // ]);
        $insert = DB::table('student_info')->insert($request->except('_token'));
        if($insert)
        {
            return redirect()->back()->with('success','Data insert succeessfUlly');
        }
        else{
            return redirect()->back()->with('error','Data insert UnsucceessfUlly');
        }
    }
}
