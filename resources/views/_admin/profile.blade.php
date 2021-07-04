@extends('_admin.layout.master')
@section('content')

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
                <div class="col-md-3 mr-auto">
                    <a href="index.html" class="btn btn-secondary btn-block">
                        <i class="fa fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#passwordModal">
                        <i class="fa fa-key"></i> Change Password
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="#" class="btn btn-success btn-block">
                        <i class="fa fa-check"></i> Save Changes
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
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group">
                                    <label for="emali">Your Email</label>
                                    <strong>{{$user->email}}</strong>
                                </div>
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" value="{{$user->name}}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input type="password" id="password1" name="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password2">Password again</label>
                                    <input type="password" id="password2"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea id="editor" class="form-control"
                                        rows="10" >{{$user->name}}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            <h5>{{$user->name}}</h5>
                        </div>
                        <div class="card-body text-center">
                            <img src="https://api.adorable.io/avatars/200/abott@adorable.png" alt="avtar" height="100%"
                                class="rounded">
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning btn-block">Change Picture</button>
                            <button class="btn btn-danger btn-block">Remove Picture</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Password Modal -->
    <div class="modal fade" id="passwordModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Change Password</h5>
                    <button class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="title">Current Password</label>
                            <input type="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">Change Password</label>
                            <input type="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal"> Close</button>
                    <button class="btn btn-success" data-dismiss="modal"> Save Changes</button>
                </div>
            </div>
        </div>
    </div>
   

    @endsection