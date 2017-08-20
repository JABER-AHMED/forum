<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Channel;
use Sentinel;
use Illuminate\Pagination\Paginator;

class ForumsController extends Controller
{
    public function index()
    {
        switch (request('filter')) {
            case 'me':
                $discussions = Discussion::where('user_id', Sentinel::getUser()->id)->paginate(5);
                break;
            case 'answered':

                $answered = array();
                foreach (Discussion::all() as $discussion) {
                    if ($discussion->hasBestAns()) {
                        array_push($answered, $discussion);
                    }
                }
                $discussions = new Paginator($answered, 5);
                break;

            case 'UnAnswered':
                $unanswered = array();
                foreach (Discussion::all() as $discussion) {
                    if (!$discussion->hasBestAns()) {
                        array_push($unanswered, $discussion);
                    }
                }
                $discussions = new Paginator($unanswered, 5);
                break;
            
            default:
                $discussions = Discussion::orderBy('created_at', 'desc')->paginate(5);
                break;
        }
    	return view('forum')->withDiscussions($discussions);
    }

    public function channel($slug)
    {
    	$channel = Channel::where('slug', $slug)->first();
    	return view('channel')->with('discussions', $channel->discussions);
    }
}
