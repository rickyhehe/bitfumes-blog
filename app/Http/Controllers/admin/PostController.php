<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\Model\user\category;
use App\Model\user\tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = category::all();
      $tags = tag::all();
      return view('admin.post.form',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // die(print_r($request->tags));
      $this->validate($request,[
        'title' => 'required',
        'body' => 'required'
      ]);
      $post = new post;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->slug = str_slug($request->title,"-");
      $post->status = $request->status;
      $post->category_id = $request->category;
      $post->posted_by = 1;
      $post->image = 1;
      $post->save();
      
      $post->tags()->sync($request->tags);
      return redirect(route("admin.post.index"));
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
        $categories = category::all();
        $tags = tag::all();
        $post = post::with('tags')->find($id);
        // return $post;
        return view("admin.post.edit",compact("post","categories","tags"));
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
      // die(print_r($request->all()));
      $this->validate($request,[
        'title' => 'required',
        'body' => 'required'
      ]);
      $post = post::find($id);
      $post->title = $request->title;
      $post->body = $request->body;
      $post->slug = str_slug($request->title,"-");
      $post->status = $request->status;
      $post->category_id = $request->category;
      $post->tags()->sync($request->tags);
      $post->save();
      return redirect()->route("admin.post.index")->with("messages","post has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = post::find($id);
      $post->delete();
      return redirect()->route("admin.post.index")->with("messages","post has been deleted");
      
    }
}
