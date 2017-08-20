<div class="panel panel-default ">
    <div class="panel-heading">
        <a href="#">{{$reply->owner->name}}</a>
        at
        <strong>{{$reply->created_at->diffForHumans()}}</strong>
        said:
    </div>
    <div class="panel-body bg-warning">
        <div class="body">{{$reply->body}}</div>
    </div>
</div>