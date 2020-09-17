<?php

namespace App\Utils;

use App\User;
use App\Empresa;
use Auth;

class LoginEmpresa
{
    public static function login($cnpj, $email) {
      /* Inserindo empresa na tabela de usuários para login */
        $user_cnpj = User::where('cnpj',$cnpj)->first();
        $user_email = User::where('email',$email)->first();

        if(is_null($user_email) & is_null($user_cnpj)) $user = new User;

        # se existir o cadastro difere deletamos ambos
        if(!is_null($user_email) & !is_null($user_cnpj)) {

            if( $user_email->id == $user_cnpj->id ) {
                $user = $user_email;

            } else {
               $user_email->delete();
               $user_cnpj->delete();
               $user = new User;
            }
        }

        if(!is_null($user_email) & is_null($user_cnpj)) {
            $empresa = Empresa::where('cnpj',$user_email->cnpj)->first();
            if(!is_null($empresa)){
                if($empresa->email != $user_email->email) $user_email->delete();
                $user = new User;
            } else {
                $user = $user_email;
            }
        }
        
        if(is_null($user_email) & !is_null($user_cnpj)) {
            $empresa = Empresa::where('cnpj',$user_cnpj->cnpj)->first();
            if(!is_null($empresa)){
                if($empresa->email != $user_cnpj->email) $user_cnpj->delete();
                $user = new User;
            } else {
                $user = $user_cnpj;
            }
        }
        
        $user->cnpj  = $cnpj;
        $user->name  = $cnpj;
        $user->email = $email;
        $user->save();
        Auth::login($user, true);
        return $user;
    }
}
