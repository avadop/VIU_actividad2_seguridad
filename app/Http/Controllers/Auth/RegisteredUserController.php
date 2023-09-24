<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PragmaRX\Countries\Package\Countries;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries = new Countries();
        $countryList = $countries->all()->pluck('name.common', 'cca2');

        return view('auth.register', compact('countryList'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:20'],
            'surname' => ['required', 'string', 'min:2', 'max:40'],
            'dni' => ['required', 'regex:/^\d{8}[a-zA-Z]$/i'], 
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required','confirmed','string','min:8','max:64','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&_-]+$/',],
            'phone' => ['nullable', 'regex:/^\+?\d{9,12}$/', 'min:9', 'max:12'],
            'iban' => ['required', 'regex:/^ES\d{2}\d{20}$/'],
            'about' => ['nullable', 'string', 'min:20', 'max:250'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'dni' => $request->dni,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'country' => $request->country,
            'iban' => $request->iban,
            'about' => $request->about,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
