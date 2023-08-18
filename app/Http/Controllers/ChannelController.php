<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $channels = Channel::orderBy('channelID', 'desc')->get();

        return view('channels.index', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $channels = new Channel();
            $channels->channelID = $request->channelID;
            $channels->channelName = $request->channelName;
            $channels->description = $request->description;
            $channels->subscribersCount = $request->subscribersCount;
            $channels->URL = $request->URL;
            $channels->save();
        
        return redirect('channels')->with('success','Channel has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $channels = Channel::where('channelID', $id)->get();

        return view('channels.detail', compact('channels'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $channels = Channel::where('channelID', $id)->get();

        return view('channels.update', compact('channels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Channel::where('channelID', $id)->update([
            'channelID' => $request->channelID,
            'channelName' => $request->channelName,
            'description' => $request->description,
            'subscribersCount' => $request->subscribersCount,
            'URL' => $request->URL,
        ]);

        return redirect('channels')->with('success','Channel Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Channel::where('channelID',$id)->delete();

        return redirect()->route('channels.index')->with('success','Channel has been deleted successfully: '.$id);
    }
}
