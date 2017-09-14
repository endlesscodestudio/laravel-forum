@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
                <div class="page-header">
                    <h1><strong>{{$profileUser->name}}</strong>
                        <small>{{$profileUser->created_at->diffForHumans()}}</small>
                    </h1>
                </div>
                @foreach($threads as $thread)
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{$thread->title}}
                        </div>
                        <div class="panel-body">
                            {{$thread->body}}
                        </div>
                        <div class="panel-footer text-right">
                            Created at {{$thread->created_at->diffForHumans()}}
                        </div>
                    </div>
                @endforeach

                {{$threads->links()}}

            </div>
        </div>
    </div>
@endsection