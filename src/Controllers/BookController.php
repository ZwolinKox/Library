<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\Book;

class BookController {
    public function books() {

        $book = new Book;
        
        $books = $book->query('SELECT b.name, b.id, a.first_name AS author_first_name, a.last_name AS author_last_name FROM books b INNER JOIN authors a ON b.author_id = a.id');

        return View::render('books', ['books' => (object)$books]);
    }
}
