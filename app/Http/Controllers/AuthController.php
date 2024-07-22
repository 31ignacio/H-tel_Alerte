<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\createUsersRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;


class AuthController extends Controller
{
    //
      //
    public function login()
    {
        return view('Auth.login');
    }

    public function handleLogin(Request $request){

        $request->validate([
            'email'=>'required|exists:users,email',
            'password'=>'required|min:6'
        ], [
            'email.required'=>'Votre email est requis',
            'email.exists'=>'Cette adresse mail n\'est pas reconnu', 
            'password.required'=>'Le mot de passe est requis',
            'password.min'=> 'Le mot de passe est incorrect'
        ]);

        try {
            // Vérifier les informations d'identification de l'utilisateur
            $credentials = $request->only('email', 'password');
            
            // Rechercher l'utilisateur par son email
            $user = User::where('email', $request->email)->first();
            //dd($user);
            // Vérifier si l'utilisateur existe
            if (!$user) {
                // Informer l'utilisateur que les informations de connexion sont incorrectes
                return redirect()->back()->with('error_msg', 'Informations de connexion incorrectes.');
            }
        
            // Vérifier si le compte de l'utilisateur est actif
            if (!$user->estActive) {
                // Informer l'utilisateur que son compte est désactivé
                return redirect()->back()->with('error_msg', 'Votre compte est désactivé. Veuillez contacter l\'administrateur.');
            }
        
            // Authentifier l'utilisateur
            if (auth()->attempt($credentials)) {
                // Rediriger vers la page d'accueil
                return redirect('/profil');
            } else {
                // Informer l'utilisateur que les informations de connexion sont incorrectes
                return redirect()->back()->with('error_msg', 'Informations de connexion incorrectes.');
            }
        } catch (Exception $e) {
            // Gérer les exceptions
        }
        
        
    }

      public function logout(){

        FacadesSession::flush();
        Auth::logout();

        return redirect()->route('hotel.accueil');
    }
    
    public function update(Request $request){
        //dd($request);
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ], [
            'old_password.required' => 'L\'ancien mot de passe est requis.',
            'password.required' => 'Le nouveau mot de passe est requis.',
            'password.min' => 'Le nouveau mot de passe doit comporter au moins 6 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise.'
        ]);
        
        try{
            $user = Auth::user();
        
            // Vérifier si le mot de passe actuel est correct
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->with('danger','Le mot de passe actuel est incorrect.');
            }
        
            // Vérifier si le nouveau mot de passe est identique à l'ancien
            if (Hash::check($request->password, $user->password)) {
                return back()->with('danger','Le nouveau mot de passe doit être différent du mot de passe actuel.');
            }

            // Vérifier si le mot de passe et la confirmation sont identiques
            if ($request->password !== $request->password_confirmation) {
                return back()->with('danger','Le mot de passe de confirmation ne correspond pas au nouveau mot de passe.');
            }
        
            // Mettre à jour le mot de passe
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            //Mail::to($user->email)->send(new ModifierPasswordMail($user));

            // Déconnecter l'utilisateur
            Auth::logout();

            // Rediriger vers la page de connexion avec un message de succès
            return redirect()->route('login')->with('success_msg', 'Votre mot de passe a été modifié avec succès. Veuillez vous reconnecter avec le nouveau mot de passe.');

            }catch(Exception $e){
            dd($e);
        }
    }

}
