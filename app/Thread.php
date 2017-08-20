<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Thread extends Model
{

    protected $guarded = [];

    public function replies()
    {
        return $this->hasMany(Reply::class)->orderByRaw('created_at DESC');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

}
