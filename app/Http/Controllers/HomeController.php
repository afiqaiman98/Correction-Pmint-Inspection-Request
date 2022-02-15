<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use App\Models\Form;
use App\Models\Request as ModelsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='0')
            {
                return view('user.home');
            }
            else
            {
                return view('admin.home');
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }

        else
        {
            return view('user.home');

        }
    }

    public function request()
    {
        // $engineer = Engineer::all();
        return view('user.request');
    }

    public function upload(Request $request)
    {
        $form = new Form;
        
        $form->serial=$request->serial;
        $form->location=$request->location;
        $form->date=$request->date;
        $form->name=$request->name;
        $form->company=$request->company;
        $form->status='In Progress';

        $image=$request->file;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('signatureimage',$imagename);
        $form->file=$imagename;
        

        if(Auth::id())
        {
            $form->user_id=Auth::user()->id;
        }

        $form->save();
        return redirect()->back()->with('message','Inspection has been requested');
        
    }

    public function viewstatus()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $inspect=Form::where('user_id',$userid)->get();
            return view('user.viewstatus',compact('inspect'));
        }
    }

    public function deleterequest($id)
    {
        $form = Form::find($id);
        $form->delete();
        return redirect()->back();
    }
}
