
@extends('layout.master')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-8">
        

        <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          {{-- <a href="#">{{$post->user->name}}</a> --}}
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on  {{$post->created_at->diffForHumans()}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{$post->image}}" alt="adsf">

        <hr>

        <!-- Post Content -->
        <p style=" background-color:seashell">
          {!!$post->body!!}
        </p>



        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
              
            <form method="POST" action="{{ route('comment.store') }}">
                @csrf
              <input type="text" hidden name="post_id" value="{{$post->id}}">
              <div class="form-group">
                <textarea class="form-control" name="comment" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach ($post->comments as $comment)
          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0">{{$post->user->name}}</h5>
              
              {{ $comment->content }}
              
            </div>
          </div>
          
        @endforeach

    </div>

    @include('layout.sidepar')

  </div>
</div>
@endsection
