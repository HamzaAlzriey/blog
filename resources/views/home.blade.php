@extends('layout.master')
@section('content')
    <div class="container">

        <!-- Comments Form -->
        {{-- <div class="row">
            <div class="card col-md-8 ">
                <div class="card">
                    <div class="card-header">
                        Create Post
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('comment.store') }}">
                            @csrf
                            <div class="form-row">


                                <div class="form-group form-group col-md-6">
                                    <input type="text" class="form-control" name="title" placeholder="Title">
                                </div>
                                <div class="form-group form-group col-md-7">
                                    <textarea class="form-control" name="body" rows="3" placeholder="Body"></textarea>
                                </div>
                                <div class="form-group">

                                    <div class="form-row ">
                                        <div class="form-group col-md-3">

                                            <select class="form-control form-control-sm">
                                                <option>Tag select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">

                                            <select class="form-control form-control-sm">
                                                <option>Category select</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">

                                            <input type="file" class="custom-file-input" id="file" name="image">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </form>
                    </div>
                </div>


            </div>
        </div> --}}

      

        <section id="actions" class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <a href="#" class="btn background-primary btn-block" data-toggle="modal"
                            data-target="#addPostModal">
                            <i class="fas fa-plus"></i> Add Post
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ADD POST MODAL -->
        <div class="modal fade" id="addPostModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header background-primary text-white">
                        <h5 class="modal-title">Add Post</h5>
                        <button class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('post.store') }}" accept-charset="UTF-8"
                            class="form-horizontal" role="form" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="postTitle">
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>

                                <select class="form-control" id="postCategory" name="category_id">
                                    <option selected="selected">Choose One...</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image">
                                    <label for="image" class="custom-file-label">Choose File</label>
                                    <small class="form-text text-muted">Max Size 3Mb</small>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="body">Body</label>
                                    <textarea name="body"></textarea>
                                    <script>
                                        CKEDITOR.replace('body');

                                    </script>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- <div class="modal-footer">
                        <button class="btn background-primary" data-dismiss="modal" id="addPostBtn">Add Post</button>
                    </div> --}}
                </div>
            </div>
        </div>



        <div class="row mt-5">
            <div class="col-md-8">
                @foreach ($posts as $item)


                    <!-- Blog Post -->
                    <div class="card mb-4">
                       @if ($item->image)
                       
                       <img class="img-thumbnail" src="{{ asset($item->image) }}" alt="Card image cap" style="max-width: 50%;">
                       @endif
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->title }}</h2>
                            <p class="card-text">{!! Str::limit($item->body, '120', ' ...') !!}</p>

                            <a href=" {{ route('h_show', $item->id) }}" class="btn btn-primary">Read More &rarr;</a>

                            <div class="" style="display: inline">

                                @foreach ($item->tags as $tag)
                                    <span class=" badge badge-warning ">{{ $tag->name }}</span>

                                @endforeach


                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $item->created_at->diffForHumans() }} by
                            {{-- //<a href="#">{{$item->user->name}}</a> --}}

                        </div>

                    </div>

                @endforeach
            </div>
            @include('layout.sidepar')

        </div>
    </div>

    {{ $posts->links() }}

@endsection
