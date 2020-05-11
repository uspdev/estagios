<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

use Socialite;
use App\User;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoginEmpresaMail;
use App\Empresa;

class LoginEmpresaController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(Request $request)
    {
        return view('login.empresa');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'cnpj' => 'required|cnpj'
          ]);

        if($validator->fails()){
            return redirect('/login/empresa')->withErrors($validator)->withInput();
        }

        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
        $url = URL::temporarySignedRoute('login_empresa', now()->addMinutes(120), [
            'cnpj' => $cnpj,
            'email' => $request->email,
        ]);

        $empresa = Empresa::where('cnpj',$cnpj)->first();
        if (!is_null($empresa)) {
            if($empresa->email_de_contato != $request->email){
                $request->session()->flash('alert-danger','Email informando não corresponde ao cadastrado');
                return redirect('/login/empresa');
            }
        }
        
        Mail::send(new LoginEmpresaMail($url,$request->email, $empresa));
        $request->session()->flash('alert-info','Informações de login enviadas para o email: ' . $request->email);
        return redirect('/');
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