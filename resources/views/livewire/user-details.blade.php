<div>
    @if($user)
        <h1>Welcome, {{ $user->username }}</h1>
        <p>Email: {{ $user->role }}</p>
        <!-- Add more user details as needed -->
    @else
        <p>No user is logged in.</p>
    @endif
</div>