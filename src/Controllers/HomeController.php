<?php

namespace Library\Controllers;
use Library;
use Library\View;

class HomeController {

    public function home() {
        return View::render('home', ['cond' => true]);
    }

}