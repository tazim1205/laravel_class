<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\student_info;

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
        // $insert = DB::table('student_info')->insert($request->except('_token'));
        $validated = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            
        ],[
            'name.required'=> 'student name den',
            'father_name.required'=> 'Bap er nam de',
            'mother_name.required'=> 'tur ma nam de',
            'phone.required'=> 'numbar de rate e call dimu',
            'email.required'=> 'email de ',
        ]);
        $insert = student_info::create($request->except('_token'));
        if($insert)
        {
            return redirect()->back()->with('success','Data insert succeessfUlly');
        }
        else{
            return redirect()->back()->with('error','Data insert UnsucceessfUlly');
        }

        // elequent orm

    }
}
