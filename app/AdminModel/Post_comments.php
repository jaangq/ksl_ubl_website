<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Post_comments extends Model
{
    //
    protected $table = 'post_comments';

    protected $fillable = ['id', 'content', 'likes', 'views', 'ip' ,'comments_on_comment', 'created_at', 'updated_at', 'id_users', 'id_posts'];


    public function users() {
      return $this->belongsTo('App\AdminModel\Users', 'id_users');
    }
}
