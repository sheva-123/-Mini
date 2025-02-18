<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Traits\LogsActivity;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    use LogsActivity;
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        

        $request->authenticate();

        $request->session()->regenerate();

        

        if ($request->user()->hasAnyRole(['admin'])) {
            return redirect()->route('admin.dashboard');
        } elseif ($request->user()->hasAnyRole(['user'])) {
            $id = Auth::user();
            $this->logActivity('Log in', 'Pengguna dengan nama ' . $id->name . ' melakukan login');
            return redirect()->route('user.home');
        }

        

        return redirect()->intended(route('pending', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (!$user->roles()->where('name', 'admin')->exists()) {
            $this->logActivity('Log Out', 'Pengguna dengan nama ' . $user->name . ' melakukan logout');
        }

        // dd($user);

        Auth::guard('web')->logout();

        // $this->logActivity('Log Out', 'Pengguna dengan nama ' . $id->name . 'melakukan logout');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
