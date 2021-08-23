<?php

namespace MVC\src\Controllers;

use MVC\src\Core\Controller;
use MVC\src\Models\StudentModel;
use MVC\src\Models\StudentRepository;

class StudentController extends Controller
{
    private $studentRepo;

    public function __construct()
    {
        $this->studentRepo = new StudentRepository();
    }

    public function index()
    {
        $student = new StudentModel();
        $data['students'] = $this->studentRepo->getAll($student);
        $this->set($data);
        $this->render("index");
    }

    public function create()
    {
        extract($_POST);
        if (isset($_POST['name']) || isset($_POST['class_name']) || isset($_POST['age'])) {
            $student = new StudentModel();
            $student->setName($name);
            $student->setClassName($class_name);
            $student->setAge($age);
            if ($this->studentRepo->add($student)) {
                header("Location: " . WEBROOT . "student/index");
            }
        }

        $this->render("create");
    }

    public function edit($id)
    {
        extract($_POST);
        $data['student'] = $this->studentRepo->get($id);
        if (isset($name) || isset($class_name) || isset($age)) {
            $student = new StudentModel();
            $student->setId($id);
            $student->setName($name);
            $student->setClassName($class_name);
            $student->setAge($age);
            if ($this->studentRepo->update($student)) {
                header("Location: " . WEBROOT . "student/index");
            }
        }
        $this->set($data);
        $this->render("edit");
    }

    public function delete($id)
    {
        extract($_POST);
        $student = new StudentModel();
        $student->setId($id);
        if($this->studentRepo->delete($student)) {
            header("Location: " . WEBROOT . "student/index");
        }
    }
}
