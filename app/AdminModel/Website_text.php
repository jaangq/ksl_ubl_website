<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Website_text extends Model
{
    //
    protected $table = 'website_text';
    protected $fillable = ['id', 'label', 'label_en', 'content', 'content_en', 'prefix', 'created_at', 'updated_at', 'id_pages'];

}
