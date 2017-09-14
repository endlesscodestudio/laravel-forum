<div class="panel panel-default ">
    <div class="panel-heading">
        <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <a href="/profile/{{$reply->owner->name}}">{{$reply->owner->name}}</a>
                at
                <strong>{{$reply->created_at->diffForHumans()}}</strong>
                said:
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <form method="POST" action="/threads/{{$reply->id}}/favorites">
                    {{csrf_field()}}

                    <button type="submit" class="btn btn-primary btn-block" {{$reply->isFavorited() ? 'disabled' : ''}}>
                        <strong>{{$reply->favorites_count}} {{str_plural('Favorite',$reply->favorites_count )}}</strong>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body bg-warning">
        <div class="body">{{$reply->body}}</div>
    </div>
</div>