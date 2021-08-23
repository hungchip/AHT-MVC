<?php

namespace MVC\src\Models;

use MVC\src\Core\Model;

class StudentModel extends Model
{
    protected $name;
    protected $id;
    protected $class_name;
    protected $age;
    protected $created_at;
    protected $updated_at;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setClassName($class_name)
    {
        $this->class_name = $class_name;
    }

    public function getClassName()
    {
        return $this->class_name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
