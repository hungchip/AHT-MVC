<?php

namespace MVC\src\Models;

use MVC\src\Core\ResourceModel;
use MVC\src\Models\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct($table, $id, TaskModel $task)
    {
        parent::_init($table, $id, $task);
    }
}
