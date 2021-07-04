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