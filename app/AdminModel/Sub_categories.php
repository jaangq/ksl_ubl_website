<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Sub_categories extends Model
{
    //
    protected $fillable = ['id', 'name', 'desc', 'name_en', 'desc_en', 'created_at', 'update_at', 'id_categories'];
}
