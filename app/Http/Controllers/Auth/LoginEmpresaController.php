<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;

use Socialite;
use App\User;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoginEmpresaMail;

class LoginEmpresaController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function gera()
    {
        $cnpj = 123456;

        $url = URL::temporarySignedRoute('login_empresa', now()->addMinutes(4), ['cnpj' => $cnpj]);
        Mail::send(new LoginEmpresaMail($url));
        dd($url);
    }

    public function empresa(Request $request)
    {
        if ($request->hasValidSignature()) {
            dd("tá valendo");
        } else {
            dd("Não tá valendo");
        }
        
        dd("empresa");
        //$userSenhaUnica = Socialite::driver('senhaunica')->user();
        //$user = User::where('codpes',$userSenhaUnica->codpes)->first();

        //if (is_null($user)) $user = new User;

        // bind do dados retornados
        //$user->codpes = $userSenhaUnica->codpes;
        //$user->email = $userSenhaUnica->email;
        //$user->name = $userSenhaUnica->nompes;
        //$user->save();
        //Auth::login($user, true);
        //return redirect('/');
    }
}