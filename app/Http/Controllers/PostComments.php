<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminModel\Post_comments;

class PostComments extends Controller
{
    //
    public function check(Request $request) {
        $text_report = '';
        if (!$request->input('jsData')) {
          return false;
        }
        $jsData = json_decode($request->input('jsData'));
        $jsData->ip = $request->ip();
        if(!$jsData->commentReply) {
          $jsData->commentReply = NULL;
        }
        if ($request->session()->has('user_sos')) {
          $jsData->session = session('user_sos');
          $objPostComments = new PostComments();
          $objPostComments->commenting(session('user_sos'), $jsData);
        } else {
          $text_report = 'logFirst';
          return $text_report;
        }
    }
    public function commenting($sess, $content) {
      try {
        $postComments = new Post_comments();
        $postComments->content = strip_tags(htmlspecialchars_decode($content->commentTextArea));
        $postComments->ip = $content->ip;
        $postComments->comments_on_comment = $content->commentReply;
        $postComments->id_users = \App\User::where('provider_id', $content->session->provider_id)->first()->id;
        $postComments->id_posts = \App\AdminModel\Posts::where('title_slug', $content->commentPage)->first()->id;
        $postComments->save();
      } catch(\Exception $e) {
        die($e->getMessage());
        return false;
      }

    }
}
