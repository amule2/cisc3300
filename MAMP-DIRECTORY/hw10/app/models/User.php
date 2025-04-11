<?php

namespace app\models;

//using the database class namespace
use app\models\Model;

class User extends Model {


    public function getAllUsers() {
        $query = "select * from users";
        return $this->query($query);
    }

    public function getUserById($id){
        $query = "select * from users where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function saveUser($inputData){
        $query = "insert into users (name, lastName, email, course) values (:name, :lastName, :email, :course);";
        //[
        //                'firstName' => $userData['firstName'],
        //                'lastName' => $userData['lastName'],
        //                'email' => $userData['email'],
        //            ]
        return $this->query($query, $inputData);
    }

    public function updateUser($inputData){
        $query = "update users set name = :name, lastName = :lastName, email = :email, course = :course where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteUser($inputData){
        $query = "DELETE FROM users where id = :id";
        return $this->query($query, $inputData);
    }
}