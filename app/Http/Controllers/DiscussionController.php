<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Notifications\NewReplyAdded;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class DiscussionController extends Controller
{
    public function create() {

        return view('discuss');
    }

    public function store() {

        $r = request();

        $this->validate($r, [
            'channel_id' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);

        $discussion = Discussion::create([
            'title' => $r->title,
            'content' => $r->content,
            'user_id' => Auth::id(),
            'channel_id' => $r->channel_id,
            'slug' => str_slug($r->title)
        ]);

        Session::flash('session', 'Discussion created successfully');

        return redirect()->route('discussion', $discussion->slug);
    }

    public function show($slug) {

        $discussion = Discussion::where('slug', $slug)->first();
        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show', compact('discussion', 'best_answer'));
    }

    public function reply($id) {

        $discussion = Discussion::find($id);

        $reply = Reply::create([
            'user_id' => $id,
            'discussion_id' => Auth::id(),
            'content' => request()->content
        ]);

        $reply->user->points += 25;
        $reply->user->save();

        //Selecting user for email notification
        $watchers = array();
        foreach ($discussion->watchers as $w):
            array_push($watchers, User::find($w->user_id));
        endforeach;
        Notification::send($watchers, new NewReplyAdded($discussion));

        Session::flash('success', 'You have replied to a post');

        return redirect()->back();
    }
}
