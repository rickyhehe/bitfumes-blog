<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\user\post;

class PostController extends Controller
{
  public function index()
  {
    $posts = post::with('category',"tags")->paginate(2);
    // return $posts;
    return view("user.post.index",compact("posts"));
  }
  
  public function single(post $post)
  {
    return view("user.post.single",compact("post"));
  }
}
