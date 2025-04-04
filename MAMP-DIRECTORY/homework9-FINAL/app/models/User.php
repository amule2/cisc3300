<?php

namespace app\models;

class User extends Model {

    public function getUsers($name) {
        if ($name) {
            $query = "select * from notes WHERE name like :name";
            return $this->fetchAllWithParams($query, ['name' => '%' . $name . '%']);
        }
        $query = "select * from notes";
        return $this->fetchAll($query);
    }

    public function getUserById($id){
        $query = "select * from notes where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}