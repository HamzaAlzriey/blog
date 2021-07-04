@extends('_admin.layout.master')
@section('content')
<script>
    $(document).ready(function () {
      $("#myButton").click(function () {
        $("#update_myform").submit();
      });
    });
    </script>

    <header id="main-header" class="py-2 bg-primary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-pencil"></i> Post one</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="action" class="py-4 mb-4 ng-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{ route('post.index') }}" class="btn btn-secondary btn-block">
                        <i class="fa fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
                <div class="col-md 3">

                </div>
                <div class="col-md-3">
                    <a href="javascript:$('#update_myform').submit();" id="myButton" class="btn btn-warning btn-block"
                        >
                        <i class="fa fa-check"></i> Save Changes
                    </a>
                </div>
                <div class="col-md-3">

                    <form id="delet_myform" action="{{ route('post.destroy', $post->id) }}" method="post">
                        @csrf
                        @method('Delete')
                    </form>

                    

                    <a href="javascript:$('#delet_myform').submit();" class="btn btn-danger btn-block"
                        >
                        <i class="fa fa-remove"></i> Delete Post
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- posts -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Post</h4>
                        </div>
                        <div class="card-body">
                            <form id="update_myform" method="POST" action="{{ route('post.update', [$post->id]) }}"
                                accept-charset="UTF-8" class="form-horizontal" role="form">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="postCategory" name="category_id">
                                        <option selected="selected" value="{{ $post->category->id }}">
                                            {{ $post->category->name }}</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Tags">Tags</label>
                                    <select class="form-control" required="required" id="tag_id" name="tag_id[]"
                                        multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" 
                                                @foreach ($post->tags as $postTag) 
                                                    {{ $tag->id == $postTag->id ? 'selected' : '' }} 
                                                @endforeach>{{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="file">Image Upload</label>
                                    <input type="file" name="imag" id="" class="form-control-file">
                                    <small class="form-text text-muted">Max Size 3mb</small>
                                    <div>

                                        <img style="width: 120px" class="img-thumbnail"
                                            src=" {{ asset($post->image) }}" alt="imag">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="body">Body</label>
                                    <textarea id="editor" name="body" class="form-control"
                                        rows="10">{{ $post->title }}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

 