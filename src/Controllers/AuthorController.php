<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\Author;


class AuthorController {
    public function authors() {

        $author = new Author;
        
        $authors = $author->getElements();

        return View::render('authors', ['authors' => $authors]);
    }
}
