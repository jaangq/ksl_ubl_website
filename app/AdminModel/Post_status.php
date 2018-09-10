<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Post_status extends Model
{
    //
    protected $table = 'post_status';
    protected $fillable = ['id', 'name', 'name_en', 'created_at', 'updated_at'];

}
