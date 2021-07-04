<script src="https://code.jquery.com/jquery-3.5.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
        <a href="index.html" class="navbar-brand">BlogAdmin</a>
        <button class="navbar-toggler" data-toggle="collapse" date-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                
                <li class="nav-item px-2">
                    <a href=" {{ route('post.index') }}" class="nav-link">Dashboard</a>
                </li>    
                

                <li class="nav-item px-2">
                    <a href=" {{ route('post.show_all') }}" class="nav-link">Posts</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('tag.alltag') }}" class="nav-link ">Tags</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('category.allcategory') }}" class="nav-link ">Categories</a>
                </li>
                <li class="nav-item px-2">
                    <a href="{{ route('user.index') }}" class="nav-link">Users</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Wellcome
                        {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu">
                        <a href="profile.html" class="dropdown-item">
                            <i class="fa fa-user circle"></i> Profile
                        </a>
                        <a href="settings.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> Setting
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a id="logout" href="{{ route('home_') }}" class="nav-link"><i class="fa fa-user-times"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />
<script>
    $("#logout").click(function() {

        var token = $("#csrf-token").val();
        $.post("{{ route('logout') }}", {
            _token: token,
        }).done(function(data) {
            window.location.replace("https://www.tutorialrepublic.com/");
        });

    });

</script>  

