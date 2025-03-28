<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Traits\LogsActivity;
use Spatie\Permission\Models\Role;

class RegisteredUserController extends Controller
{
    use LogsActivity;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:6000'],
        ]);

        $avatarPath = $request->file('avatar')
            ? $request->file('avatar')->store('avatars', 'public')
            : 'avatars/default-avatar.png';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);

        // dd($user);

        event(new Registered($user));
        $id = Auth::user();
        $this->logActivity('Register', 'Pengguna dengan nama ' . $id->name . ' melakukan register.');

        Auth::login($user);

        return redirect()->route('pending');
    }
}
