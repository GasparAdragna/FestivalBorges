<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Speaker;
use App\Festival;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oradores = Speaker::all();
        $festivals = Festival::all();
        return view('activity.create', compact('oradores', 'festivals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'speaker_id' => 'required',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
            'festival_id' => 'required'
        ]);
        $speaker = Speaker::find($request->speaker_id);
        Activity::create($request->all() + ['speaker' => $speaker->first_name.' '.$speaker->last_name]);
        return redirect()->back()->with('status', 'Se creó correctamente la actividad');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $oradores = Speaker::all();
        $festivals = Festival::all();
        return view('activity.edit', compact('activity', 'oradores', 'festivals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'speaker_id' => 'required',
            'description' => 'required|string',
            'date' => 'required|date',
            'activity' => 'required|string',
            'festival_id' => 'required'
        ]);
        $activity->update($request->all());
        return redirect()->back()->with('status', 'Se actualizó correctamente la actividad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->back()->with('status', 'Se eliminó correctamente la actividad');
    }
}
