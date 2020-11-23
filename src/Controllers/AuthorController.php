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

    public function newAuthor() {

        $author = new Author;

        $author->insert([
            'first_name' => Post::get('firstName'),
            'last_name' => Post::get('lastName')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editAuthor($id) {
        $author = new Author;

        $author->update(['id' => $id], [
            'first_name' => Post::get('firstName'),
            'last_name' => Post::get('lastName')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function deleteauthor($id) {
        $author = new Author;

        $author->delete(['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}
