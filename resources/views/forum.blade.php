@extends('layouts.app')

@section('content')
            
    @foreach($discussions as $discussion)
        <div class="panel panel-default">
            <div class="panel-heading">
                <img src="{{ $discussion->user->avatar }}" alt="" height="40px" width="40px">&nbsp;&nbsp;&nbsp;
                <span><b>{{ $discussion->user->name }}</b>, {{ $discussion->created_at->diffForHumans() }}</span>
                <a href="{{ route('discussion', $discussion->slug) }}" class="btn btn-sm btn-primary pull-right">View</a>
            </div>
            <div class="panel-body">
                <h4 class="text-center">{{ $discussion->title }}</h4>
                <p class="text-center">{{ str_limit($discussion->content, 120) }}</p>
            </div>
            <div class="panel-footer">
                <p>{{ $discussion->replies->count() }} Replies</p>
            </div>
        </div>
    @endforeach

    <div class="text-center">{{ $discussions->links() }}</div>
    
@endsection
