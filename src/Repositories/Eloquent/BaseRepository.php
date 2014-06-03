<?php namespace MDH\Base\Repositories\Eloquent;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\MessageBag;
use StdClass;

abstract class BaseRepository
{

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $query;

    /**
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Construct
     *
     * @param \Illuminate\Support\MessageBag $errors
     */
    public function __construct(MessageBag $errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve all entities
     *
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $with = array())
    {
        $entity = $this->getQuery($with);

        return $entity->get();
    }

    /**
     * Find a single entity by key value
     *
     * @param string $key
     * @param string $value
     * @param array  $with
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \Illuminate\Database\Eloquent\Model|static|null
     */
    public function getFirstBy($key, $value, array $with = array())
    {
        $entity = $this->getQuery($with)->where($key, '=', $value)->first();

        $this->FailIfNotFound($entity);

        return $entity;
    }

    /**
     * Find many entities by key value
     *
     * @param string $key
     * @param string $value
     * @param array  $with
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getManyBy($key, $value, array $with = array())
    {
        return $this->getQuery($with)->where($key, '=', $value)->get();
    }

    /**
     * Return the errors
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Find a single entity
     *
     * @param int   $id
     * @param array $with
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $with = array())
    {
        $query = $this->getQuery($with);

        $entity = $query->find($id);

        $this->FailIfNotFound($entity);

        return $entity;
    }

    /**
     * Create a new entity
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update an existing entity
     *
     * @param int   $id
     * @param array $attributes
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $attributes)
    {
        $entity = $this->find($id);

        $this->FailIfNotFound($entity);

        return $entity->update($attributes);
    }

    /**
     * Delete an existing entity
     *
     * @param int $id
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return boolean
     */
    public function delete($id)
    {
        $entity = $this->find($id);

        $this->FailIfNotFound($entity);

        return $entity->delete($id);
    }

    /**
     * Get Results by Page
     *
     * @param int   $page
     * @param int   $limit
     * @param array $with
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function getByPage($page = 1, $limit = 10, $with = array())
    {
        $result             = new StdClass;
        $result->page       = $page;
        $result->limit      = $limit;
        $result->totalItems = 0;
        $result->items      = array();

        $query = $this->getQuery($with);
        $totalItems = $query->count();

        $users = $query->skip($limit * ($page - 1))->take($limit)->get();

        $result->totalItems = $totalItems;
        $result->items      = $users->all();

        return $result;
    }

    /**
     * Register Validators
     *
     * @param string    $name
     * @param Validible $validator
     */
    public function registerValidator($name, $validator)
    {
        $this->validators[$name] = $validator;
    }

    /**
     * Check to see if the input data is valid
     *
     * @param       $name
     * @param array $data
     * @return boolean
     */
    public function isValid($name, array $data)
    {
        if ($this->validators[$name]->with($data)->passes()) {
            return true;
        }

        $this->errors = $this->validators[$name]->errors();

        return false;
    }

    /**
     * Get query to build on
     *
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    protected function getQuery(array $with = array())
    {
        if (isset($this->query)) {
            return $this->query->with($with);
        }

        $this->query = $this->make($with);

        return $this->query;
    }

    /**
     * Make a new instance of the entity to query on
     *
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Builder|static
     */
    protected function make(array $with = array())
    {
        return $this->model->with($with);
    }

    /**
     * Throw exception if entity not found
     * 
     * @param $entity
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    protected function FailIfNotFound($entity)
    {
        if (!$entity) {
            throw with(new ModelNotFoundException)->setModel(get_class($this->model));
        }
    }

}
