@extends('layouts.app')

@section('content')
            
    @foreach($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $discussion->user->avatar }}" alt="" height="40px" width="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $discussion->user->name }}</b>, {{ $discussion->created_at->diffForHumans() }}</span>

                @if($discussion->hasBestAnswer())
                    <span class="btn pull-right btn-success btn-xs">closed</span>
                @else
                    <span class="btn pull-right btn-success btn-xs">open</span>
                @endif

                <a href="{{ route('discussion', $discussion->slug) }}" class="btn btn-sm btn-primary btn-xs pull-right">View</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center">{{ $discussion->title }}</h4>
                <p class="text-center">{{ str_limit($discussion->content, 120) }}</p>
            </div>
            <div class="panel-footer">
                <span>{{ $discussion->replies->count() }} Replies</span>

                <a href="{{ route('channel', $discussion->channel->slug) }}" class="btn btn-default btn-xs pull-right">{{ $discussion->channel->title }}</a>
            </div>
        </div>
    @endforeach

    <div class="text-center">{{ $discussions->links() }}</div>
    
@endsection
