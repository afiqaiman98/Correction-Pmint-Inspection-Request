<?php

namespace App\Http\Controllers\Engineer;

use App\Http\Controllers\Controller;
use App\Models\Inspect;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectController extends Controller
{
    public function index()
    {
        $inspects = Inspect::where('engineerId', Auth::user()->id)->get();
        return view('engineer.view', compact('inspects'));
    }


    public function store(Request $request, $id)
    {
        $inspect = Inspect::find($id);
        $inspect->status = $request->status;
        $inspect->comment = $request->comment;
        $inspect->save();

        $timeline = new Timeline();
        $timeline->creator_id = Auth::user()->id;
        $timeline->inspect_id = $inspect->id;
        $timeline->remark = $request->comment;
        $timeline->description = 'Inspection has been ' . strtolower($request->status);
        $timeline->save();

        return redirect()->route('engineer.inspect.index');

    }

    public function show($id)
    {
        $inspect = Inspect::find($id);
        return view('engineer.show', compact('inspect'));
    }

    public function timeline($id)
    {
        $timelines = Timeline::where('inspect_id', $id)->get();
        return view('admin.status.timeline', compact('timelines'));
    }
}
