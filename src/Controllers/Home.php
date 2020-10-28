<?php

namespace Library\Controllers;
use Library;

class Home {

    public function zwolin() {
        return Library\View::render('home.latte', ['cond' => true]);
    }

}