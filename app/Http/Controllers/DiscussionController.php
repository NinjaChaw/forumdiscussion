<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        return view('discussions.show', compact('discussion'));
    }

    public function reply($id) {

        Reply::create([
            'user_id' => $id,
            'discussion_id' => Auth::id(),
            'content' => request()->content
        ]);

        Session::flash('success', 'You have replied to a post');

        return redirect()->back();
    }
}
