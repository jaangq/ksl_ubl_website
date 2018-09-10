<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Sub_sub_categories extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'updated_at', 'id_sub_categories'];


    public function posts() {
      return $this->hasMany('App\AdminModel\Posts', 'id_categories');
    }
}
