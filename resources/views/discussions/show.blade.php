@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <img src="{{ $discussion->user->avatar }}" alt="" height="70px" width="70px">&nbsp;&nbsp;&nbsp;
            <span><b>{{ $discussion->user->name }}</b>, <b>( {{$discussion->user->points}} Points )</b></span>
            @if($discussion->is_being_watched_by_auth_user())
                <a href="{{ route('discussion.unwatch', $discussion->id) }}" class="btn btn-xs btn-primary pull-right">Unwatch</a>
            @else
                <a href="{{ route('discussion.watch', $discussion->id) }}" class="btn btn-xs btn-primary pull-right">Watch</a>
            @endif
        </div>
        <div class="panel-body">
            <h4 class="text-center">{{ $discussion->title }}</h4>
            <hr>
            <p class="text-center">{{ $discussion->content }}</p>

            <hr>
            @if($best_answer)
                <div class="text-center" style="padding: 30px">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3>Best answer</h3>
                            <img src="{{ $best_answer->user->avatar }}" alt="" height="70px" width="70px">&nbsp;&nbsp;&nbsp;
                            <span><b>{{ $best_answer->user->name }}</b>, {{ $discussion->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="panel-body">
                            {{ $best_answer->content }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="panel-footer">
            <span>{{ $discussion->replies->count() }} Replies</span>

            <a href="{{ route('channel', $discussion->channel->slug) }}" class="btn btn-default btn-xs pull-right">{{ $discussion->channel->title }}</a>
        </div>
    </div>

    @foreach($discussion->replies as $reply)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $reply->user->avatar }}" alt="" height="40px" width="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $reply->user->name }}</b> <b>( {{$reply->user->points}} Points )</b></span>
                @if(!$best_answer)
                    @if(Auth::id() == $discussion->user->id)
                        <a href="{{ route('discussion.best.answer', $reply->id) }}" class="btn btn-xs btn-info pull-right">Mark as best answer</a>
                    @endif
                @endif
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
