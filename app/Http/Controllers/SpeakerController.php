<?php

namespace App\Http\Controllers;

use App\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SpeakerController extends Controller
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
        return view('speaker.create');
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'location' => 'required|string',
            'bio' => 'required|string',
            'image' => 'required|image',
            'slug' => 'required|string',
        ]);
        $file = $request->file('image');
        $url = $file->store('public/images/perfiles');
        $photo = $file->hashName();
        Speaker::create($request->all() + ['photo' => $photo]);
        return redirect()->back()->with('status', 'Se añadió correctamente al orador');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function show(Speaker $speaker)
    {
      return view('orador')->withSpeaker($speaker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Speaker $speaker)
    {
        return view('speaker.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Speaker $speaker)
    {
        $validate = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'location' => 'required|string',
            'bio' => 'required|string',
            'image' => 'image',
            'slug' => 'required|string',
        ]);

        if($request->file('image')){
            Storage::delete('public/images/perfiles/'.$speaker->photo);
            $file = $request->file('image');
            $file->store('public/images/perfiles');
            $photo = $file->hashName();
            $speaker->update($request->all() + ['photo' => $photo]);
            return redirect()->back()->with('status', 'Se actualizó correctamente el orador');
        }

        $speaker->update($request->all());
        return redirect()->back()->with('status', 'Se actualizó correctamente el orador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Speaker  $speaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speaker $speaker)
    {
        $speaker->delete();
        return redirect()->back()->with('status', 'Se eliminó correctamente el orador');
    }
}
