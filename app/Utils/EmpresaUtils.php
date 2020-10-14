<?php

namespace App\Utils;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Support\Facades\Hash;
use Auth;

class EmpresaUtils
{

    public static function login($cnpj,$email) {
        $cnpj = preg_replace("/[^0-9]/", "", $request->cnpj);
        
        $user = self::user([
            'cnpj'     => $cnpj,
            'email'    => $email,
            'password' => '',
            'nome'     => ''
        ]);
        auth()->login($user);

        /* Verificando se empresa tem cadastro, se não, redirecionar para pagina
           de criação da empresa, se não, redirecionar para página de atualização dos dados */
           
        $empresa = Empresa::where('cnpj',$cnpj)->first();
        if (is_null($empresa)) {
            $empresa = new Empresa;
            $empresa->cnpj = $cnpj;
            $empresa->email = $email;
        }
        return $empresa;
    }


    public static function user(array $empresa) {
        $user = User::where('cnpj',$empresa['cnpj'])->first();
        if(is_null($user)) {
            $user = new User;
            $user->name = $empresa['cnpj'];
        }
        $user->cnpj  = $empresa['cnpj'];
        $user->email = $empresa['email'];

        if(!empty($empresa['nome'])) {
            $user->name = $empresa['nome'];
        }
        if(!empty($empresa['password'])) {
            $user->password = Hash::make($empresa['password']);
        }
        $user->save();
        return $user;
    }
}
