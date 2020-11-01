<?php

namespace Library\Request;

class Get {
    public static function get(string $index) {
        return $_GET[$index];
    }

    public static function set(string $index, $value) {
        $_GET[$index] = $value;
    }
}