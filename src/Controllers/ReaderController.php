<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\User;


class ReaderController {
    public function readers() {
        $user = new User;
        
        $users = $user->getElements();

        return View::render('readers', ['users' => $users]);
    }
}
