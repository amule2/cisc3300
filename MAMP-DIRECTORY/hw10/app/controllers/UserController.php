<?php

namespace app\controllers;

use app\models\User;

class UserController
{
    public function validateUser($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $lastName = $inputData['lastName'];
        $email = $inputData['email'];
        $course= $inputData['course'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['firstNameShort'] = 'first name is too short';
            }
        } else {
            $errors['requiredFirstName'] = 'first name is required';
        }

        if ($lastName) {
            $lastName = htmlspecialchars($lastName, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($lastName) < 2) {
                $errors['lastNameShort'] = 'last name is too short';
            }
        } else {
            $errors['requiredLastName'] = 'last name is required';
        }

        if ($email) {
            $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex, $email)) {
                $errors['invalidEmail'] = 'email is invalid.';
            }
        } else {
            $errors['requiredEmail'] = 'email is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'course' => $course
        ];
    }

    public function getAllUsers() {
        $userModel = new User();
        header("Content-Type: application/json");
        $users = $userModel->getAllUsers();

        echo json_encode($users);
        exit();
    }

    public function getUserByID($id) {
        $userModel = new User();
        header("Content-Type: application/json");
        $user = $userModel->getUserById($id);
        echo json_encode($user);
        exit();
    }

    public function saveUser() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'lastName' => $_POST['lastName'] ?: null,
            'email' => $_POST['email'] ?: null,
            'course' => $_POST['course'] ?: null,
        ];
        $userData = $this->validateUser($inputData);

        $user = new User();
        $user->saveUser(
            [
                'name' => $userData['name'],
                'lastName' => $userData['lastName'],
                'email' => $userData['email'],
                'course' => $userData['course']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'lastName' => $_PUT['lastName'] ?: null,
            'email' => $_PUT['email'] ?: null,
            'course' => $_PUT['course'] ?: null
        ];
        $userData = $this->validateUser($inputData);
        //we could save the data off to be saved here

        $user = new User();
        $user->updateUser(
            [
                'id' => $id,
                'name' => $userData['name'],
                'lastName' => $userData['lastName'],
                'email' => $userData['email'],
                'course' => $userData['course']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteUser($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $user = new User();
        $user->deleteUser(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function usersView() {
        include '../public/assets/views/user/users-view.html';
        exit();
    }

    public function usersAddView() {
        include '../public/assets/views/user/users-add.html';
        exit();
    }

    public function usersDeleteView() {
        include '../public/assets/views/user/users-delete.html';
        exit();
    }

    public function usersUpdateView() {
        include '../public/assets/views/user/users-update.html';
        exit();
    }


}