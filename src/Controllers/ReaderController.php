<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\User;


class ReaderController {
    public function readers() {
        $user = new User;
        
        $users = $user->getElements();

        return View::render('readers', ['users' => $users]);
    }

    public function newBook() {

        $user = new User;

        $user->insert([
            'name' => Post::get('name'),
            'email' => Post::get('email'),
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editBook($id) {
        $user = new User;

        $user->update(['id' => $id], [
            'name' => Post::get('name'),
            'email' => Post::get('email'),
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function deleteBook($id) {
        $user = new User;

        $user->delete(['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}
