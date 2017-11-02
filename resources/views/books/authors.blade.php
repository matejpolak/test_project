@extends('wrapper')

@section('title')Autors @endsection

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 mx-auto">
                <div class="col-8 mx-auto">
                    <button class="btn mat-btn btn-block" data-toggle="modal" data-target="#newAuthor">
                        Add new author
                    </button>
                </div>

                    <div class="col-7 mx-auto">
                        <div class="row d-flex justify-content-between mt-2">
                            @foreach($authors as $author)
                                <div class="col-5 card mb-2">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-user mr-2" aria-hidden="true"></i>{{ $author->name }}</h4>
                                        <h6 class="card-subtitle mb-2 text-muted">({{ $author->year_of_birth }})</h6>
                                        <div class="mat-text d-flex flex-row-reverse">
                                            <span class="ml-auto">
                                                <a class="mr-2" href="/authors/delete/{{ $author->id }}"><i class="fa fa-trash-o" aria-hidden="true"></i> </a>
                                                <buttton> <i class="fa fa-pencil-square-o" aria-hidden="true" data-toggle="modal" data-target="#editAuthor-{{ $author->id }}"></i></buttton>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

            </div>
        </div>
    </div>

    @foreach($authors as $author)
        <div class="modal fade" id="editAuthor-{{ $author->id }}" tabindex="-1" role="dialog" aria-labelledby="bookDetailLabel" aria-hidden="true">
            <div class="modal-dialog mat" role="document">
                <div class="modal-content mat-modal">
                    <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                        <h5 class="modal-title" id="bookDetailLabel">Edit author's details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ action('authorController@edit', ['id' => $author->id]) }}new" method="post">
                            {{ csrf_field() }}
                            <span>
                                <h5><i class="fa fa-user mr-2" aria-hidden="true"></i> Full name</h5>
                                <input class="form-control" type="text" name="name" value="{{ $author->name }}">
                            </span>

                            <span>
                                <h5><i class="fa fa-calendar mr-2 mt-2" aria-hidden="true"></i> Date of birth</h5>
                                <input class="form-control" type="number" name="birthdate" value="{{ $author->year_of_birth }}">
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
    @endforeach
<!-- MODAL -->
    <div class="modal fade" id="newAuthor" tabindex="-1" role="dialog" aria-labelledby="bookDetailLabel" aria-hidden="true">
        <div class="modal-dialog mat" role="document">
            <div class="modal-content mat-modal">
                <div class="modal-header border-mat border-top-0 border-left-0 border-right-0">
                    <h5 class="modal-title" id="bookDetailLabel">Add new author</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/author/new" method="post">
                        {{ csrf_field() }}
                        <span>
                            <h5><i class="fa fa-user mr-2" aria-hidden="true"></i> Full name</h5>
                            <input class="form-control" type="text" name="name" value="" placeholder="Enter author's name">
                        </span>

                        <span>
                            <h5><i class="fa fa-calendar mr-2 mt-2" aria-hidden="true"></i> Date of birth</h5>
                            <input class="form-control" type="number" name="birthdate" value="" placeholder="Enter author's birthdate">
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
@endsection