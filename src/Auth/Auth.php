<?php

namespace Library\Auth;

use Library\Models;
use ORM\Model\Model;
use Carbon\Carbon;

class Auth {
    public static function isLogin() : bool {
        if(isset($_SESSION['login']) && $_SESSION['login'])
            return true;
        return false;
    }   

    public static function user(){
        $user = new Models\User();        
        return $user->getElementById($_SESSION['id']);
    }

    public static function setUser(int $id) {
        $_SESSION['id'] = $id; 
        $_SESSION['login'] = true;
    }

    public static function login(string $email, string $password) : bool {
        $user = new Models\User();
        $user = $user->getElement(['email' => $email, 'password' => md5($password)]);

        if(!is_object($user))
            return false;

        Auth::setUser($user->id);

        return true;
        
    }

    public static function logout() {
        $_SESSION['login'] = false;
        $_SESSION['id']  = null;
        unset($_SESSION['login']);
        unset($_SESSION['id']);

        session_destroy();
    }

    public static function register(string $email, string $password, string $name) {
        $user = new Models\User();

        if(is_object($user->getElement(['email' => $email])))
            return 'Istnieje użytkownik o podanym emailu';

        $user->insert(['name' => $name, 'password' => md5($password), 'email' => $email, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);

        return true;
    }

}