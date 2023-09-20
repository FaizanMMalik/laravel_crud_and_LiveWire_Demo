<div>
    <div>
    <h1>User List</h1>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Contact No</th>
            <th>Actions</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->age }}</td>
            <td>{{ $user->gender }}</td>
            <td>{{ $user->contact_no }}</td>
            <td>
                <a href="#"  wire:click="edit({{ $user->id }})">Edit</a>
                
                <button wire:click="destroy({{$user->id}})">
                  Delete
                </button>
            </td>
        </tr>
        @endforeach
    
    </table>
</div>
    {{ $users->links() }}
   
</div>
