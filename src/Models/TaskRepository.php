<?php

namespace MVC\src\Models;

class TaskRepository
{
    private $resource;

    public function __construct()
    {
        $this->resource = new TaskResourceModel('tasks', null, new TaskModel);
    }

    public function add($model)
    {
        return $this->resource->save($model);
    }

    public function get($id)
    {
        return $this->resource->get($id);
    }

    public function update($model)
    {
        return $this->resource->save($model);
    }

    public function getAll($model)
    {
        return $this->resource->getAll($model);
    }

    public function delete($model)
    {
        return $this->resource->delete($model);
    }
}
