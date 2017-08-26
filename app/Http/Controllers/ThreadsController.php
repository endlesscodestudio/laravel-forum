<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'create']);
    }

    public function index()
    {
        $threads = Thread::latest()->get();

        return view('threads/index', compact('threads'));

    }

    public function show($channel, Thread $thread)
    {
        return view('threads.show', compact(['thread', 'channel']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required',
            'body'       => 'required',
            'channel_id' => 'required|exists:channels,id',//Very fucking important!!!!
        ]);

        $thread = Thread::create([
            'user_id'    => auth()->id(),
            'channel_id' => request('channel_id'),
            'title'      => request('title'),
            'body'       => request('body')
        ]);

        return redirect("/threads/{$thread->channel->slug}/{$thread->id}");
    }

    public function create()
    {
        $channels = Channel::all();

        return view('threads.create', compact('channels'));
    }

}
