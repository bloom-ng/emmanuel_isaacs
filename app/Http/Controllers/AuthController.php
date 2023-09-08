<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Models\User;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
     /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == "admin") {
                // redirect to admin dashboard
                return redirect()->route('admin.home');
            }
            // dd(Auth::user());
 
            return redirect()->route('home');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:20'],
        ]);

        $validated['role'] = "user";
        $validated['password'] = Hash::make($request->password);

        $user = User::create($validated);
        Auth::loginUsingId($user->id);
        return redirect()->route('home');
    }

    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function profileUpdate(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'address' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'phone' => 'nullable',
        ]);
        // Update the user's profile information
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        
        // Check if the email has changed
        if ($user->email !== $request->email) {
            // Verify if another user already has the same email
            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return redirect()
                    ->back()
                    ->withErrors(['email' => 'Another user already has the same email.']);
            }
            
            $user->email = $request->email;
        }
        
        $user->save();
        
        return redirect("/profile")
            ->with('success', 'Profile updated successfully.');
    }

    public function passwordUpdate(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();
        
        // Verify the old password
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()
                ->route('user.profile')
                ->withErrors(['old_password' => 'The old password does not match our records.']);
        }
        
        // Update the password
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect("/profile")
            ->with('success', 'Password updated successfully.');
    }

    public function forgotPassword()
    {
        return view('auth.passwords.reset');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|min:6',
        ]);

        $user = User::where("email", $request->email)->first();

        if(!$user){
            return redirect()
                ->route('password.request')
                ->withErrors(['email' => 'This user is not in our records']);
        } else {
            // Verify the old password
            if ($request->password !== $request->password_confirmation) {
                return redirect()
                    ->route('password.request')
                    ->withErrors(['password_confirmation' => 'The passwords does not match.']);
            } else {

                // Update the password
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect("/login")
                    ->with('success', 'Password updated successfully.');
            }
        }
        
        // $status = Password::sendResetLink(
        //     $request->only('email')
        // );

        // return $status === Password::RESET_LINK_SENT
        //     ? back()->with('status', __($status))
        //     : back()->withErrors(['email' => __($status)]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
