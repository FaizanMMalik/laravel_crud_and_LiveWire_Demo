<!-- resources/views/create_user.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
