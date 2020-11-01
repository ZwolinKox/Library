<?php

namespace Library\Request;

class Get {
    public static function get(string $index) {
        if(isset($_GET[$index]))
            return $_GET[$index];
        return null;
    }

    public static function set(string $index, $value) {
        $_GET[$index] = $value;
    }
}