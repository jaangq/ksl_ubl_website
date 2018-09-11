<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'updated_at'];

    public function tag_posts() {
      return $this->hasMany('App\AdminModel\Tag_posts', 'id_tags');
    }
}
