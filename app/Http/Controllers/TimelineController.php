<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function view($inspectId)
    {
        $timelines = Timeline::where("inspectId", $inspectId)->get();
        return view('timeline', compact('timelines'));
    }

    public function store(Request $request)
    {
        $timeline = new Timeline();
        $timeline->inspect_id = $request->inspect_id;
        $timeline->description = $request->description;
        $timeline->creator_id = $request->creator_id;
        $timeline->save();
    }
}
