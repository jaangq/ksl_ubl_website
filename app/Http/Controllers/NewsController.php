<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Posts;
use App\AdminModel\Tags;
use App\AdminModel\Website_text;

class NewsController extends Controller
{
    //
    public function index($post, Request $request) {
        $data['posts'] = Posts::join('pages', 'pages.id', '=', 'posts.id_pages')
        ->where('pages.name_en', 'news')->get()[0]
        ->where('title_slug', $post)->get()[0];

        // Tags
        $data['tags'] = new Tags;
        foreach ($data['posts']->tag_posts as $tag_posts) {
          $data['tags'] = $data['tags']->orWhere('id', $tag_posts->id_tags);
        }
        $data['tags'] = $data['tags']->get();

        // Next and Prev Post
        $data['next_post'] = Posts::where('id_pages', 2)
        ->where('id', '>', $data['posts']->id)->orderBy('id', 'ASC')->limit(1)->get();
        $data['prev_post'] = Posts::where('id_pages', 2)
        ->where('id', '<', $data['posts']->id)->orderBy('id', 'DESC')->limit(1)->get();
        if (count($data['next_post'])) {
          $data['next_post'] = $data['next_post'][0];
        } else {
          $data['next_post'] = (object) ['categories' => '', 'sub_categories' => '', 'sub_sub_categories' => '', 'pages' => (object) ['name_en' => ''], 'title_slug' => '', 'title_en' => '', 'title' => ''];
        }
        if (count($data['prev_post'])) {
          $data['prev_post'] = $data['prev_post'][0];
        } else {
          $data['prev_post'] = (object) ['categories' => '', 'sub_categories' => '', 'sub_sub_categories' => '', 'pages' => (object) ['name_en' => ''], 'title_slug' => '', 'title_en' => '', 'title' => ''];
        }

        $data['sosmed'] = Website_text::where('prefix', 'sosmed')->get();
        return view('article')->with('data', $data);
    }
}
