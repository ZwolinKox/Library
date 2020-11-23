<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\Loan;

class LoanController {
    public function loans() {

        $loan = new Loan;
        
        $loans = $loan->query('SELECT l.id, l.loans_date, l.deadline_date, l.return_date, u.name AS user_name, e.name AS employee_name, b.name AS book_name FROM loans l
         INNER JOIN users u ON (l.user_id = u.id) INNER JOIN employees e ON (l.employee_id = e.id) INNER JOIN books b ON (l.book_id = b.id)');

        return View::render('loans', ['loans' => (object)$loans]);
    }

    public function newBook() {

        $loan = new Loan;

        $loan->insert([
            'loans_date' => Post::get('loansDate'),
            'dedline_date' => Post::get('dedalineDate'),
            'return_date' => Post::get('returnDate'),
            'user_id' => Post::get('userId'),
            'employee_id' => Post::get('employeeId'),
            'book_id' => Post::get('bookId')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editBook($id) {
        $loan = new Loan;

        $loan->update(['id' => $id], [
            'loans_date' => Post::get('loansDate'),
            'dedline_date' => Post::get('dedalineDate'),
            'return_date' => Post::get('returnDate'),
            'user_id' => Post::get('userId'),
            'employee_id' => Post::get('employeeId'),
            'book_id' => Post::get('bookId')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function deleteBook($id) {
        $loan = new Loan;

        $loan->delete(['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}
