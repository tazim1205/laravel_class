<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student_info;

class StdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = student_info::all();
        $sl=1;
        return view('Frontend.StdForm.index',compact('data','sl'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Frontend.StdForm.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'student_name' => 'required|unique:student_infos',
            'fathers_name' => 'required', 
            'mothers_name' => 'required',  
        ],[
            'student_name.required'=>'ছাত্র/ছাত্রীর নাম দিন',
            'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
        ]);

        $insert = student_info::create($request->except('_token'));

        if($insert)
        {
            return redirect()->back()->with('success','Data insert Done');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Failed');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = student_info::find($id);
        return view('Frontend.StdForm.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->all());
        $validated = $request->validate([
            'student_name' => 'required',
            'fathers_name' => 'required', 
            'mothers_name' => 'required',  
        ],[
            'student_name.required'=>'ছাত্র/ছাত্রীর নাম দিন',
            'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
        ]);

        $insert = student_info::find($id)->update($request->except('_token','_method'));

        if($insert)
        {
            return redirect()->back()->with('success','Data insert Done');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = student_info::find($id)->delete();

        return redirect()->back();
    }
}
