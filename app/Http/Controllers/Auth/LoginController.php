<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\User;
use Socialite;

class LoginController extends Controller
{

    public function saveUser($provider) {
      try {
        $users = new User();
        $user = Socialite::driver($provider)->user();
        $username = isset($user->nickname) ? $user->nickname : $user->name;
        $name = isset($user->name) ? $user->name : $user->email;
        $arr = (object)[
            'provider' => $provider,
            'provider_id' => $user->id,
            'name' => $name,
            'username' => $username,
            'password' => Hash::make($provider.'-'.$username.'ksl'),
            'email' => $user->email,
            'dp' => $user->avatar,
            'url' => $user->user['url'],
            'id_user_roles' => '2',
        ];
        session(['user_sos' => $arr]);
        // $request->session()->put('user_sos', $arr);
        foreach($arr as $key => $user_arr) {
          $users->{$key} = $arr->{$key};
        }
        $users->save();
        redirect()->to(url()->previous().'#comment-textarea')->send();
      } catch(\Exception $e) {
        redirect()->to(url()->previous().'#comment-textarea')->send();
      }
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProviderGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleProviderCallbackGithub(Request $request)
    {
        LoginController::saveUser('github');
    }



    public function redirectToProviderGoogle()
    {
       return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle(Request $request)
    {
      LoginController::saveUser('google');
    }



    public function redirectToProviderInstagram()
    {
       return Socialite::driver('instagram')->redirect();
    }

    public function handleProviderCallbackInstagram(Request $request)
    {
      LoginController::saveUser('instagram');
    }




    public function redirectToProviderFacebook()
    {
       return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook(Request $request)
    {
      LoginController::saveUser('facbook');
    }


}
