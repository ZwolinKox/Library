<?php

namespace Library\Request;

class Post {
    public static function get(string $index) {
        return $_POST[$index];
    }

    public static function set(string $index, $value) {
        $_POST[$index] = $value;
    }
}