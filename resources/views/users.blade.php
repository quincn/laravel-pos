<!DOCTYPE html>
<html>
<head>
    <title>User Accounts - POS System</title>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customer Accounts</a> |
        <a href="{{ url('/users') }}">User Accounts</a>
    </nav>

    <hr>

    <h1>User Accounts</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Username</th>
                <th>Full Name</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($users ?? [] as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->full_name }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No user records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
