<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;

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

    public function logout() {
        Auth::logout();
        header('Location: ./login');
    }
}
