<?php

namespace Library\Request;

class Post {
    public static function get(string $index) {
        if(isset($_POST[$index]))
            return $_POST[$index];
        else
            null;
    }

    public static function set(string $index, $value) {
        $_POST[$index] = $value;
    }
}