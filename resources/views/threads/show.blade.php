@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5><strong>Channel {{$thread->channel->name}}</strong></h5>
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

                @include('threads.reply_form')

                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Replies</h2></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                @foreach($replies as $reply)
                                    @include('threads.replies')
                                @endforeach

                                {{$replies->links()}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>Created by <a href="#">{{$thread->creator->name}}</a>
                            at {{$thread->created_at->diffForHumans()}}.</p>
                        <p>Have {{$thread->replies_count}} {{str_plural('reply',$thread->replies_count)}}.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
