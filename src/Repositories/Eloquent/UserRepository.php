<?php namespace MDH\Base\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\MessageBag;
use MDH\Base\Repositories\SharedInterfaces\Crudable;
use MDH\Base\Repositories\SharedInterfaces\Paginateable;
use MDH\Base\Repositories\SharedInterfaces\RepositoryInterface;
use MDH\Base\Repositories\SharedInterfaces\StdClass;
use MDH\Base\Repositories\UserRepositoryInterface;

class UserRepository extends BaseRepository implements RepositoryInterface, Crudable, Paginateable, UserRepositoryInterface
{
    /**
     * Construct
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct(new MessageBag);

        $this->model = $model;
    }

    /**
     * Order descending by created at
     *
     * @return $this
     */
    public function orderCreatedDesc()
    {
        $this->query = $this->getQuery()
            ->orderBy('created_at', 'desc');

        return $this;
    }

    public function count()
    {
        return $this->getQuery()->count();
    }
}
