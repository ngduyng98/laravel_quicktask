<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Session;
use Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Session::get('user_id');
        $post->title = $request->title;
        $post->content = $request->content;
        $image_name = $request->file('image')->getClientOriginalName();
        Storage::putFileAs('public', $request->file('image'), $image_name);
        $post->image = config('app.link_image').$image_name;
        $post->save();

        return redirect()->route('posts.list', [$post->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $post = Post::findOrFail($id);

            return view('page.posts.edit', compact('post'));
        } catch (Exception $e) {
            return $e->getMessage;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->id = $request->id;
            $post->title = $request->title;
            $post->content = $request->content;
            if ($request->file('image') == null) {
                $post->image = $request->image;
            } else {
                $image_name = $request->file('image')->getClientOriginalName();
                Storage::putFileAs('public', $request->file('image'), $image_name);
                $post->image = config('app.link_image').$image_name;
            }
            $post->save();

            return redirect()->route('posts.list', [$post->user_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user_id = Session::get('user_id');
            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->route('posts.list', [$user_id]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function findByIdUser($id)
    {
        try{
            $user = User::findOrFail($id);
            $posts = $user->posts()->paginate(config('app.paginate.post'));
            Session::put('user_id', $user->id);

            return view('page.posts.list', [
                'posts' => $posts,
                'user_name' => $user->name
            ]);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
