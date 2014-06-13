<?php namespace MDH\Base\Repositories;

interface UserRepositoryInterface
{
    /**
     * Order descending by created at
     *
     * @return $this
     */
    public function orderCreatedDesc();

    /**
     * Get the user count
     *
     * @return integer
     */
    public function count();
    
    /**
     * Register a new user
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function register(array $attributes);
}
