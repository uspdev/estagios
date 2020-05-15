<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Uspdev\Utils;

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

        /* Se a empresa já tem cadastro, mas o email informando não coincide o banco de dados
           informamos */
        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
        $empresa = Empresa::where('cnpj',$cnpj)->first();
        if (!is_null($empresa)) {
            if($empresa->email_de_contato != $request->email){
                $email_limpo = Utils::partially_email($empresa->email_de_contato);

                $request->session()->flash('alert-danger',
                    "Email informando {$request->email} não corresponde ao cnpj 
                    {$request->cnpj} cadastrado.");

                $request->session()->flash('alert-info',
                    "Dica do email cadastrado: {$email_limpo} para o 
                    respectivo cnpj. Caso necessite trocar,
                    escreva para estagiosfflch@usp.br informando o novo email da empresa.");

                return redirect('/login/empresa');
            }
        }
        
        /* Se a empresa não tem cadastro ou o cnpj coincide com o cadastro, enviamos a url de login */
        $url_login = URL::temporarySignedRoute('login_empresa', now()->addMinutes(120), [
            'cnpj' => $cnpj,
            'email' => $request->email,
        ]);

        Mail::send(new LoginEmpresaMail($url_login,$request->email));
        $request->session()->flash('alert-info',
            'Informações de login enviadas para o email: ' . $request->email);

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