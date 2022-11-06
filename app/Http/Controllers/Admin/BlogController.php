<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        return Inertia::render('Admin/Blog/Index', compact('blogs'));
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
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return Inertia::render('Admin/Blog/Show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return Inertia::render('Admin/Blog/Edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required|string|min:5|max:191',
            'slug' => 'required|string',
            'meta' => 'required|string|min:5|max:191',
            'body' => 'required|string|min:5',
            'notes' => 'nullable|string|max:5000',
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $blog = Blog::where('slug', $slug)->firstOrFail();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->notes = $request->notes;
        $blog->body = $request->body;
        $blog->status = $request->status;



        //SAVE IMAGE IF UPLOADED
        if ($request->hasFile('photo')) {
            if ($blog->photo){
                $photoName = $blog->photoNameOnly();
            }else{
                $photoName = Str::uuid()  . '.jpg';
            }
            $blog->photo = $request->file('photo')->storePubliclyAs('blog/' . $blog->id, $photoName);
        }

        $blog->save();

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back()->with('status', 'profile-information-updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    public function destroyPhoto(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        if ($blog->photo){
            Storage::delete($blog->photo);
            $blog->photo = null;
            $blog->save();
        }

        return $request->wantsJson()
            ? new JsonResponse('', 200)
            : back();
    }
}
