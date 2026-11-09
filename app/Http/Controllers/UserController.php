<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();

        return view('users', [
            'users' => $users
        ]);
    }

    // Display the create user form
    public function create()
    {
        return view('users.create');
    }

    // Validate and save a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users,username',
            ],
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        User::create($validated);

        return redirect('/users')
            ->with('success', 'User created successfully!');
    }

    // Display the edit user form
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    // Validate and update user information and avatar
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
            'full_name' => [
                'required',
                'string',
                'max:255',
            ],
            'avatar' => [
                'nullable',
                'image',
                'max:2048',
            ],
        ]);

        $oldAvatar = $user->avatar;
        $newAvatar = null;

        if ($request->hasFile('avatar')) {
            $manager = new ImageManager(new Driver());

            $image = $manager->read(
                $request->file('avatar')->getRealPath()
            );

            // Resize without enlarging small images
            $image->scaleDown(200, 200);

            // Encode as a display-ready JPEG
            $encoded = $image->toJpeg(85);

            $newAvatar = 'avatars/' . Str::uuid() . '.jpg';

            Storage::disk('public')->put(
                $newAvatar,
                (string) $encoded
            );

            $validated['avatar'] = $newAvatar;
        }

        try {
            $user->update($validated);
        } catch (\Throwable $exception) {
            if ($newAvatar) {
                Storage::disk('public')->delete($newAvatar);
            }

            throw $exception;
        }

        // Remove the previous avatar after a successful update
        if ($newAvatar && $oldAvatar) {
            Storage::disk('public')->delete($oldAvatar);
        }

        return redirect('/users')
            ->with('success', 'User updated successfully!');
    }
}
