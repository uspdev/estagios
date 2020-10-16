<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Uspdev\Utils;

use Socialite;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\LoginEmpresaMail;
use App\Models\Empresa;
use App\Utils\EmpresaUtils;
use Illuminate\Support\Facades\Hash;

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
            'cnpj'  => 'required|cnpj'
          ]);

        if($validator->fails()){
            return redirect('/login/empresa')->withErrors($validator)->withInput();
        }

        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
       
        # Se a empresa já tem cadastro, mas o email informando não coincide com o banco de dados
        $empresa = Empresa::where('cnpj',$cnpj)->first();

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

        /* Se há um campo de senha, vamos logar por ele */
        if($request->password){
            $user = User::where('cnpj',$cnpj)->first();
            if($user){
                if (Hash::check($request->password, $user->password)) {
                    $empresa = EmpresaUtils::login($request->cnpj, $request->email);
                    return view('empresas.edit')->with('empresa', $empresa);
                }
            }
            request()->session()->flash('alert-danger','Senha não confere!');
            return redirect('/login/empresa');
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
            $empresa = EmpresaUtils::login($request->cnpj, $request->email);
            return view('empresas.edit')->with('empresa', $empresa);
        } else {
            $request->session()->flash('alert-danger',
                "Url de login expirada, crie uma url nova!");
            return redirect('/login/empresa');
        }
    }


}
