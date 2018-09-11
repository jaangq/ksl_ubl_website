<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Posts;
use App\AdminModel\Tags;
use App\AdminModel\Website_text;

class LessonsController extends Controller
{
    //
    public function index($cat, $subcat, Request $request) {
        // $data['posts'] = Posts::join('pages', 'pages.id', '=', 'posts.id_pages')
        // ->where('pages.name_en', 'lessons')
        // ->join('categories', 'categories.id', '=', 'posts.id_categories')
        // ->where('categories.name_en', $cat);
        $data['posts'] = Posts::join('pages', 'pages.id', '=', 'posts.id_pages')
        ->where('pages.name_en', 'lessons')
        ->join('categories', 'categories.id', '=', 'posts.id_categories')
        ->where('categories.name_en', $cat)->get()[0];
        if($request->segment(5)) {
          $subsubcat = $request->segment(4);
          $slug_title = $request->segment(5);
          $data['posts'] = $data['posts']->join('sub_categories', 'sub_categories.id', '=', 'posts.id_sub_categories')
          ->where(function($where) use ($subcat) {
            $where->where('sub_categories.name_en', '=', $subcat)
            ->orWhere('sub_categories.name_en', '=', str_replace('-', ' ', $subcat));
          })->join('sub_sub_categories', 'sub_sub_categories.id', '=', 'posts.id_sub_sub_categories')
          ->where(function($where) use ($subsubcat) {
            $where->where('sub_sub_categories.name_en', '=', $subsubcat)
            ->orWhere('sub_sub_categories.name_en', '=', str_replace('-', ' ', $subsubcat));
          })
          ->where('posts.title_slug', $slug_title)->get()[0];
        } else if($request->segment(4)) {
          $subsubcat = $request->segment(4);
          $data['posts'] = $data['posts']->join('sub_categories', 'sub_categories.id', '=', 'posts.id_sub_categories')
          ->where(function($where) use ($subcat) {
            $where->where('sub_categories.name_en', '=', $subcat)
            ->orWhere('sub_categories.name_en', '=', str_replace('-', ' ', $subcat));
          })
          ->where('posts.title_slug', $subsubcat)->get()[0];
        } else {
          $data['posts'] = $data['posts']->where('title_slug', $subcat)->get()[0];
        }

        // Tags
        $data['tags'] = new Tags;
        foreach ($data['posts']->tag_posts as $tag_posts) {
          $data['tags'] = $data['tags']->orWhere('id', $tag_posts->id_tags);
        }
        $data['tags'] = $data['tags']->get();

        // Next and Prev Post
        $data['next_post'] = Posts::where('id_pages', 3)
        ->where('id', '>', $data['posts']->id)->orderBy('id', 'ASC')->limit(1)->get();
        $data['prev_post'] = Posts::where('id_pages', 3)
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

        //
        $data['sosmed'] = Website_text::where('prefix', 'sosmed')->get();
        return view('article')->with('data', $data);
    }
}
