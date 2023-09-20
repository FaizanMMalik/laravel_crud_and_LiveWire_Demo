<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = DB::table('messages')->get();
        return view('message' , compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $message = new Message();
        $message->message = $request->input('message');

        if ($request->hasFile('image')) {
          
            $image = $request->file('image');
            $imagePath = 'images/' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imagePath);
            $message->image_path = $imagePath;
        }

        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}
