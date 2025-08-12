<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $events = Event::with('user')->get();

        $users = User::all();
        return view('admin.index', compact('events', 'users'));
    }

    public function users()
    {
       $users = \App\Models\User::all();
       return view('admin.users', compact('users'));
    }


    public function approve($id)
    {
        $event = Event::findOrFail($id);
        $event->is_approved = true;
        $event->save();
        return back();
    }

    public function reject($id)
    {
        $event = Event::findOrFail($id);
        $event->is_approved = false;
        $event->save();
        return back();
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return back();
    }

    public function deleteUser($id)
{
    $user = User::findOrFail($id);

    if ($user->image && file_exists(public_path('storage/' . $user->image))) {
        unlink(public_path('storage/' . $user->image));
    }

    $user->delete();

    return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
}
}
