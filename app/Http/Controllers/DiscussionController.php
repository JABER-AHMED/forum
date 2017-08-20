<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use Sentinel;
use App\Reply;
use App\User;
use Notification;
use Session;

class DiscussionController extends Controller
{
    public function create()
    {
    	return view('discuss');
    }

    public function store(Request $request)
    {
    	$this->validate($request, array(

    		'channel_id' => 'required',
    		'content' => 'required',
    		'title' => 'required'
    	));

    	$discussion = new Discussion;

    	$discussion->title = $request->title;
    	$discussion->content = $request->content;
    	$discussion->channel_id = $request->channel_id;
    	$discussion->user_id = Sentinel::getUser()->id;
    	$discussion->slug = str_slug($request->title);

    	$discussion->save();

    	return redirect()->route('discussion', $discussion->slug)->with('success', 'Discussion Created Successfully!!');


    }

    public function show($slug)
    {
    	$discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();
    	return view('discussion.show')->withDiscussion($discussion)->with('best_answer', $best_answer);
    }

    public function reply(Request $request, $id)
    {
        $discussion = Discussion::find($id);

        $this->validate($request, array(

            'reply' => 'required'
        ));

        $reply = new Reply;
        $reply->user_id = Sentinel::getUser()->id;
        $reply->discussion_id = $id;
        $reply->content = $request->reply;
        $reply->best_answer = 0;

        // $reply->user->points += 25;
        // $reply->user->save();

        $watchers = array();

        foreach ($discussion->watchers as $watcher) {
           
           array_push($watchers, User::find($watcher->user_id));
        }

        Notification::send($watchers, new \App\Notifications\NewReplyAdded($discussion));

        $reply->save();

        return redirect()->back();
    }

    public function edit($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();
        return view('discussion.edit')->withDiscussion($discussion);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(

            'content' => 'required'
        ));

        $discussion = Discussion::find($id);

        $discussion->content = $request->content;

        $discussion->save();

        return redirect()->route('discussion', $discussion->slug)->with('success', 'Discussion updated successfully!!');
    }
}
