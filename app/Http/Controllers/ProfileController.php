<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\AutoEntrepreneur;
use App\Models\depense;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
      
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();
        $notifications = depense::where('id_autoEntrepreneur', $autoentrepreneur->id)
        ->whereDate('date_limit_depense', '>=', Carbon::now()) // To get expenses with a limit day that hasn't passed yet
        ->whereDate('date_limit_depense', '<=', Carbon::now()->addDays(2)) // To get expenses where the limit day is within the next two days
        ->get(); 
        return view('profile.edit', [
            'user' => $request->user(),'autoentrepreneur'=>$autoentrepreneur,    'notifications' => $notifications,'navAside' => 'profile'
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if (User::where('email', $request->input('email'))->where('id', '!=', $request->user()->id)->exists()) {
            return back()->withErrors(['email' => 'Cet e-mail est déjà utilisé. Veuillez en choisir un autre.']);
        }
        $autoentrepreneur = AutoEntrepreneur::where('id_user', $request->user()->id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
            ]); 
            
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $filename=   'uploads/' .  $filename;
        } else {
         
            $filename = $autoentrepreneur->logo;
            error_log($filename);
        }
    
        
        $autoentrepreneur->update([
            'Nom_entreprise' => $request->input('nom_ense'),
            'Domain_de_travail' => $request->input('domain_travail'),
            'contact' => $request->input('contact'),
            'Identifiant_Fiscal' => $request->input('if'),
            'adresse' => $request->input('adresse'),
            'logo' =>  $filename,
            'TP' => $request->TP,
            'CNCC' => $request->CNCC,
            'ICE' => $request->ICE,
            'numero_autoentrepreneur' => $request->numero_autoentrepreneur,
            'taux_tax' => $request->taux_tax,
        ]);
    
        // Update user email
        $request->user()->update([
            'email' => $request->input('email')
        ]);
    
        // Reset email verification if email is updated
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
    
        $request->user()->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
