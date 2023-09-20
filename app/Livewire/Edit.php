<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Edit extends Component
{
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
    public function render()
    {
        $users = User::all();
        return view('livewire.edit' , compact('users'));
    }
}
