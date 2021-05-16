<?php


namespace Niko\User\Providers;

use Illuminate\Support\ServiceProvider;
use Niko\User\Models\User;

class UserServiceProvider extends ServiceProvider
{
    public  function  register()
    {

        config()->set('auth.providers.users.model',User::class);
    }

    public function boot()
    {

      $this->loadRoutesFrom(__DIR__ . '/../Routes/user_routes.php');
      $this->LoadMigrationsFrom(__DIR__ . '/../Database/Migrations');
      $this->loadFactoriesFrom(__DIR__ . '/../Database/Factories');
      $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'User');
    }
}
