<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\Book;
use Library\Models\Author;

class BookController {
    public function books() {

        $book = new Book;
        $authors = new Author;
        $authors = $authors->getElements();

        $books = $book->query('SELECT b.name, b.id, a.first_name AS author_first_name, a.last_name AS author_last_name FROM books b INNER JOIN authors a ON b.author_id = a.id');

        return View::render('books', ['books' => (object)$books, 'authors' => $authors]);
    }

    public function newBook() {

        $book = new Book;

        $book->insert([
            'name' => Post::get('bookName'),
            'author_id' => Post::get('authorId')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editBook($id) {
        $book = new Book;

        $book->update(['id' => $id], [
            'name' => Post::get('bookName'),
            'author_id' => Post::get('authorId')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function deleteBook($id) {
        $book = new Book;

        $book->delete(['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}
