<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'update_at'];

}
