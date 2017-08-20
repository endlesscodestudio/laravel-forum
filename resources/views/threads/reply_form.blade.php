@if(auth()->check())
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><span>Leave a comment</span></div>
                <div class="panel-body">
                    <form method="POST" action="/threads/{{$thread->id}}/replies">
                        {{csrf_field()}}
                        <div class="form-group">
                            <textarea name="body" id="body" placeholder="Leave a comment!"
                                      class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default pull-right">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body bg-danger">
                    <p>Please <a href="{{route('login')}}">Sign in</a> to participate in this discussion.</p>
                </div>
            </div>
        </div>
    </div>
@endif