@extends('layout.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Create Post

                        <a href="{{ route('post.index') }}" class="btn btn-primary float-right">Go Back</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('post.store') }}" accept-charset="UTF-8" class="form-horizontal"
                        role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-md-2 control-label">Title</label>

                            <div class="col-md-8">
                                <input class="form-control" required="required" autofocus="autofocus" name="title"
                                    type="text" id="title" />

                                <span class="help-block">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="body" class="col-md-2 control-label">Body</label>

                            <div class="col-md-8">
                                <textarea class="form-control" required="required" name="body" cols="50" rows="10"
                                    id="body"></textarea>
                            </div>
                        </div>


                        <div class="form-group ml-3">
                            <label for="exampleFormControlFile1">Image Post</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-row ml-3">

                            <div class="form-group">
                                <label for="category_id" class="col-md-2 control-label">Category</label>

                                <div class="">
                                    <select class="form-control" required="required" id="category_id" name="category_id">
                                        @foreach ($categories as $item)
                                            <option value={{ $item->id }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="form-group ml-3">
                                <label for="category_id" class="col-md-2 control-label">Tag</label>

                                <div class="">
                                    <select class="form-control" required="required" id="category_id" name="category_id">
                                        @foreach ($tags as $item)
                                            <option value={{ $item->id }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
