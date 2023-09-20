<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination;
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

       
    }
    public function render()
    {
        // $users = User::paginate(10);
        return view('livewire.data' ,[
            "users" =>  User::paginate(10),
        ]);
    }
}
