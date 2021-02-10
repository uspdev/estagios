<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Parecerista;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            $admins = explode(',', trim(config('estagios.admins')));
            return in_array($user->codpes, $admins);
        });

        Gate::define('parecerista', function ($user) {
            if(is_null($user->codpes)) return False;

            $parecerista = Parecerista::where('numero_usp',$user->codpes)->first();
            if(!is_null($parecerista)) 
              if($parecerista->numero_usp == $user->codpes) return True;
            return False;
        });

        Gate::define('empresa', function ($user, $cnpj = null) {
            if(!empty($user->cnpj)){
                # 1. A empresa tem um cnpj cadastrado, mas não foi passado na requisição do Gate
                if(is_null($cnpj)) return True;

                # 2. A empresa tem um cnpj cadastrado e foi passado na requisição
                if($user->cnpj == $cnpj) return True;
                return False;
            }
            return False;
        });

        Gate::define('admin_ou_empresa', function ($user, $cnpj = null) {
            if(Gate::allows('admin')) return True;
            return Gate::allows('empresa',$cnpj);
        });

        Gate::define('logado', function ($user) {
            return true;
        });

        Gate::define('owner', function ($user, $model) {
            if(Gate::allows('admin')) return true;
            if($model->user_id == $user->id) return true;
            return false;
        });

    }
}
