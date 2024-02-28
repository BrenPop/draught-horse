<?php

namespace App\Repositories;

use App\Repositories\Interfaces\IBaseRepository;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements IBaseRepository
{
    /**
     * Model instance
     * 
     * @var Model
     */
    protected $model;

    /**
     * Constructor
     * 
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * Find record by ID
     * 
     * @param int $id
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Create new record
     * 
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update record
     * 
     * @param array $data
     */
    public function update(array $data, $id)
    {
        return $this->model->findById($id)->update($data);
    }

    /**
     * Delete record
     * 
     * @param int $id
     */
    public function delete($id)
    {
        return $this->model->findById($id)->delete();
    }
}
