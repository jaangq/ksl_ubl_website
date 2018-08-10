<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class User_roles extends Model
{
    //
    protected $fillable = ['id', 'name', 'created_at', 'update_at'];

    // public function Users()
    // {
    //   return $this->hasMany('App\AdminModel\Users');
    // }
}
