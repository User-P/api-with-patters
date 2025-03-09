<?php

    namespace App\Providers;

    use App\Interfaces\RolePermissionRepositoryInterface;
    use App\Interfaces\UserRepositoryInterface;
    use App\Repositories\RolePermissionRepository;
    use App\Repositories\UserRepository;
    use App\Services\RegisterService;
    use Illuminate\Support\ServiceProvider;

    class AuthServiceProvider extends ServiceProvider
    {
        public function register()
        {
            $this->app->bind(
                'App\Interfaces\AuthRepositoryInterface',
                'App\Repositories\AuthRepository'
            );

            $this->app->bind(RegisterService::class, RegisterService::class);
            $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
            $this->app->bind(RolePermissionRepositoryInterface::class, RolePermissionRepository::class);
        }

        /**
         * Bootstrap services.
         */
        public function boot(): void
        {
            //
        }
    }
