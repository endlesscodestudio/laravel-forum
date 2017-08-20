@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="">
                            {{$thread->creator->name}}
                        </a>
                        posted:
                        <h4><strong>{{$thread->title}}</strong></h4>
                    </div>
                    <div class="panel-body">
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>

        @include('threads.reply_form')

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Replies</h2></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($thread->replies as $reply)
                                    @include('threads.replies')
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
