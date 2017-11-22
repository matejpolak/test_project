@extends('wrapper')

@section('title')Books @endsection

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 mx-auto">
                <div>
                    <button class="btn mat-btn btn-block" data-toggle="modal" data-target="#newBook">
                        Add new book
                    </button>
                </div>
                <div class="booklist mt-3">
                    <ul class="list-inline mt-3">
                        @foreach($books as $book)
                            <button type="button" class="books-button" data-toggle="modal"
                                    data-target="#bookDetail-{{ $book['id'] }}">
                                <li class="book">
                                    <img src="{{$book['cover']}}" alt="">
                                </li>
                            </button>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach($books as $book)
        <?php $singleAuthor = \App\Author::where('authors.id', '=', $book->author_id)->get()?>
        <div class="modal fade" id="bookDetail-{{ $book['id'] }}" tabindex="-1" role="dialog"
             aria-labelledby="bookDetailLabel" aria-hidden="true">
            <div class="modal-dialog mat" role="document">
                <div class="modal-content mat-modal">
                    <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                        <span><h5 class="modal-title" id="bookDetailLabel"><i class="fa fa-book mr-2"
                                                                              aria-hidden="true"></i> {{ $book['title'] }}</h5></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="editing-form" id="bookform"
                              action="{{ action('booksController@store', ['id' => $book['id']]) }}" method="post">
                        {{ csrf_field() }}

                        <!-- *****************************************  TITLE  ***************************************** -->
                            <span class="detail hidden">
                                <h5><i class="fa fa-book mr-2" aria-hidden="true"></i> Title</h5>
                                <input class="form-control" type="text" name="title" data-validation="title"
                                       value="{{ $book['title'] }}">
                            </span>
                            <!-- *****************************************  DESCRIPTION  ***************************************** -->
                            <span class="detail">
                                <h5><i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Description</h5>
                                <p>{{ $book['description'] }}</p>
                            </span>

                            <span class="detail hidden">
                                <h5><i class="fa fa-info-circle mr-2 mt-2" aria-hidden="true"></i> Description</h5>
                                <input class="form-control" type="text" name="description" data-validation="description"
                                       value="{{ $book['description'] }}">
                            </span>
                            <!-- *****************************************  COVER  ***************************************** -->
                            <span class="detail hidden">
                                <h5><i class="fa fa-picture-o mr-2 mt-2" aria-hidden="true"></i> Cover link</h5>
                                <input class="form-control cover-input" type="text" name="cover" data-validation="cover"
                                       value="{{ $book['cover'] }}">
                            </span>

                            <div class="col-3 mx-auto mt-2 detail hidden">
                                <div id="preview" class="mx-auto">
                                    <ul class="list-inline mt-3">
                                        <li class="book">
                                            <img class="cover-image"
                                                 src="{{ $book->cover }}"
                                                 alt="Book cover">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- *****************************************  FINISHED READING AT  ***************************************** -->
                            <span class="detail hidden">
                                <h5><i class="fa fa-calendar mr-2 mt-2" aria-hidden="true"></i> Finished reading at</h5>
                                <input class="form-control" type="date" name="finished" data-validation="finished"
                                       value="{{ $book['finished'] }}">
                            </span>

                            <span class="detail">
                                <h5><i class="fa fa-calendar mr-2" aria-hidden="true"></i> Finished reading at</h5>
                                <p>{{ $book['finished_reading_at'] }}</p>
                            </span>
                            <!-- *****************************************  AUTHOR  ***************************************** -->
                            <span class="detail">
                                <h5><i class="fa fa-user mr-2" aria-hidden="true"></i> Author</h5>
                                <p>{{ $singleAuthor[0]['name'] }}</p>
                            </span>

                            <span class="detail hidden">
                                <h5><i class="fa fa-user mr-2 mt-2" aria-hidden="true"></i> Author</h5>
                                <select class="select2 form-control" name="author">
                                    @foreach($authors as $author)
                                        <option value="{{ $author['id'] }}">{{ $author['name'] }}</option>
                                    @endforeach
                                </select>
                            </span>
                            <!-- *****************************************  NOTES  ***************************************** -->
                            <span class="detail">
                                <h5><i class="fa fa-comment mr-2" aria-hidden="true"></i> Notes</h5>
                                <p>{{ $book['my_review'] }}</p>
                            </span>

                            <span class="detail hidden"><h5><i class="fa fa-comment mr-2 mt-2" aria-hidden="true"></i> Notes</h5>
                                <input class="form-control" type="text" name="my_review" data-validation="notes"
                                       value="{{ $book['my_review'] }}">
                            </span>
                            <!-- *****************************************  RATING  ***************************************** -->
                            <span class="detail">
                                <h5><i class="fa fa-star mr-2" aria-hidden="true"></i> Rating</h5>
                                <span>@for($i = 0; $i < $book['my_rating']; $i++)<i class="fa fa-star mr-2 mat-star"
                                                                                    aria-hidden="true"></i>@endfor
                                    @for($i = $book['my_rating']; $i < 10; $i++)<i class="fa fa-star mr-2"
                                                                                   aria-hidden="true"></i>@endfor
                                </span>
                            </span>

                            <span class="detail hidden">
                                <h5><i class="fa fa-star mr-2 mt-2" aria-hidden="true"></i> Rating</h5>
                                <select name="my_rating" class="starselect">
                                  <option value="1" @if($book->my_rating == 1) selected @endif>1</option>
                                  <option value="2" @if($book->my_rating == 2) selected @endif>2</option>
                                  <option value="3" @if($book->my_rating == 3) selected @endif>3</option>
                                  <option value="4" @if($book->my_rating == 4) selected @endif>4</option>
                                  <option value="5" @if($book->my_rating == 5) selected @endif>5</option>
                                  <option value="6" @if($book->my_rating == 6) selected @endif>6</option>
                                  <option value="7" @if($book->my_rating == 7) selected @endif>7</option>
                                  <option value="8" @if($book->my_rating == 8) selected @endif>8</option>
                                  <option value="9" @if($book->my_rating == 9) selected @endif>9</option>
                                  <option value="10" @if($book->my_rating == 10) selected @endif>10</option>
                                </select>
                            </span>
                            <div class="mat-edit-btns">
                                <button type="submit" class="btn mat-btn-green submit hidden">Save</button>
                                <a role="button" class="btn mat-btn-red delete hidden" href="{{ action('booksController@delete', ['id' => $book->id]) }}">Delete</a>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mat-btn" data-dismiss="modal">Close</button>
                        <button type="button" class="btn mat-btn edit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="newBook" tabindex="-1" role="dialog" aria-labelledby="bookDetailLabel"
         aria-hidden="true">
        <div class="modal-dialog mat" role="document">
            <div class="modal-content mat-modal">
                <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                    <h5 class="modal-title" id="bookDetailLabel">Add new book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="newBook-form" action="/book/new" method="post">
                        {{ csrf_field() }}
                        <span>
                            <h5><i class="fa fa-book mr-2" aria-hidden="true"></i> Title</h5>
                            <input class="form-control" type="text" name="title" data-validation="title" value=""
                                   placeholder="Enter book title">
                        </span>

                        <span>
                            <h5><i class="fa fa-picture-o mr-2 mt-2" aria-hidden="true"></i> Cover</h5>
                            <input class="form-control cover-input" type="text" name="cover" value=""
                                   placeholder="Enter link to the book cover">
                        </span>

                        <div class="col-3 mx-auto mt-2">
                            <div id="preview" class="mx-auto">
                                <ul class="list-inline mt-3">
                                    <li class="book">
                                        <img class="cover-image"
                                             src="http://www.jameshmayfield.com/wp-content/uploads/2015/03/defbookcover-min.jpg"
                                             alt="Book cover">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <span>
                            <h5><i class="fa fa-info-circle mr-2 mt-2" aria-hidden="true"></i> Description</h5>
                            <input class="form-control" type="text" name="description" value=""
                                   placeholder="Enter description">
                        </span>

                        <span>
                            <h5><i class="fa fa-calendar mr-2 mt-2" aria-hidden="true"></i> Finished reading at</h5>
                            <input class="form-control" type="date" name="finished" data-validation="finished" value="">
                        </span>

                        <span>
                            <h5><i class="fa fa-comment mr-2 mt-2" aria-hidden="true"></i> Notes</h5>
                            <input class="form-control" type="text" name="my_review" value=""
                                   placeholder="Enter your review">
                        </span>

                        <span>
                            <h5><i class="fa fa-star mr-2 mt-2" aria-hidden="true"></i> Rating</h5>
                            <select name="my_rating" class="starselect">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                            </select>
                        </span>
                        <button type="submit" class="btn mat-btn submit mat-submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mat-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        /*
                EDITING BOOKS
         */
        $('.edit').click(function () {


            if ($(this).text() == 'Edit') {
                $(this).text('Details');
            } else {
                $(this).text('Edit');
            }
            ;
            $('.submit').toggleClass('hidden');
            $('.delete').toggleClass('hidden');
            $('.detail').toggleClass('hidden');
        })
        $(function () {
            $('.starselect').barrating({
                theme: 'fontawesome-stars'
            });
        });

        $('.cover-input').change(function () {
            var val = $(this).val();
            $('.cover-image').attr('src', val);
        });


        /*
                FORM VALIDATION
         */

        var form = $('#newBook-form');
        var validator = new Validator(form);


    </script>
@endsection