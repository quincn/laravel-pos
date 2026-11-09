<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User - Laravel POS</title>
</head>
<body>

    <nav>
        <a href="/">Home</a> |
        <a href="/about">About</a> |
        <a href="/customers">Customer Accounts</a> |
        <a href="/users">User Accounts</a>
    </nav>

    <hr>

    <h1>Create User</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div>
            <label for="username">Username:</label>
            <input
                type="text"
                id="username"
                name="username"
                value="{{ old('username') }}"
                maxlength="255"
                required
            >

            @error('username')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <div>
            <label for="full_name">Full Name:</label>
            <input
                type="text"
                id="full_name"
                name="full_name"
                value="{{ old('full_name') }}"
                maxlength="255"
                required
            >

            @error('full_name')
                <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>

        <br>

        <button type="submit">Save User</button>
        <a href="{{ url('/users') }}">Cancel</a>
    </form>

</body>
</html>
