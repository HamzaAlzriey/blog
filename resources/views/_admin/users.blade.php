@extends('_admin.layout.master')
@section('content')
    <header id="main-header" class="py-2 bg-success text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-user-circle"></i> Users</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="action" class="py-4 mb-4 ng-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto">
                    <div class="input-group">
                        <input type="text" name="search" id="search" class="form-control" placeholder="Search">
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
                    <div class="card" id="hamza">
                        <div class="card-header">
                            <h4>Users</h4>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No of Posts</th>
                                    <th>Admin</th>
                                </tr>
                            </thead>
                            <tbody id="tableUser">
                                <div id="formsarch">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ count($user->posts) }}</td>
                                            <td>
                                                
                                                <a href="{{ route('user.admin', ['user' => $user->id]) }}" 
                                                    @if (Auth::user()->id == $user->id)
                                                    style="pointer-events: none"
                                                    @endif
                                                    
                                                    class="btn {{ $user->is_admin ? 'btn-outline-primary' : 'btn-primary' }}">
                                                    {{ $user->is_admin ? 'Yes' : 'No' }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                            </tbody>
                        </table>
                        <nav class="ml-4">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

    <script>
        $("#search").keyup(function() {
            var name = $("#search").val();
            var token = $("#csrf-token").val();
            $.post("{{ route('search') }}", {
                _token: token,
                name: name
            }).done(function(data) {
                $('#hamza').replaceWith(data);
            });

        });

    </script>  

    
   

{{--  
    <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('live_search.action') }}",
           method:'GET',
           data:{data_table:query},
           dataType:'json',
           success:function(data)
           {
            console.log(data);     
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
</script>    --}}


@endsection
