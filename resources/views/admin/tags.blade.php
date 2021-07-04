@extends('layout.master')
@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>
                        Tags
                        <a href="{{ route('tag.create') }}" class="btn btn-secondary float-right">Create New</a>
                    </h2>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tag as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>

                                        <div class="row">

                                            <div>
                                                <a href=" {{ route('tag.edit', ['tag' => $item->id]) }}"
                                                    class="btn btn-info">Edit</a>
                                            </div>



                                            <form action="{{ route('tag.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>


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
