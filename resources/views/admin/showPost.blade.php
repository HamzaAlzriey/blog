@extends('layout.master')
@section('content')


        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2>
                  {{$Post->title}}
                  <small>by Prof. General Huel IV</small>

                  <a href="/admin/posts" class="btn btn-default pull-right"
                    >Go Back</a
                  >
                </h2>
              </div>

              <div class="panel-body">
                <p>
                  {{$Post->body}}
                </p>

                <p><strong>Category: </strong>ipsum</p>
                <p><strong>Tags: </strong></p>
              </div>
            </div>
          </div>
        </div>

        @endsection