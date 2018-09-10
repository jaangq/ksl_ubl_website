<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Uploaded_files extends Model
{
    //
    protected $table = 'uploaded_files';
    protected $fillable = ['id', 'name', 'mime', 'size', 'hash', 'created_at', 'updated_at', 'id_users'];


}
