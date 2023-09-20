<div>
    <h1>Edit User</h1>
   
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="{{ $user->first_name }}" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="{{ $user->last_name }}" required><br><br>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="male" {{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ $user->gender === 'other' ? 'selected' : '' }}>Other</option>
        </select><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" value="{{ $user->age }}" required><br><br>

        <label for="contact_no">Contact No:</label>
        <input type="text" id="contact_no" name="contact_no" value="{{ $user->contact_no }}" required><br><br>

        <input type="submit" value="Update">
    </form>
</div>
