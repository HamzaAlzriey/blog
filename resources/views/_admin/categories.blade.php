@extends('_admin.layout.master')
@section('content')
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
<header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fa fa-folder-open-o"></i> Category</h1>
            </div>
        </div>
    </div>
</header>
<!-- posts -->
<section id="posts" class="pt-2">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Categories</h4>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Post Count</th>
                                <th>Date Posted</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                            <tr>
                                <td scope="row">{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{count($item->posts)}}</td>
                                <td> {{$item->created_at->diffForHumans()}}</td>
                             
                                <td>

                                       <a class="ml-2" href="{{ route('category.destroy', $item->id) }}"><i class="far fa-trash-alt"></i></a>
                                       <a class="ml-2 edit" href="#" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->id}}" data-name="{{$item->name}}">
                                        <i class="fas fa-edit"> </i>
                                        </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <nav class="ml-4">
                        {{ $category->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Category Modal -->
<div class="modal fade"  id="exampleModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Add Category</h5>
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body">
                <form method="GET" action="{{ route('category.update') }}" accept-charset="UTF-8"
                    class="form-horizontal" role="form">
                   
                    @csrf
                    <input type="hidden" name="id" id="id">

                  

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"  name="name" id="name" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                        <button type="submit" class="btn btn-success"> Save Changes</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


@endsection