<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discussion extends Model
{
    protected  $fillable = ['user_id', 'channel_id', 'title', 'content', 'slug'];

    public  function user() {
        return $this->belongsTo('App\User');
    }

    public  function channel() {
        return $this->belongsTo('App\Channel');
    }

    public function replies() {
        return $this->hasMany('App\Reply');
    }

    public function watchers() {

        return $this->hasMany('App\Watcher');
    }

    public function is_being_watched_by_auth_user() {

        $id = Auth::id();
        $watcher_ids = array();

        foreach ($this->watchers as $watcher):
            array_push($watcher_ids, $watcher->user_id);
        endforeach;

        if (in_array($id, $watcher_ids)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function hasBestAnswer() {

        $result = false;

        foreach ($this->replies as $reply) {
            if ($reply->best_answer) {
                $result = true;
                break;
            }
        }

        return $result;
    }

}
