<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- Create Customer Button -->
    <p>
        <a href="{{ route('customers.create') }}">
            Create Customer
        </a>
    </p>

    <!-- Success Message -->
    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <!-- Customer Table -->
    <table border="1">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($customers ?? [] as $customer)
                <tr>
                    <td>{{ $customer->full_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $customer->id) }}">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        No customer records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
