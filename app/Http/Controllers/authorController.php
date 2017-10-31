<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authorController extends Controller
{

    public function list() {
        $view = view('books/author_list');

        return $view;
    }

    public function create() {
        $view = view('books/newauthor');

        return $view;
    }
}
