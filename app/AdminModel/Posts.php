<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = ['id', 'title', 'content', 'title_en', 'content_en', 'likes', 'views', 'created_at', 'updated_at', 'id_categories', 'id_sub_categories', 'id_sub_sub_categories', 'id_pages', 'id_post_status', 'id_users'];

    public function tag_posts() {
      return $this->hasMany('App\AdminModel\Tag_posts', 'id_posts');
    }
    public function categories() {
      return $this->belongsTo('App\AdminModel\Categories', 'id_categories');
    }
    public function sub_categories() {
      return $this->belongsTo('App\AdminModel\Sub_categories', 'id_sub_categories');
    }
    public function sub_sub_categories() {
      return $this->belongsTo('App\AdminModel\Sub_sub_categories', 'id_sub_sub_categories');
    }
    public function pages() {
      return $this->belongsTo('App\AdminModel\Pages', 'id_pages');
    }
    public function post_status() {
      return $this->belongsTo('App\AdminModel\Post_status', 'id_post_status');
    }
    public function users() {
      return $this->belongsTo('App\AdminModel\Users', 'id_users');
    }
    public function post_comments() {
      return $this->hasMany('App\AdminModel\Post_comments', 'id_posts');
    }
}
