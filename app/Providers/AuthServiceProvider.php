<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
            return True;
        });

        Gate::define('empresa', function ($user, $cnpj = null) {
            if(!empty($user->cnpj)){
                if(is_null($cnpj)) return True;
                if($user->cnpj == $cnpj) return True;
            }
            return False;
        });

        Gate::define('admin_ou_empresa', function ($user, $cnpj = null) {
            if(Gate::allows('admin')) return True;
            return Gate::allows('empresa',$cnpj);
        });
    }
}
