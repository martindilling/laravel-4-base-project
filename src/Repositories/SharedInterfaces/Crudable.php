<?php namespace MDH\Base\Repositories\SharedInterfaces;

interface Crudable {

    /**
     * Find a single entity
     *
     * @param int   $id
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $with = array());

    /**
     * Create a new entity
     *
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes);

    /**
     * Update an existing entity
     *
     * @param int   $id
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $attributes);

    /**
     * Delete an existing entity
     *
     * @param int $id
     * @return boolean
     */
    public function delete($id);

}
