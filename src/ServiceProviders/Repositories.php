<?php namespace MDH\Base\ServiceProviders;

use MDH\Base\Models\User;
use MDH\Base\Repositories\Eloquent\UserRepository;

class Repositories extends BaseServiceProvider
{
    public function register()
    {
        $this->registerUserRepository();
    }

    /**
     * Register User Repository
     */
    public function registerUserRepository()
    {
        $this->app->bind('MDH\Base\Repositories\UserRepositoryInterface', function()
        {
            return new UserRepository(new User);
        });
    }
}
