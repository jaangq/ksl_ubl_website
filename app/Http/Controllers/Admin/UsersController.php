<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\AdminModel\Pages;
use App\AdminModel\Users;
use App\AdminModel\User_roles;
use KSLAlert;
use View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $data['pages'] = Pages::getAllPages();
        $data['users'] = Users::orderBy('id', 'DESC')->paginate(3);
        $data['roles'] = User_roles::all();
        return view('admin.users')->with('data', $data);
        // $users = new Users;
        // return view('admin.users')->with('users', $users->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $jsData = json_decode($request->input('jsData'));
       $user = new Users;
       try{
           $user->name = $jsData->name;
           $user->username = $jsData->username;
           $user->email = $jsData->email;
           $user->password = hash::make($jsData->password);
           $user->id_user_roles = $jsData->role;
           $user->save();

           $text = ucfirst($jsData->roleName.' '.$user->name.' has been added');
           $type = 'success';
           $strongText = 'Successfully !';
           return KSLAlert::makesAlert($text, $type, $strongText);
        }
        catch(\Exception $e){
           // do task when error
           $text = 'Failed to add user';
           $type = 'danger';
           $strongText = 'Error !';
           if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
             $text = 'Username Or Email already exists !';
           }
           return KSLAlert::makesAlert($text, $type, $strongText);
        }
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $jsData = json_decode($request->input('jsData'));
        $user = Users::find($id);
        try{
            $user->name = $jsData->name;
            $user->username = $jsData->username;
            $user->email = $jsData->email;
            $user->password = $jsData->password ?  hash::make($jsData->password) : $user->password;
            $user->id_user_roles = $jsData->role;
            $user->save();

            $text = ucfirst($jsData->roleName).' '.$user->name.' has been updated';
            $type = 'success';
            $strongText = 'Successfully !';
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
         catch(\Exception $e){
            // do task when error
            $text = 'Failed to update user';
            $type = 'danger';
            $strongText = 'Error !';
            if (preg_match('/^.+\[(23000)\]/', $e->getMessage(), $match)) {
              $text = 'Username Or Email already exists !';
            }
            return KSLAlert::makesAlert($text, $type, $strongText);
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Users::find($id);
        $role = $user->user_roles->name;
        $uname = $user->username;
        $user->delete();

        $text = ucfirst($role).' '.$uname.' has been deleted';
        $type = 'success';
        $strongText = 'Successfully !';
        return KSLAlert::makesAlert($text, $type, $strongText);
    }

    /**
     * Display a listing of the resource by searched data.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        //
        $val = $request->input('val');

        $data['users'] = Users::join('user_roles', 'user_roles.id', '=', 'users.id_user_roles')
                          ->where('users.id','LIKE','%'.$val.'%')
                          ->orWhere('user_roles.name','LIKE','%'.$val.'%')
                          ->orwhere('users.name','LIKE','%'.$val.'%')
                          ->orWhere('username','LIKE','%'.$val.'%')
                          ->orWhere('email','LIKE','%'.$val.'%')
                          ->orWhere('users.created_at','LIKE','%'.$val.'%')
                          ->orWhere('users.updated_at','LIKE','%'.$val.'%')
                          ->select('users.*')->orderBy('users.id', 'DESC')
                          ->paginate(3);
        $data['pages'] = Pages::getAllPages();
        $data['roles'] = User_roles::all();
        $html = View('admin.users')->with('data', $data)->render();
        die($html);

    }
}
