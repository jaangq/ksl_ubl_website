<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $fillable = ['id', 'name',  'name_en', 'created_at', 'updated_at'];

    public function website_text()
    {
      return $this->hasMany('App\AdminModel\Website_text', 'id_pages');
    }

    public function website_text_without_sosmed()
    {
      return $this->hasMany('App\AdminModel\Website_text', 'id_pages')->where('prefix', '!=', 'sosmed');
    }



    public static function getAllPages() {
      return Pages::all();
    }
}
