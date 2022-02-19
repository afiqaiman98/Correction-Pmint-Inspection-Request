<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=Auth::user()->id;
            $form=Form::where('user_id',$userid)->get();
            return view('user.viewstatus',compact('form'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.request');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial' => ['required', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'date' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'file' => ['required','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            // 'image' => ['required'],
        ]);

        $form = new Form;
        $form->serial=$request->serial;
        $form->location=$request->location;
        $form->date=$request->date;
        $form->name=$request->name;
        $form->company=$request->company;
        $form->status='In Progress';
        $image=$request->file;
        $imagename=md5(microtime()).'.'.$image->getClientOriginalExtension();
        $request->file->move('signatureimage',$imagename);
        $form->file=$imagename;
        $form->user_id=Auth::user()->id;
        $form->save();
            return redirect()->back()->with('message','Inspection has been requested');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //How to show list of form request by user???
    public function show(Form $form)
    {
        return view('user.viewstatus')->with('form',$form);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //retrieve form
        $forms = Form::find($id);
        //delete form
        $forms->delete();
        //reroute to form list
        return redirect()->route('form.index');
    }
}
