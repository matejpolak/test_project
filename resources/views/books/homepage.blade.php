@extends('wrapper')

@section('title')Homepage @endsection

@section('content')
    <div class="container-fluid border border-mat border-right-0 border-left-0 border-top-0">
        <div class="w-75 mx-auto">
            <div class="row">
                <div class="col-6 pr-2 d-flex flex-column justify-content-between">
                    <div class="mt-5">
                        <h3>Bookify - Your personal library</h3>
                        <p>Add as many books as you want into your own personal library. Create a new shelf for your books. Mark them as "readed", "reading", or "want to read" and make them behave as you wish. Add descriptions, notes, ratings and their authors.</p>
                    </div>
                    <div class="row mb-5">
                        <div class="col-5">
                            <button type="button" class="btn mat-outline-btn btn-block" data-toggle="modal" data-target="#loginModal">Login</button>
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn mat-outline-btn btn-block" data-toggle="modal" data-target="#registerModal">Create a free account</button>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <img class="w-100 my-3" src="/img/imac.png" alt="Imac with photo">
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-light">
        <div class="w-75 mx-auto">
            <div class="row">
                <div class="col-6 mt-5 d-flex justify-content-around">
                    <div>
                        <img class="mat-mainimages" src="/img/books-10.png" alt="Three books in a row">
                    </div>
                </div>
                <div class="col-6 my-auto">
                    <h3>Add Books</h3>
                    <p>Add all books you had ever read in your life. Or those that you are going to read or just simply those you like.</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6 my-auto">
                    <h3>Take notes, and add ratings</h3>
                    <p>You can create a notes about specific book, add ratings to them, and create something like your own books rating database</p>
                </div>
                <div class="col-6 mt-5 d-flex justify-content-around">
                    <div>
                        <img class="mat-mainimages mx-auto" src="/img/ratings-10.png" alt="Three books in a row">
                    </div>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-6 mt-5 d-flex justify-content-around">
                    <div>
                        <img class="mat-mainimages" src="/img/author-10.png" alt="Three books in a row">
                    </div>
                </div>
                <div class="col-6 my-auto">
                    <h3>Add authors</h3>
                    <p>Add all books you had ever read in your life. Or those that you are going to read or just simply those you like.</p>
                </div>
            </div>
        </div>
    </div>

@endsection