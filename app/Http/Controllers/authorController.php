<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class authorController extends Controller
{

    public function list() {
        $view = view('books/authors');
        $authors = Author::get();
        $view->authors = $authors;
        return $view;
    }

    public function new() {

        $author = new Author();

        //insert data
        if($_POST['name'] !== null) {
            $author->name = $_POST['name'];
        };
        if($_POST['birthdate'] !== null) {
            $author->year_of_birth = $_POST['birthdate'];
        };

        // save
        $author->save();

        // inform user about success
        session()->flash('success_message', 'The movie has been successfully saved!');

        //redirect
        return redirect()->action('authorController@list');
    }

    public function destroy($id) {
        Author::where('id', $id)->delete();

        return redirect()->action('authorController@list');
    }

    public function edit($id) {
        $author = Author::find($id);

        $author->name = $_POST['name'];
        $author->year_of_birth = $_POST['birthdate'];

        $author->save();

        return redirect()->action('authorController@list');
    }
}
