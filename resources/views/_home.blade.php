@extends('layout._master')
@section('content')


  @section('content')
  <h1>Home</h1>
  <h1 class="my-4">Page Heading
    <small>Secondary Text</small>
  </h1>
  @foreach ($posts as $item)
    <!-- Blog Post -->
  <div class="card mb-4">
    <img class="card-img-top"  src="https://static1.squarespace.com/static/57263bf8f8baf385ff61bb09/t/5b88706021c67c3ac9fe7992/1622579896753/"  style="  max-width:100% ; max-height: 500px" alt="Card image cap">
    <div class="card-body">
      <h2 class="card-title">{{$item->title}}</h2>
      <p class="card-text">{{Str::limit($item->body,'120',' ...')}}</p>
     
      <a href=" {{ route('h_show', $item->id) }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
      Posted on  {{$item->created_at->diffForHumans()}} by 
      {{-- //<a href="#">{{$item->user->name}}</a>  --}}
    </div>
  </div>    
  @endforeach



  {{ $posts->links() }} 

  @endsection

  