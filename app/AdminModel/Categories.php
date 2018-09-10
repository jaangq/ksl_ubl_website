<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'updated_at'];

    public function sub_categories() {
      return $this->hasMany('App\AdminModel\Sub_categories', 'id_categories');
    }

    public function posts() {
      return $this->hasMany('App\AdminModel\Posts', 'id_categories');
    }
}
