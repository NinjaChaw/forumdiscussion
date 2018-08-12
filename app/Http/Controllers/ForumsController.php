<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;

class ForumsController extends Controller
{
    public function index() {

        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);

        return view('forum', compact('discussions'));
    }

    public function channel($slug) {

        $channel = Channel::where('slug', $slug)->first();

        $discussions = $channel->discussions()->paginate(5);

        return view('channel', compact('discussions'));
    }
}
