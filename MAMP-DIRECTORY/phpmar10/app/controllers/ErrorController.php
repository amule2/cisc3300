<?php

namespace app\controllers;

use Exception;
use Error;

class ErrorController {
    public function viewErrors() {
        try {
            if (true) {
                throw new Exception('Custom error message!');
            }
        } catch (Error $e) {
            echo 'Caught error';
        }



    }
}