<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Autoentrepreneur;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/[!@#$%^&*()\-_=+{};:,<.>]/',
            ],
            'nom_entreprise' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'identifiant_fiscal' => ['required', 'string', 'max:255'],
            'adresse' => ['required', 'string', 'max:255'],
            'domain_travail' => ['required', 'string', 'max:255'],
            'date_creation' => ['required', 'date'],
            'TP' => ['required', 'string', 'max:255'],
            'numero_autoentrepreneur' => ['required', 'string', 'max:255'],
            'CNCC' => ['required', 'string', 'max:255'],
            'ICE' => ['required', 'string', 'max:255'],
            'taux_tax' => ['required', 'numeric'],
        ], [
            'password.confirmed' => 'Le mot de passe de confirmation ne correspond pas.',
        ]);

        $file = $request->file('photo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $filename);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $autoentrepreneur = new Autoentrepreneur();
        $autoentrepreneur->Nom_entreprise = $request->nom_entreprise;
        $autoentrepreneur->contact = $request->contact;
        $autoentrepreneur->Identifiant_Fiscal = $request->identifiant_fiscal;
        $autoentrepreneur->adresse = $request->adresse;
        $autoentrepreneur->Domain_de_travail = $request->domain_travail;
        $autoentrepreneur->date_creation = $request->date_creation;
        $autoentrepreneur->TP = $request->TP;
        $autoentrepreneur->CNCC = $request->CNCC;
        $autoentrepreneur->ICE = $request->ICE;
        $autoentrepreneur->numero_autoentrepreneur = $request->numero_autoentrepreneur;
        $autoentrepreneur->taux_tax = $request->taux_tax;
        $autoentrepreneur->id_user = $user->id;
        $autoentrepreneur->logo = 'uploads/' . $filename;
        $autoentrepreneur->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
