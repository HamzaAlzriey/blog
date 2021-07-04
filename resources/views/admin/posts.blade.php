@extends('layout.master')
@section('content')

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            Posts

                            <a href="{{ route('post.create') }}" class="btn btn-secondary float-right">Create New</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Post as $item)
                                        <tr>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->body}}</td>
                                    <td>Prof. General Huel IV</td>
                                    <td>ipsum</td>
                                    <td></td>
                                    <td>
                                    @if( $item->published == 0)         
                                        No
                                    @else
                                        Yes       
                                    @endif
                                    </td>
                                    <td>
                                       
                                        <a href="{{route('post.show', ['post' => $item->id])}}" data-method="PUT" data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                            data-confirm="Are you sure?" class="btn btn-warning col-sm-6 ">Publish</a>
                                        <a href="{{route('post.show', ['post' => $item->id])}}" class="btn btn-success col-sm-6">Show</a>
                                        <a href="/posts/1/edit" class="btn btn-info col-sm-6">Edit</a>
                                        <a href="/posts/1" data-method="DELETE" data-token="32Mxrb2s2QPyv3C1h4iYcbfZBT7PmU7Tfm9koxkk"
                                            data-confirm="Are you sure?" class="btn btn-danger col-sm-6 " >Delete</a>
                                    </td>
                                </tr>   
                                @endforeach
                         
                               
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>

        </div>

        @endsection