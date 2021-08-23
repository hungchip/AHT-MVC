<?php

namespace MVC\src\Models;

use MVC\src\Core\ResourceModel;

class StudentResource extends ResourceModel
{
    public function __construct($table, $id, StudentModel $student)
    {
        parent::_init($table, $id, $student);
    }
}
