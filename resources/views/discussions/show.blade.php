@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ $discussion->user->avatar }}" alt="" height="70px" width="70px">&nbsp;&nbsp;&nbsp;
            <span><b>{{ $discussion->user->name }}</b>, {{ $discussion->created_at->diffForHumans() }}</span>
            <a href="{{ route('discussion', $discussion->slug) }}" class="btn btn-sm btn-primary pull-right">View</a>
        </div>
        <div class="panel-body">
            <h4 class="text-center">{{ $discussion->title }}</h4>
            <hr>
            <p class="text-center">{{ $discussion->content }}</p>
        </div>
        <div class="panel-footer">
            <p>{{ $discussion->replies->count() }} Replies</p>
        </div>
    </div>

    @foreach($discussion->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $reply->user->avatar }}" alt="" height="40px" width="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $reply->user->name }}</b>, {{ $reply->created_at->diffForHumans() }}</span>
            </div>
            <div class="panel-body">
                <p class="text-center">{{ $reply->content }}</p>
            </div>
            <div class="panel-footer">
                @if($reply->is_liked_by_auth_user())
                    <a href="{{ route('reply.unlike', $reply->id) }}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $reply->likes->count() }}</a>
                @else
                    <a href="{{ route('reply.like', $reply->id) }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                @endif
            </div>
        </div>
    @endforeach

    <div class="panel panel-default">
        <div class="panel-body">
            @if(Auth::check())
                <form action="{{ route('discussion.reply', $discussion->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="content">Leave a reply...</label>
                        <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn pull-right">Reply</button>
                    </div>
                </form>
            @else
                <p class="text-center">Please login to leave a reply.</p>
            @endif
        </div>
    </div>
@endsection
