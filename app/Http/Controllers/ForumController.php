<?php

namespace App\Http\Controllers;

use App\Models\Forum\Forum;
use App\Models\Forum\ForumComment;
use App\Models\Forum\ForumSave;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $forums = Forum::query()
            ->filter()
            ->latest()
            ->with(['user:uuid,name,profile_photo_path'])
            ->withCount('comments')
            ->get();

        return Inertia::render('Forum/Index', compact('forums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $forum = Forum::where('slug', $slug)->with('comments.user','comments.children.user','user:uuid,name,profile_photo_path','forumSaved')->firstOrFail();
        return Inertia::render('Forum/Show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $comment = ForumComment::where('uuid',$uuid)->firstOrFail();
        if (!$comment->isOwner){
            return back();
        }
        $comment->description = $request->description;
        $comment->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$uuid)
    {
        $comment = ForumComment::where('uuid',$uuid)->firstOrFail();
        if (!$comment->isOwner){
            return back();
        }
        $comment->delete();

        if ($request->expectsJson()) {
            return response()->json('Success',200);
        }
        return back();
    }

    public function storeReply(Request $request)
    {
        $comment = ForumComment::create([
           'user_uuid'=>auth()->user()->uuid,
           'forum_uuid'=>$request->forum_uuid,
           'parent_uuid'=>$request->parent_uuid,
           'description'=>$request->description,
        ]);

        $previous_url = url()->previous();
        $parsed_url = parse_url($previous_url);
        $query = [];
        if (array_key_exists('query',$parsed_url)){
            parse_str($parsed_url['query'], $query);
        }
        $query['replyUuid'] = $comment['uuid']->toString();
        $previous_url = explode('?', $previous_url)[0];
        $redirect_url = $previous_url . '?' . http_build_query($query);

        if ($request->expectsJson()) {
            return $comment->load('user:uuid,name,profile_photo_path');
        }else{
            return redirect()->to($redirect_url);
        }
    }

    public function saveForum(Request $request)
    {
        if ($request->type == 'save'){
            ForumSave::create([
                'user_uuid' => auth()->user()->uuid,
                'forum_uuid' => $request->forum_uuid,
            ]);
        }else{
            ForumSave::where('user_uuid',auth()->user()->uuid)->where('forum_uuid',$request->forum_uuid)->delete();
        }

        return response()->json('Success',200);
    }
}
