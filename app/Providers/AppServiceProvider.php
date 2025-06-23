<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//use App\Policies\RolePolicy;
//use App\Policies\PermissionPolicy;
//use Spatie\Permission\Models\Role;
//use Spatie\Permission\Models\Permission;
 
use Illuminate\Support\Facades\Gate;

use App\Models\User;

use BezhanSalleh\PanelSwitch\PanelSwitch;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Para cargar todos los estilos de la pagina...
        
        if(config('app.env') === 'local')
        {
            $this->app['request']->server->set('HTTPS',false);
        }

        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true: null;
        });

        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) 
        {
            $panelSwitch
            ->modalHeading('PUEDE CAMBIAR DE SESSION A TRAVEZ DEL SWITCH...')
            
            ->labels([
            'admin' => 'PANEL ADMINISTRADOR',
            'app' => 'PANEL VETERINARIO',
            ])

            ->icons([
            'admin' => 'heroicon-o-shield-exclamation',
            'app' => 'heroicon-o-users',
            ], $asImage = false)

            ->visible(fn (): bool => auth()->user()?->hasAnyRole([
            
                'Super Admin',
                //'veterinarian',
            
            ]));
        });


        //Gate::policy(Role::class, RolePolicy::class);
        //Gate::policy(Permission::class, PermissionPolicy::class);
    }
}
