<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.contact');
    }

    public function store(Request $request, User $user){
        $validated = $request->validate([
            'body' => 'required',
        ]);

        $message = new Message(['body' => $request->body]);

        $user->messages()->save($message);

        return back()->with('message', 'Sent successfully.');
    }

    public function destroy(Message $message){
        $message->delete();

        return back();
    }
}
