<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts - POS System</title>
</head>
<body>

    <nav>
        <a href="{{ url('/') }}">Home</a> |
        <a href="{{ url('/about') }}">About</a> |
        <a href="{{ url('/customers') }}">Customer Accounts</a> |
        <a href="{{ url('/users') }}">User Accounts</a>
    </nav>

    <hr>

    <h1>Customer Accounts</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($customers ?? [] as $customer)
                <tr>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No customer records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
