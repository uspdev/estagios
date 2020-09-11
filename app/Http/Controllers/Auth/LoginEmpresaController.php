<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
        # Se a empresa já tem cadastro, mas o email informando não coincide com o banco de dados */
        $empresa = Empresa::where('cnpj',$cnpj)
                  ->orWhere('email',$request->email)->first();

        if (!is_null($empresa)) {
            if( ($empresa->email != $request->email) | ($empresa->cnpj != $cnpj) ){
                $email_limpo = Utils::partially_email($empresa->email);

                $request->session()->flash('alert-danger',
                    "Foi solicitado login para email <b> {$request->email} </b>e cnpj <b>{$request->cnpj}</b></br> <br>
                    Porém, no sistema consta a relação:<br>
                    email <b>{$email_limpo}</b> e cnpj <b>{$empresa->cnpj}</b> <br><br>
                    Caso necessite corrigir esses dados, escreva para estagiosfflch@usp.br 
                    informando o cnpj e email correto da empresa
                    ");
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
 
            /* Inserindo empresa na tabela de usuários para login */
            $user_cnpj = User::where('cnpj',$request->cnpj)->first();
            $user_email = User::where('email',$request->email)->first();

            if(is_null($user_email) & is_null($user_cnpj)) $user = new User;

            # se existir o cadastro difere deletamos ambos
            if(!is_null($user_email) & !is_null($user_cnpj)) {
                if( ($user_email->email != $user_cnpj->email) |
                    ($user_email->cnpj  != $user_cnpj->cnpj)){
                        $user_email->delete();
                        $user_cnpj->delete();
                    }
            }

            if(!is_null($user_email) & is_null($user_cnpj)) {
                $empresa = Empresa::where('cnpj',$user_email->cnpj)->first();
                if(!is_null($empresa)){
                    if($empresa->email != $user_email->email) $user_email->delete();
                } else {
                    $user = $user_email;
                }
            }

            if(is_null($user_email) & !is_null($user_cnpj)) {
                $empresa = Empresa::where('cnpj',$user_cnpj->cnpj)->first();
                if(!is_null($empresa)){
                    if($empresa->email != $user_cnpj->email) $user_cnpj->delete();
                } else {
                    $user = $user_cnpj;
                }
            }
            

            $user->cnpj  = $request->cnpj;
            $user->name  = $request->cnpj;

            $user->email = $request->email;
            $user->save();
            Auth::login($user, true);

            /* Verificando se empresa tem cadastro, se não, redirecionar para pagina
               de criação da empresa, se não, redirecionar para página de atualização dos dados */
               
            $empresa = Empresa::where('cnpj',$request->cnpj)->first();
            if (is_null($empresa)) {
                $empresa = new Empresa;
                $empresa->cnpj = $request->cnpj;
                $empresa->email = $request->email;
                return view('empresas.create')->with('empresa',$empresa);
            } else {
                return view('empresas.edit')->with('empresa', $empresa);
            }
            
        } else {
            $request->session()->flash('alert-danger',
            "Url de login expirada, crie uma url nova!");
            return redirect('/login/empresa');
        }
    }


}