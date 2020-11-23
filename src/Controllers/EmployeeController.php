<?php

namespace Library\Controllers;
use Library;
use Library\View;
use Library\Auth\Auth;
use Library\Request\Post;
use Library\Request\Get;
use Library\Models\Employee;

class EmployeeController {
    public function employees() {

        $employee = new Employee;
        
        $employees = $employee->getElements();

        return View::render('employees', ['employees' => (object)$employees]);
    }

    public function newBook() {

        $employee = new Employee;

        $employee->insert([
            'name' => Post::get('employeeName'),
            'email' => Post::get('employeeEmail'),
            'is_admin' => Post::get('isAdmin')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function editBook($id) {
        $employee = new Employee;

        $employee->update(['id' => $id], [
            'name' => Post::get('employeeName'),
            'email' => Post::get('employeeEmail'),
            'is_admin' => Post::get('isAdmin')
        ]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }

    public function deleteBook($id) {
        $employee = new Employee;

        $employee->delete(['id' => $id]);

        header('Location: '.$_SERVER['HTTP_REFERER']);
        exit;
    }
}
