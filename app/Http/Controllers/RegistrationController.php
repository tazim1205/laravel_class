<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\student_info;

class RegistrationController extends Controller
{
    public function index()
    {
        // query builder
        // $data = DB::table('student_infos')->get();

        // orm 
        $data = student_info::all();

        $sl = 1;
        // return $data;
        return view('Frontend.Registration.index',compact('data','sl'));
    }
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
        
        // $insert = DB::table('student_infos')->insertGetId($request->except('_token'));

        $insert = student_info::create($request->except('_token'));


        $file = $request->file('image');

        $id = $insert->id;

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Frontend/studentImage/',$imageName);

            DB::table('student_infos')->where('id',$id)->update(['image'=>$imageName]);

        }




        if($insert)
        {
            return redirect('/view_data')->with('success','Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Insert Unsuccessfull');
        }



        //elequent orm
    }

    public function edit($id)
    {
        // quer bulider
        // $data = DB::table('student_infos')->where('id',$id)->first();
        

        // orm 
        $data = student_info::find($id);
        

        // return $data;

        // return $data;
        
        return view('Frontend.Registration.edit',compact('data'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'student_name' => 'required',
            'fathers_name' => 'required', 
            'mothers_name' => 'required', 
            'fees' => 'required', 
            'status' => 'required', 
        ],[
            'student_name.required'=>'ছাত্র/ছাত্রীর নাম দিন',
            // 'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
        ]);

        // query builder
        // $update = DB::table('student_infos')->where('id',$id)->update($request->except('_token'));

        //orm
        $file = $request->file('image');

        if($file)
        {
            $pathImage = student_info::find($id);

            $path = public_path().'/Frontend/studentImage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }

        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();

            $file->move(public_path().'/Frontend/studentImage/',$imageName);

            DB::table('student_infos')->where('id',$id)->update(['image'=>$imageName]);

        }


        $update = student_info::find($id)->update($request->except('_token','image'));


        if($update)
        {
            return redirect()->back()->with('success','Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Update Unsuccessfull');
        }
    }

    public function delete($id)
    {
        // query builder

        $pathImage = student_info::find($id);

        $path = public_path().'/Frontend/studentImage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = DB::table('student_infos')->where('id',$id)->delete();

        //orm
        // $delete = student_info::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success','Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error','Data Delete Unsuccessfull');
        }
    }
}
