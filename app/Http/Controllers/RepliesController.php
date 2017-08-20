<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Reply;
use Sentinel;

class RepliesController extends Controller
{
    public function like($id)
    {

    	$like = new Like;

    	$like->reply_id = $id;
    	$like->user_id = Sentinel::getUser()->id;

    	$like->save();

    	return redirect()->back();
    }

    public function unlike($id)
    {
    	$like = Like::where('reply_id', $id)->where('user_id', Sentinel::getUser()->id)->first();

    	$like->delete();

    	return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->save();

        // $reply->user->points += 100;
        // $reply->user->save();

        return redirect()->back()->with('success', 'Reply has been marked as best answer');
    }

    public function edit($id)
    {
        $reply = Reply::find($id);
        return view('replies.edit')->withReply($reply);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, array(

            'content' => 'required'
        ));

        $reply = Reply::find($id);
        $reply->content = $request->content;

        $reply->save();

        return redirect()->route('discussion', $reply->discussion->slug);
    }
}
