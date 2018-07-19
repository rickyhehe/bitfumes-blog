<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

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
      return view('admin.post.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // die(print_r($request->all()));
      $this->validate($request,[
        'title' => 'required',
        'body' => 'required'
      ]);
      $post = new post;
      $post->title = $request->title;
      $post->body = $request->body;
      $post->slug = str_slug($request->title,"-");
      $post->status = $request->status;
      $post->save();
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
        $post = post::find($id);
        return view("admin.post.edit",compact("post"));
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
