<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'updated_at', 'id_categories'];

    public function categories() {
      return $this->belongsTo('App\AdminModel\Categories', 'id_categories');
    }

    public function sub_sub_categories() {
      return $this->hasMany('App\AdminModel\Sub_sub_categories', 'id_sub_categories');
    }

    public function posts() {
      return $this->hasMany('App\AdminModel\Posts', 'id_categories');
    }
}
