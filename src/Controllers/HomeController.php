<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Post;
use Library\Get;

class HomeController {

    public function home() {
        return View::render('home', ['cond' => true]);
    }

}