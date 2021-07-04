<div class="col-md-4">
    <!-- Side Widget -->
    <div class="card my-4">
        <h5 class="card-header">Side Widget</h5>
        <div class="card-body">
            asdadadbyas ga agsfoy oiaugfo augbaygdo adgoiu gd
        </div>
    </div>
    <!-- Search Widget -->
    <div class="card my-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
            <div class="row">

                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        <li>
                            @foreach ($categories as $item)
                            
                                <a href="{{ route('getpostcat', $item->id) }}" class="btn btn-outline-primary">{{ $item->name }}</a>
                            @endforeach

                        </li>
                    </ul>
                </div>



            </div>
        </div>
    </div>
    <!-- Tag Widget -->
    <div class="card my-4">
        <h5 class="card-header">Tag</h5>
        <div class="card-body">
            <div class="row">
                @foreach ($tags as $item)
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <a href="{{ route('getposttag', $item->id) }}" class="btn btn-outline-primary">{{ $item->name }}</a>

                        </ul>
                    </div>
                @endforeach

                </ul>


            </div>

        </div>
    </div>
</div>




</div>
