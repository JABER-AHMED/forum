<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sentinel;

class Reply extends Model
{
    protected $fillable = ['content', 'user_id', 'discussion_id'];

    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function likes()
    {
    	return $this->hasMany('App\Like');
    }
    //for likes
    public function is_liked_by_auth_user()
    {
        $id = Sentinel::getUser()->id;

        $likers = array();

        foreach ($this->likes as $like){
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        }
        else{
            return false;
        }
    }
}
