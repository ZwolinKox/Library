<?php

namespace Library\Controllers;
use Library;
use Library\View;

class AuthController {
    
    public function login() {
        return View::render('login');
    }

    public function register() {
        return View::render('register');
    }
    
    public function loginUser() {

    }

    public function registerUser() {

    }
}
