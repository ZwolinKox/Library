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
}
