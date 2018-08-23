<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $fillable = ['id', 'name',  'name_en', 'created_at', 'update_at'];

    public static function getAllPages() {
      return Pages::all();
    }
}
