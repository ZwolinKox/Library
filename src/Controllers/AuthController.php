<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;


class AuthController {
    
    public function login() {
        return View::render('login');
    }

    public function register() {
        return View::render('register');
    }
    
    public function loginUser() {
        $email = Post::get('email');
        $password = Post::get('password');

        if(Auth::login($email, $password))
            header('Location: ./home');
        else {
            return View::render('login', ['error' => 'Nie udało się zalogować']);
        }

        //Dodać obsługę błędów

    }

    public function registerUser() {
        $isError = false;
        $errors = [];

        $password = Post::get('password');
        $email = Post::get('email');
        $name = Post::get('name');
        $secondPassword = Post::get('password_confirmation');

        if($password === null) {
            $isError = true;
            $errors['errorPassword'] = "Hasło nie może być puste";
        }

        if($password === null) {
            $isError = true;
            $errors['errorEmail'] = "Email nie może być pusty";
        }

        if($password === null) {
            $isError = true;
            $errors['errorName'] = "Nazwa nie może być pusta";
        }

        if($password === null) {
            $isError = true;
            $errors['errorSecondPassword'] = "Pole potwierdź hasło nie może być puste";
        }

        if($password != $secondPassword) {
            $isError = true;
            $errors['errorPassword'] = "Hasła się nie zgadzają";
        } elseif(strlen($password) < 8) {
            $isError = true;
            $errors['errorPassword'] = "Hasło powinno mieć minimum 8 znaków";
        }

        if($isError) {
            return View::render('register', $errors);
        }
        
        $register = Auth::register($email, $password, $name);

        if($register) {
            $this->loginUser();
        } else {
            return View::render('register', ['email' => $register]);
        }   
        
    }

    public function logout() {
        Auth::logout();
        header('Location: ./login');
    }
}
