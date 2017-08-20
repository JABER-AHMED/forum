<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Watcher;
use Sentinel;

class WatchersController extends Controller
{
    public function watch($id)
    {
    	$watcher = new Watcher;

    	$watcher->discussion_id = $id;
    	$watcher->user_id = Sentinel::getUser()->id;

    	$watcher->save();

    	return redirect()->back()->with('success', 'You are watching this discussion');
    }

    public function unwatch($id)
    {
    	$watcher = Watcher::where('discussion_id', $id)->where('user_id', Sentinel::getUser()->id);

    	$watcher->delete();

    	return redirect()->back()->with('success', 'You are no longer watching this discussion');
    }
}
