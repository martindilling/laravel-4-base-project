<?php namespace MDH\Base\Repositories;

interface UserRepositoryInterface
{
    /**
     * Order descending by created at
     *
     * @return $this
     */
    public function orderCreatedDesc();
}
