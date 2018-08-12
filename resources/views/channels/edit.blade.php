@extends('layouts.app')

@section('content')
                <div class="panel panel-default">
                    <div class="panel-heading">Update channel: {{ $channel->title }}</div>

                    <div class="panel-body">
                        <form action="{{ route('channels.update', $channel->id) }}" method="post">

                            {{csrf_field()}}

                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <input type="text" name="title" value="{{ $channel->title }}" class="form-control">
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button class="btn btn-success">Update channel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
@endsection
