@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>{{$thread->title}}</h1></div>
                    <div class="panel-body">
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Replies</h2></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($thread->replies as $reply)
                                    <div class="panel panel-default ">
                                        <div class="panel-heading">{{$reply->created_at->diffForHumans()}}</div>
                                        <div class="panel-body bg-warning">
                                            <div class="body">{{$reply->body}}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
