<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Inspect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectController extends Controller
{
    public function index()
    {
        $inspects = Inspect::where('engineerId',Auth::user()->id)->get();
        return view('engineer.view',compact('inspects'));
    }


    public function store(Request $request, $id)
    {
        $inspect = Inspect::find($id);
        $inspect->status = $request->status;
        $inspect->comment = $request->comment;
        $inspect->save();
        return redirect()->route('engineer.inspect.index');

    }

    public function show($id)
    {
        $inspect = Inspect::find($id);
        return view('engineer.show',compact('inspect'));
    }
}
