<?php

namespace MVC\src\Core;

use MVC\src\Config\Database;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;

    public function _init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }

    public function save($model)
    {

        $arrayModel = $model->getProperties();
        $arrValue = [];
        // var_dump($arrayModel);
        echo '<br/>';
        if ($model->getId() === null) {
            unset($arrayModel['id']); // loại bỏ id ra khỏi mảng
        }

        foreach ($arrayModel as $key => $value) {
            array_push($arrValue, ':' . $key); // tạo placeholder
        }

        $arr2 = [];
        foreach (array_keys($arrayModel) as $key => $value) {
            if ($value !== 'id' || $value !== 'created_at') {
                array_push($arr2, $value . ' = :' . $value);
            }
        }

        $arr2 = implode(',', $arr2);
        $colName = implode(',', array_keys($arrayModel));
        $val = implode(',', $arrValue);
        // var_dump($arrayModel);
        // die;
        if ($model->getId() === null) {
            $sql = "INSERT INTO $this->table ($colName) VALUES ($val)";
            $req = Database::getBdd()->prepare($sql);
            $date = array("created_at" => date("Y-m-d H:i:s"), "updated_at" => date("Y-m-d H:i"));
            $data = array_merge($arrayModel, $date);
            return $req->execute($data);
        } else {
            $arr2 = str_replace(",created_at = :created_at", "", $arr2);
            $sql = "UPDATE $this->table SET $arr2 WHERE id = :id";
            $req = Database::getBdd()->prepare($sql);
            $date = array("id" => $model->getId(), "updated_at" => date("Y-m-d H:i"));
            unset($arrayModel['created_at']);
            $data = array_merge($arrayModel, $date);
            return $req->execute($data);
        }
    }

    public function delete($model)
    {
        $sql = "DELETE FROM $this->table WHERE id = {$model->getId()}";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute();
    }

    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    public function getAll($model)
    {
        $properties = implode(',', array_keys($model->getProperties()));
        $sql = "SELECT $properties FROM $this->table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
}