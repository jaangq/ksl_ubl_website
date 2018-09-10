<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Tag_posts extends Model
{
    //
    protected $table = 'tag_posts';
    protected $fillable = ['id', 'id_posts', 'id_tags', 'created_at', 'updated_at'];

    public function tags() {
      return $this->belongsTo('\App\AdminModel\Tags', 'id_tags');
    }
}
