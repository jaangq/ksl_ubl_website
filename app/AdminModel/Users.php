<?php

namespace App\AdminModel;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $fillable = ['id', 'name', 'username', 'email', 'password', 'created_at', 'updated_at', 'id_user_roles'];

    public function user_roles()
    {
      return $this->belongsTo('App\AdminModel\User_roles', 'id_user_roles');
    }
}
