@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Let's start a thread</h3></div>
                    <div class="panel-body">
                        @foreach($errors as $error)
                            {{$error->message}}
                        @endforeach
                        <form action="/threads" method="POST">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="channel_id" class="text-uppercase">Channel</label>
                                <select name="channel_id" id="channel_id" class="form-control">
                                    <option value="">Seleccionar</option>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title" class="text-uppercase">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="body" class="text-uppercase">Body</label>
                                <textarea name="body" id="body" class="form-control" rows="8"></textarea>
                            </div>
                            <button type="submit" class="btn btn-info pull-right">Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
