@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Thread lists</div>
                    <div class="panel-body">
                        @foreach($threads as $thread)
                            <article>
                                <h4>
                                    <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">{{$thread->title}}</a>
                                    <span class="badge">{{$thread->channel->slug}}</span>
                                    <span class="badge">{{$thread->replies_count}} {{str_plural('comment',$thread->replies_count)}}</span>
                                </h4>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
