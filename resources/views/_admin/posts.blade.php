@extends('_admin.layout.master')
@section('content')

    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-pencil"></i> Posts</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="action" class="py-4 mb-4 ng-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-success">Search</button>
                        </span>
                    </div>
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
                            <h4>Latest Post</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titel</th>
                                    <th>Category</th>
                                    <th>Date Posted</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $item)
                                <tr>
                                    <td scope="row">{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>Aug 27, 2019</td>
                                    <td>
                                        <a href=" {{ route('post.edit', ['post' => $item->id]) }}" class="btn btn-secondary">
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
            </div>
        </div>
    </section>


    @endsection