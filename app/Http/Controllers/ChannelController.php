<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;

class ChannelController extends Controller
{
    public function index()
    {
    	$channels = Channel::all();
    	return view('channel.index')->withChannels($channels);
    }

    public function create()
    {
    	return view('channel.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, array(

    		'channel' => 'required'

    	));
    	
    	$channel = new Channel;

    	$channel->title = $request->channel;
        $channel->slug = str_slug($request->channel);

    	$channel->save();

    	return redirect()->route('channel.index')->with('success', 'Channel created Successfully');
    }

    public function edit($id)
    {
    	$channel = Channel::find($id);
    	return view('channel.edit')->withChannel($channel);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, array(

    		'channel' => 'required'
    	));

    	$channel = Channel::find($id);

    	$channel->title = $request->channel;
        $channel->slug = str_slug($request->channel);

    	$channel->save();

    	return redirect()->route('channel.index')->with('success', 'Channel Updated Successfully');

    }

    public function delete($id)
    {
    	$channel = Channel::find($id);

    	$channel->delete();

    	return redirect()->route('channel.index')->with('success', 'Channel deleted Successfully');
    }

}
