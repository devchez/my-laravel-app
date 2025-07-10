<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        //$users = User::all();
        $users = User::orderBy('id', 'desc')->get();
        return view('users.users', compact('users'));
    }

    public function create() {
        return view('users.add');
    }

    public function store(Request $request) {
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',  // Added unique
                'role' => 'required',          // Validate role
                'password' => 'required|string|min:6',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            ]);

            $fileName = null;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $fileName = time() . '_' . 
                    $file->getClientOriginalName();
                $file->storeAs('public/uploads', $fileName);
            }

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'role' => $validated['role'],                     
                'password' => bcrypt($validated['password']),
                'photo' => $fileName,
            ]);

        // run php artisan storage:link

        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required',      
            'photo' => 'nullable|image',
        ]);

        $fileName = $user->photo;

        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/uploads/' . $user->photo)) {
                Storage::delete('public/uploads/' . $user->photo);
            }
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads', $fileName);
        }

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role' => $validated['role'],               
            'photo' => $fileName,
        ]);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    public function destroy($id) {
        $user = User::withTrashed()->findOrFail($id);

        if ($user->photo && Storage::exists('public/uploads/' . $user->photo)) {
            Storage::delete('public/uploads/' . $user->photo);
        }

        $user->restore();
        return response()->json(['success' => 'User deleted successfully!']);
    }
}
