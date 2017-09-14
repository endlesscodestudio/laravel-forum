@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>
                                <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">{{$thread->title}}</a>
                                <span class="badge">{{$thread->channel->slug}}</span>
                                <span class="badge">{{$thread->replies_count}} {{str_plural('comment',$thread->replies_count)}}</span>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <article>
                                <div class="body">{{$thread->body}}</div>
                            </article>
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
