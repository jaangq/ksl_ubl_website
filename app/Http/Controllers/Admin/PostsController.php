<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\AdminModel\Pages;
use App\AdminModel\Posts;
use App\AdminModel\Tag_posts;
use KSLAlert;
use View;

class PostsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['posts'] = Posts::orderBy('id', 'DESC')->paginate(10);
        $data['pages'] = Pages::getAllPages();
        return view('admin.posts')->with('data', $data);
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
        $jsData = json_decode($request->input('jsData'));
        $post = new Posts;
        try{
            $post->title = $jsData->posts_title;
            $post->title_slug = str_slug($jsData->posts_title_en, '-');
            $post->title_en = $jsData->posts_title_en;
            $post->content = $jsData->posts_content;
            $post->content_en = $jsData->posts_content_en;
            $post->likes = 0;
            $post->views = 0;
            $post->id_categories = ($jsData->posts_cat) ? $jsData->posts_cat : NULL;
            $post->id_sub_categories = ($jsData->posts_sub_cat) ? $jsData->posts_sub_cat : NULL;
            $post->id_sub_sub_categories = ($jsData->posts_sub_sub_cat) ? $jsData->posts_sub_sub_cat : NULL;
            $post->id_pages = $jsData->posts_pages;
            $post->id_post_status = $jsData->posts_status;
            $post->id_users = '1';
            $post->save();
            $tags = $jsData->posts_tags;
            $id_posts = Posts::select('id')->orderBy('created_at', 'desc')->first()->id;
            foreach ($tags as $tag_id) {
              $tag_posts = new Tag_posts;
              $tag_posts->id_posts = $id_posts;
              $tag_posts->id_tags = $tag_id;
              $tag_posts->save();
            }
            $text = ucfirst('Posts '.$jsData->posts_title.' has been added');
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            die($e->getMessage());
            $text = 'Failed to add post';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Posts already exists !';
            }
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
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
        //
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
        //
        $jsData = json_decode($request->input('jsData'));
        $post = Posts::find($id);
        if ($request->has('stat_only')) {
          switch ($jsData->posts_status) {
            case '1': $post->id_post_status = 2; break;
            case '2': $post->id_post_status = 1; break;
          }
          $post->save();
          $text = 'Status post has been changed';
          $type = 'success';
          $strongText = 'Successfully !';
          return KSLAlert::makesAlert($text, $type, $strongText);
        }
        try{
            $post->title_slug = str_slug($jsData->posts_title_en, '-');
            $post->title = $jsData->posts_title;
            $post->title_en = $jsData->posts_title_en;
            $post->content = $jsData->posts_content;
            $post->content_en = $jsData->posts_content_en;
            $post->likes = 0;
            $post->views = 0;
            $post->id_categories = ($jsData->posts_cat) ? $jsData->posts_cat : NULL;
            $post->id_sub_categories = ($jsData->posts_sub_cat) ? $jsData->posts_sub_cat : NULL;
            $post->id_sub_sub_categories = ($jsData->posts_sub_sub_cat) ? $jsData->posts_sub_sub_cat : NULL;
            $post->id_pages = $jsData->posts_pages;
            $post->id_post_status = $jsData->posts_status;
            $post->id_users = '1';
            $post->save();
            $tags = $jsData->posts_tags;
            $id_tags = $jsData->id_posts_tags;
            foreach ($id_tags as $id_tag) {
              $tag_posts = Tag_posts::find($id_tag);
              $tag_posts->delete();
            }
            foreach ($tags as $tag_id) {
              $tag_posts = new Tag_posts;
              $tag_posts->id_posts = $id;
              $tag_posts->id_tags = $tag_id;
              $tag_posts->save();
            }
            $text = ucfirst($post->title_en).' has been updated';
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to update post';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Posts already exists !';
            }
            return KSLAlert::makesAlert($text, $type, $strongText);
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
        //
        try {
          $post = Posts::find($id);
          $post->delete();
          $text = ucfirst($post->title_en).' has been deleted';
          $type = 'success';
          $strongText = 'Successfully !';
          return KSLAlert::makesAlert($text, $type, $strongText);
        } catch(\Exception $e){
          // do task when error
          $text = 'Failed to delete post';
          $type = 'danger';
          $strongText = 'Error !';
          if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
            $text = 'Posts already exists !';
          }
          return KSLAlert::makesAlert($text, $type, $strongText);
        }

    }
    public function search(Request $request)
    {
       //
       $val = $request->input('val');
       $data['posts'] = Posts::orderBy('id', 'DESC')
                         ->where('id','LIKE','%'.$val.'%')
                         ->orWhere('title','LIKE','%'.$val.'%')
                         ->orwhere('content','LIKE','%'.$val.'%')
                         ->orWhere('title_en','LIKE','%'.$val.'%')
                         ->orWhere('content_en','LIKE','%'.$val.'%')
                         ->orWhere('created_at','LIKE','%'.$val.'%')
                         ->orWhere('updated_at','LIKE','%'.$val.'%')
                         ->paginate(10);
       $data['pages'] = Pages::getAllPages();
       $html = view('admin.posts')->with('data', $data)->render();
       die($html);

    }
}
