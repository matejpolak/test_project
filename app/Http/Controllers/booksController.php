<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use Illuminate\Http\Request;

class booksController extends Controller
{
    public function index() {
        $view = view('books/books');
        $id = auth()->user()->id;
        $books = Book::where('user_id', $id)->get();
        $authors = Author::get();
        $view->books = $books;
        $view->authors = $authors;
        return $view;
    }

    public function store($id = null) {

        if($id) {
            // select existing object for updating
            $book = Book::findOrFail($id);
        } else {
            //prepare new object
            $book = new Book();
        }


        //insert data
        if($_POST['title'] !== null) {
        $book->title = $_POST['title'];
        };
        if($_POST['description'] !== null) {
        $book->description = $_POST['description'];
        };
        if($_POST['cover'] !== null) {
            $book->cover = $_POST['cover'];
        };
        if($_POST['finished'] !== null) {
            $book->finished_reading_at = $_POST['finished'];
        };
        if($_POST['my_review'] !== null) {
        $book->my_review = $_POST['my_review'];
        };
        if($_POST['my_rating'] !== null) {
        $book->my_rating = $_POST['my_rating'];
        };
        if($_POST['author'] !== null) {
            $book->author_id = $_POST['author'];
        };
        $book->user_id = auth()->user()->id;

        // save
        $book->save();

        // inform user about success
        session()->flash('success_message', 'The movie has been successfully saved!');

        //redirect
        return redirect()->action('booksController@index');
    }

    public function new() {

        $book = new Book();

        //insert data
        if($_POST['title'] !== null) {
            $book->title = $_POST['title'];
        };
        if($_POST['description'] !== null) {
            $book->description = $_POST['description'];
        };
        if($_POST['my_review'] !== null) {
            $book->my_review = $_POST['my_review'];
        };
        if($_POST['finished'] !== null) {
            $book->finished_reading_at = $_POST['finished'];
        };
        if($_POST['my_rating'] !== null) {
            $book->my_rating = $_POST['my_rating'];
        };
        if($_POST['cover'] !== null) {
            $book->cover = $_POST['cover'];
        };
        $book->user_id = auth()->user()->id;

        // save
        $book->save();

        // inform user about success
        session()->flash('success_message', 'The movie has been successfully saved!');

        //redirect
        return redirect()->action('booksController@index');
    }
}
