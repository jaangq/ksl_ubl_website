<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\AdminModel\Users;
use App\AdminModel\User_roles;
use KSLAlert;

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
       $user = new Users;
       try{
           $user->name = $request->input('name');
           $user->username = $request->input('username');
           $user->email = $request->input('email');
           $user->password = hash::make($request->input('password'));
           $user->id_user_roles = $request->input('role');
           $user->save();

           $text = ucfirst($request->input('roleName')).' '.$user->name.' has been added';
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
        $user = Users::find($id);
        try{
            $user->name = $request->input('name');
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = hash::make($request->input('password'));
            $user->id_user_roles = $request->input('role');
            $user->save();

            $text = ucfirst($request->input('roleName')).' '.$user->name.' has been updated';
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
}
