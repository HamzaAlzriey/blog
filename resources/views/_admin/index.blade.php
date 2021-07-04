@extends('_admin.layout.master')
@section('content')
    <header id="main-header" class="py-2 bg-secondary text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-gear"></i> Dashboard</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="action" class="py-4 mb-4 ng-light">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
                        <i class="fa fa-plus"></i> Add Post
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
                        <i class="fa fa-plus"></i> Add Category
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#addTagModal">
                        <i class="fa fa-plus"></i> Add tag
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
                        <i class="fa fa-plus"></i> Add User
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- posts -->
    <section id="posts">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>Latest Post</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titel</th>
                                    <th>Body</th>
                                    <th>Category</th>
                                    <th>published</th>
                                    <th>Date Posted</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                    <tr>
                                        <td scope="row">{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{!! Str::limit($item->body, '120', ' ...') !!}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            <a href="{{ route('post.active', ['post'=> $item->id]) }}" class="btn {{$item->published ? "btn-outline-primary" : "btn-primary"}}">
                                                {{$item->published ? "Yes" : "No"}}
                                            </a>
                                            </td>
                                        <td>Aug 27, 2019</td>
                                        <td>
                                            <a href=" {{ route('post.edit', ['post' => $item->id]) }}"
                                                class="btn btn-secondary">
                                                <i class="fa fa-angle-double-right"></i> Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <nav class="ml-4">
                            {{ $posts->links() }}
                        </nav>
                    </div>
                </div>
                <div class=" col-md-3">
                    <div class="card text-center bg-primary text-white mb-3">
                        <div class="card-body">
                            <h3>Posts</h3>
                            <h1 class="display-4">
                                <i class="fa fa-pencil"></i> {{ App\Models\Post::count() }}
                            </h1>

                            <a href="{{ route('post.show_all') }}" class="btn btn-outline-light btn-sm"
                                id="btn-view">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-success text-white mb-3">
                        <div class="card-body">
                            <h3>Categories</h3>
                            <h1 class="display-4">
                                <i class="fa fa-folder-open-o"></i> {{ App\Models\Category::count() }}
                            </h1>
                            <a href="{{ route('category.allcategory') }}" class="btn btn-outline-light btn-sm"
                                id="btn-view">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-info text-white mb-3">
                        <div class="card-body">
                            <h3>Tags</h3>
                            <h1 class="display-4">
                                <i class="fa fa-tags"></i> {{ App\Models\Tag::count()}}
                            </h1>
                            <a href="{{ route('tag.alltag') }}" class="btn btn-outline-light btn-sm" id="btn-view">View</a>
                        </div>
                    </div>
                    <div class="card text-center bg-warning text-white mb-3">
                        <div class="card-body">
                            <h3>User</h3>
                            <h1 class="display-4">
                                <i class="fa fa-users"></i> {{ App\Models\User::count()}}
                            </h1>
                            <a href="{{ route('user.index') }}" class="btn btn-outline-light btn-sm"
                                id="btn-view">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modals -->
    <!-- Post Modal -->
    <div class="modal fade" id="addPostModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Add Post</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('post.store') }}" accept-charset="UTF-8"
                        class="form-horizontal" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control">
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
                            <label for="category">Tags</label>
                            <select class="form-control" required="required" id="tag_id" name="tag_id[]" multiple>
                                @foreach ($tags as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Image Upload</label>
                            <input type="file" name="image" id="" class="form-control-file">
                            <small class="form-text text-muted">Max Size 3mb</small>
                        </div>
                        <div class="form-group green-border-focus">
                            <label for="body">Body</label>
                            <textarea name="body" id="editor" class="form-control rounded-0" rows="5"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                            <button type="submit" class="btn btn-primary"> Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Category Modal -->
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action=" {{ route('category.store') }}" accept-charset="UTF-8"
                        class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                            <button class="btn btn-success"> Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Tag Modal -->
    <div class="modal fade" id="addTagModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add Tag</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action=" {{ route('tag.store') }}" accept-charset="UTF-8"
                        class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="nametag" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                            <button class="btn btn-success"> Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- User Modal -->
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Add User</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action=" {{ route('user.store') }}" accept-charset="UTF-8"
                        class="form-horizontal" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password1">Password</label>
                            <input type="password" id="password1" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password2">Password again</label>
                            <input type="password" id="password2" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                            <button type="submit" class="btn btn-warning"> Save Changes</button>
                        </div>
                    </form>
                </div>
                {{-- <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                    <button class="btn btn-warning" data-dismiss="modal"> Save Changes</button>
                </div> --}}
            </div>
        </div>
    </div>
   
    @endsection