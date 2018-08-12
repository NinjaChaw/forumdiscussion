<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RepliesController extends Controller
{
    public function like($id) {

        Like::create([
            'user_id' => Auth::id(),
            'reply_id' => $id,
        ]);

        Session::flash('session', 'Successfully likes comment.');

        return redirect()->back();
    }

    public function unlike($id) {

        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        $like->delete();

        Session::flash('success', 'Reply unliked successfully');

        return redirect()->back();
    }
}
