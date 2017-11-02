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
                            <button type="button" class="books-button" data-toggle="modal" data-target="#bookDetail-{{ $book['id'] }}">
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
        <?php $author = \App\Author::where('authors.id', '=', $book->author_id)->get()?>
        <div class="modal fade" id="bookDetail-{{ $book['id'] }}" tabindex="-1" role="dialog" aria-labelledby="bookDetailLabel" aria-hidden="true">
            <div class="modal-dialog mat" role="document">
                <div class="modal-content mat-modal">
                    <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                        <span><h5 class="modal-title" id="bookDetailLabel"><i class="fa fa-book mr-2" aria-hidden="true"></i>  {{ $book['title'] }}</h5></span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="bookform" action="{{ action('booksController@store', ['id' => $book['id']]) }}" method="post">
                            {{ csrf_field() }}
                            <span class="detail hidden"><h5><i class="fa fa-book mr-2" aria-hidden="true"></i></h5><input class="form-control" type="text" name="title" value="{{ $book['title'] }}"></span>
                            <span class="detail"><h5><i class="fa fa-info-circle mr-2" aria-hidden="true"></i> Description</h5><p>{{ $book['description'] }}</p></span>
                            <span class="detail hidden"><h5><i class="fa fa-info-circle mr-2 mt-2" aria-hidden="true"></i> Description</h5><input class="form-control" type="text" name="description" value="{{ $book['description'] }}"></span>
                            <span class="detail"><h5><i class="fa fa-user mr-2" aria-hidden="true"></i> Author</h5><p>{{ $author[0]['name'] }}</p></span>
                            <span class="detail hidden"><h5><i class="fa fa-user mr-2 mt-2" aria-hidden="true"></i> Author</h5><input class="form-control" type="text" name="name" value="{{ $author[0]['name'] }}"></span>
                            <span class="detail"><h5><i class="fa fa-comment mr-2" aria-hidden="true"></i> Notes</h5><p>{{ $book['my_review'] }}</p></span>
                            <span class="detail hidden"><h5><i class="fa fa-comment mr-2 mt-2" aria-hidden="true"></i> Notes</h5><input class="form-control" type="text" name="my_review" value="{{ $book['my_review'] }}"></span>
                            <span class="detail"><h5><i class="fa fa-star mr-2" aria-hidden="true"></i> Rating</h5><p>{{ $book['my_rating'] }}</p></span>
                            <span class="detail hidden"><h5><i class="fa fa-star mr-2 mt-2" aria-hidden="true"></i> Rating</h5><input class="form-control" type="text" name="my_rating" value="{{ $book['my_rating'] }}"></span>
                            <button type="submit" class="btn mat-btn submit hidden">Submit</button>
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

    <div class="modal fade" id="newBook" tabindex="-1" role="dialog" aria-labelledby="bookDetailLabel" aria-hidden="true">
        <div class="modal-dialog mat" role="document">
            <div class="modal-content mat-modal">
                <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                    <h5 class="modal-title" id="bookDetailLabel">Add new book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/book/new" method="post">
                        {{ csrf_field() }}
                        <span><h5><i class="fa fa-book mr-2" aria-hidden="true"></i> Title</h5><input class="form-control" type="text" name="title" value="" placeholder="Enter book title"></span>
                        <span><h5><i class="fa fa-link mr-2 mt-2" aria-hidden="true"></i> Cover</h5><input class="form-control" type="text" name="cover" value="" placeholder="Enter link to the book cover"></span>
                        <span><h5><i class="fa fa-info-circle mr-2 mt-2" aria-hidden="true"></i> Description</h5><input class="form-control" type="text" name="description" value="" placeholder="Enter description"></span>
                        <span><h5><i class="fa fa-comment mr-2 mt-2" aria-hidden="true"></i> Notes</h5><input class="form-control" type="text" name="my_review" value="" placeholder="Enter your review"></span>
                        <span><h5><i class="fa fa-star mr-2 mt-2" aria-hidden="true"></i> Rating</h5><input class="form-control" type="text" name="my_rating" value="" placeholder="Enter your rating"></span>
                        <button type="submit" class="btn mat-btn submit">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mat-btn" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('.edit').click(function() {

            $('.edit').text('Details');
            if($('.edit').text() == 'Details') {
                $('.edit').text('Edit');
            }
            $('.submit').toggleClass('hidden');
            $('.detail').toggleClass('hidden');
        })
    </script>
@endsection