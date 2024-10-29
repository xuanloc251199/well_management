<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Quản lý người dùng";
        $details = "";
        $users = User::all();
        return view('admin.pages.users.index', compact('title', 'details', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Thêm người dùng mới";
        $details = "";
        return view('admin.pages.users.create', compact('title', 'details'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users,email',
            'email_verified_at' => 'nullable|date',
            'password' => 'required|string',
            'role' => 'required|string',
            'remember_token' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->remember_token = Str::random(60);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = "Chi tiết người dùng";
        $details = "";
        $user = User::find($id);
        return view('admin.pages.users.show', compact('title', 'details', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = "Sửa thông tin người dùng";
        $details = "";
        $user = User::find($id);
        return view('admin.pages.users.update', compact('title', 'details', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id, 
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password_new' => 'nullable|string|min:8|confirmed', 
        ]);

        $user->name = $request->name;
        $user->username = $request->username; 
        $user->email = $request->email;
        if ($request->filled('password_new')) {
            $user->password = bcrypt($request->password_new); 
        }
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
