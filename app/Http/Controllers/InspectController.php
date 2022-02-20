<?php

namespace App\Http\Controllers;

use App\Models\Inspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid = Auth::user()->id;
        $inspect = Inspect::where('user_id', $userid)->get();
        return view('user.inspect.view', compact('inspect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.inspect.request');
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
            'file' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            // 'image' => ['required'],
        ]);

        $inspect = new Inspect();
        $inspect->serial = $request->serial;
        $inspect->location = $request->location;
        $inspect->date = $request->date;
        $inspect->name = $request->name;
        $inspect->company = $request->company;
        $inspect->status = 'In Progress';
        $image = $request->file;
        $imagename = md5(microtime()) . '.' . $image->getClientOriginalExtension();
        $request->file->move('signatureimage', $imagename);
        $inspect->file = $imagename;
        $inspect->user_id = Auth::user()->id;
        $inspect->save();
        return redirect()->back()->with('message', 'Inspection has been requested');
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
        $inspects = Inspect::find($id);
        $inspects->delete();
        return redirect()->route('inspect.index');
    }
}
