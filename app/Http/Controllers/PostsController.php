<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Pages;
use App\AdminModel\Posts;
use App\AdminModel\Tags;
use App\AdminModel\Website_text;

class PostsController extends Controller
{
    //

    public function index() {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['posts'] = Posts::where('id_post_status', '1')->orderBy('updated_at', 'DESC')->paginate(9);
      $data['post_sub'] = '';
      return view('posts')->with('data', $data);
    }

    public function newsOnly() {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['posts'] = Posts::where('id_post_status', '1')->where('id_pages', 2)->orderBy('updated_at', 'DESC')->paginate(9);
      $data['post_sub'] = 'news-only';
      return view('posts')->with('data', $data);
    }

    public function lessonsOnly() {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['posts'] = Posts::where('id_post_status', '1')->where('id_pages', 3)->orderBy('updated_at', 'DESC')->paginate(9);
      $data['post_sub'] = 'lessons-only';
      return view('posts')->with('data', $data);
    }

    public function popular() {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['posts'] = Posts::where('id_post_status', '1')->orderBy('likes', 'DESC')->paginate(9);
      $data['post_sub'] = 'popular';
      return view('posts')->with('data', $data);
    }

    public function mostViewed() {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['posts'] = Posts::where('id_post_status', '1')->orderBy('views', 'DESC')->paginate(9);
      $data['post_sub'] = 'most-viewed';
      return view('posts')->with('data', $data);
    }

    public function tags($q = '', Request $request) {
      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      if($q) {
        $data['posts'] = Posts::where('id_post_status', '1')->join('tag_posts', 'tag_posts.id_posts', 'posts.id')
                              ->join('tags', 'tag_posts.id_tags', 'tags.id')
                              ->where('tags.name_en', $q)->orWhere('tags.name', $q)
                              ->paginate(9);
      } else {
        $data['tags'] = Tags::all();
      }
      $data['post_sub'] = 'most-viewed';
      return view('posts')->with('data', $data);
    }

    public function search(Request $request) {
      $search = $request->input('search');
      $post_sub = $request->input('post_sub');

      $data['pages'] = Pages::where('name_en', 'posts')->get()[0]->website_text;
      $data['post_sub'] = $post_sub;
      $data['posts'] = Posts::where('id_post_status', '1')->where('content','LIKE','%'.$search.'%')
                              ->orWhere('content_en','LIKE','%'.$search.'%')
                              ->orWhere('title','LIKE','%'.$search.'%')
                              ->orWhere('title_en','LIKE','%'.$search.'%')
                              ->orderBy('views', 'DESC')->paginate(9);
      return view('posts')->with('data', $data);
    }
}
