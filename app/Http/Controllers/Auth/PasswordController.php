<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    public function updateAdmin(Request $request): RedirectResponse
    {
        $locale = $request->session()->get('locale');
        $successMessage = ($locale === 'es') ? 'Contraseña actualizada correctamente' : 'Password updated succesfully';
        $validated = $request->validateWithBag('adminPasswordUpdate', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $userId = $request->input('user_id');

        $user = User::find($userId);

        if (!$user) {
            // Manejar el caso en el que el usuario no existe
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', $successMessage);
    }

}