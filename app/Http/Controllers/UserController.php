<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function entry()
    {
        return view('entry');
    }

    public function showposts()
    {
        return view('showposts');
    }

    public function manage()
    {
        return view('manage');
    }
    public function index()
    {
        $users = User::all();
        return view('manage', compact('users'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'contact_no' => 'required',
        ]);

        // Create a new user
        $user = new User;
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->gender = $validatedData['gender'];
        $user->age = $validatedData['age'];
        $user->contact_no = $validatedData['contact_no'];
        $user->save();

        // Redirect to a success page or perform any additional actions

        return redirect('/');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required|numeric',
            'contact_no' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->gender = $validatedData['gender'];
        $user->age = $validatedData['age'];
        $user->contact_no = $validatedData['contact_no'];
        $user->save();

        return redirect('/manage')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/manage')->with('success', 'User deleted successfully');
    }
}
