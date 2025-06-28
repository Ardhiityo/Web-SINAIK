<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $user = $request->user();

        is_null($data['password']) ? $data['password'] = $user->password :  $data['password'] = Hash::make($data['password']);

        $request->user()->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->withSuccess('Berhasil diupdate');
    }
}
