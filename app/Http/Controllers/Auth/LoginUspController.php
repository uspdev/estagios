<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Socialite;
use App\User;
use App\Parecerista;
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

        /* Vamos deixar logar em dois casos: se estiver em pareceristas ou estiver no .env */
        $parecerista = Parecerista::where('numero_usp',$userSenhaUnica->codpes)->first();
        $admins = explode(',', trim(config('estagios.admins')));
        if(is_null($parecerista) & !in_array($userSenhaUnica->codpes, $admins)){
            request()->session()->flash('alert-danger', 'Você não tem permissão de login');
            return redirect('/');
        } 

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