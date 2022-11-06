<?php

namespace App\Http\Controllers;

use App\Models\Forum\Forum;
use App\Models\Forum\ForumComment;
use App\Models\Forum\ForumSave;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ForumSavedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $forums = Forum::query()
            ->where('user_uuid', auth()->user()->uuid)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $comment = ForumComment::where('uuid',$uuid)->firstOrFail();
        if (!$comment->isOwner){
            return back();
        }
        $comment->delete();
        return back();
    }

}
