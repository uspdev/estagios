<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\Models\User;
use App\Models\Parecerista;
use Auth;
use Illuminate\Http\Request;

class LoginUspController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('senhaunica')->redirect();
    }

    public function handleProviderCallback()
    {
        $userSenhaUnica = Socialite::driver('senhaunica')->user();

        $user = User::where('codpes',$userSenhaUnica->codpes)->first();
        if (is_null($user)) $user = new User;

        // bind do dados retornados
        $user->codpes = $userSenhaUnica->codpes;
        $user->email = $userSenhaUnica->email;
        $user->name = $userSenhaUnica->nompes;
        $user->save();
        Auth::login($user, true);
        return redirect('/');
    }
}