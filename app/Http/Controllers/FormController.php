<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\form_design;

class FormController extends Controller
{
    public function index()
    {
        // query builder
        // $data = DB::table('form_designs')->get();

        // orm
        $data = form_design::all();
        // get

        $sl = 1;

        return view('Form.index',compact('data','sl'));
    }
    
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

        
        // $insert = DB::table('form_designs')->insertGetId($request->except('_token'));
        
        $insert = form_design::create($request->except('_token'));

        $file = $request->file('image');

        $id = $insert->id;
        
        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            
            $file->move(public_path().'/Frontend/formimage/',$imageName);
            
            DB::table('form_designs')->where('id',$id)->update(['image'=>$imageName]);
        }
        
        

        if($insert)
        {
            return redirect('/view_form')->with('success', 'Data Insert Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Insert Unsuccessfull');
        }


        // Elequent Orm
    }

    // edit
    public function edit($id)
    {
        // query builder
        // $data = DB::table('form_designs')->where('id',$id)->first();

        // orm
        $data = form_design::find($id);

        return view('Form.edit',compact('data'));
    }

    // update
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
            'student_name.unique'=>'এই নাম দ্বারা রেজিষ্ট্রেশন সম্পন্ন হয়েছে',
            'fathers_name.required'=>'পিতার নাম দিন',
            'mothers_name.required'=>'মাতার নাম দিন',
            'fees.required'=>'ফিস উল্লেখ করুন',
            'status.required'=>'স্টেটাস দিন',
        ]);

        // query builder
        // $update = DB::table('form_designs')->where('id',$id)->update($request->except('_token'));

        // orm
        
        $file = $request->file('image');
        
        if($file)
        {
            $pathImage = form_design::find($id);

            $path = public_path().'/Frontend/formimage/'.$pathImage->image;

            if(file_exists($path))
            {
                unlink($path);
            }
        }

        if($file)
        {
            $imageName = rand().'.'.$file->getClientOriginalExtension();
            
            $file->move(public_path().'/Frontend/formimage/',$imageName);
            
            DB::table('form_designs')->where('id',$id)->update(['image'=>$imageName]);
        }
        
        $update = form_design::find($id)->update($request->except('_token','image'));

        
        if($update)
        {
            return redirect()->back()->with('success', 'Data Update Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Update Unsuccessfull');
        }
    }
    
    // delete
    public function delete($id)
    {
        // query builder

        $pathImage = form_design::find($id);

        $path = public_path().'/Frontend/formimage/'.$pathImage->image;

        if(file_exists($path))
        {
            unlink($path);
        }

        $delete = DB::table('form_designs')->where('id',$id)->delete();

        // orm
        // $delete = form_design::find($id)->delete();

        if($delete)
        {
            return redirect()->back()->with('success', 'Data Delete Successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Data Delete Unsuccessfull');
        }
    }
}
