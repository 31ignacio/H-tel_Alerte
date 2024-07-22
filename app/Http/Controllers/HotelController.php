<?php

namespace App\Http\Controllers;
use App\Models\hotel;
use App\Models\User;
use App\Models\Client;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelController extends Controller
{
    //
    public function index(){


        return view('Hotels/index');
    }

    public function create(){


        return view('Hotels/create');
    }

    public function listeHotel(){
        $hotelsBenin = hotel::where('pays', 'Benin')->latest()->paginate(5);
        $hotelsTogo = hotel::where('pays', 'Togo')->latest()->paginate(5);

        //dd($hotelsBenin);
        return view('Hotels/listeHotel',compact('hotelsBenin','hotelsTogo'));
    }

    public function store(hotel $hotel, User $user, Request $request){

        //dd($request);
          // Valider les données du formulaire
          $request->validate([
            'nom' => 'required',
            'responsable' => 'required',
            'pays' => 'required',
            'telephone' => 'required|unique:hotels,telephone',
            'responsableTelephone' => 'required|unique:hotels,telephone',
            'adresse' => 'required',
            'email'=>'required|unique:users,email',
            'responsableEmail'=>'required|unique:hotels,email',
            'image' => 'required|mimes:pdf|max:2048', // Validation for PDF file

            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ], [
            'nom.required'=>'Le nom de votre hôtel est requis',
            'image.required'=>'La pièce jointe est requis',
            'image.mimes'=>'La pièce jointe doit être un fichier pdf',
            'image.max'=>'La pièce jointe ne doit par dépasser 2Mo.',

            'responsable.required'=>'Le nom du représentant de l\'hôtel est requis',
            'pays.required'=>'Le pays est requis',
            'adresse.required'=>'Votre adresse est requis',
            'telephone.required'=>'Le numéro de téléphone est requis',
            'telephone.unique'=>'Ce numéro de téléphone est déjà pris', 
            'responsableTelephone.unique'=>'Ce numéro de téléphone est déjà pris', 
            'email.required'=>'Votre email est requis',
            'email.unique'=>'Cette adresse mail est déjà prise',
            'responsableEmail.unique'=>'Cette adresse mail est déjà prise', 
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit comporter au moins 6 caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password_confirmation.required' => 'La confirmation du mot de passe est requise.'
        ]);
        //dd(10);
        //Comparaison des mot de passe

        try {
            $user->name = $request->nom;
            $user->email = $request->email;
            $user->estActive= 0;

            $user->password =Hash::make($request->password);
            $user->save();
            //dd($user);
            $hotel->pays = $request->pays;
            $hotel->nom = $request->nom;
            $hotel->telephone = $request->telephone;
            $hotel->email= $request->email;
            $hotel->adresse = $request->adresse;
            $hotel->responsableTelephone = $request->responsableTelephone;
            $hotel->responsableEmail = $request->responsableEmail;
            $hotel->responsable=$request->responsable;
            $hotel->user_id=$user->id;

            // Vérifiez si un fichier a été téléchargé
            $image = $request->file('image');

            // Obtenez le nom d'origine du fichier
            $imageName = $image->getClientOriginalName();

            // Déplacez le fichier dans le répertoire public/images
            $image->move(public_path('images'), $imageName);

            // Sauvegardez le nom du fichier dans la base de données
            $hotel->photo = $imageName;
            $hotel->save();


            return redirect()->route('hotel.create')->with('success_message', 'Votre inscription à été enregistré avec succès');
        
        } catch (Exception $e) {
            dd($e);
            return new Response(500);
        }
           
    }

    public function profil(){

         // Récupérer l'utilisateur connecté
         $user = Auth::user();
         //dd($user);
         $user_id=$user->id;

        $hotels = hotel::where('user_id', $user->id)->first();
        $hotel_id=$hotels->id;
        
         // Récupérer la somme du montantFinal pour l'utilisateur connecté et le rôle donné
         $hotels = hotel::where('user_id', $user->id)->first();
         
        return view('Hotels/profil',compact('hotels'));
    }

    public function MesAnnonces(){

        // Récupérer l'utilisateur connecté
        $user = Auth::user();
        //dd($user);
        $user_id=$user->id;

       $hotels = hotel::where('user_id', $user->id)->first();
       $hotel_id=$hotels->id;
       
        // Récupérer la somme du montantFinal pour l'utilisateur connecté et le rôle donné
        $hotels = hotel::where('user_id', $user->id)->first();
        $clients = Client::where('hotel_id', $hotel_id)
        ->orderBy('created_at', 'desc')
        ->paginate(4);

       return view('Annonces/mesAnnonces',compact('hotels','clients'));
   }

    
    public function updateSignalement(client $client, Request $request){

        //dd($client);
        try {
            $client->update($request->all());
            $imageId = $request->input('image_id');
            $client = Client::findOrFail($imageId);
            
                if ($request->hasFile('image')) {
                    $newImage = $request->file('image');
                    $imageName = time() . '.' . $newImage->getClientOriginalExtension();
                    $newImage->move(public_path('images'), $imageName);
                    
                    // Mettre à jour le chemin de l'image dans la base de données
                    $client->photo = $imageName;
            
                    // return redirect()->back()->with('success', 'Image updated successfully.');
                }
                //dd($client);
                $client->save();
    
            return back()->with('success_messagee', 'Informations modifiées avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        $hotel = hotel::findOrFail($id);
        //dd($hotel);
        return view('Hotels.show', compact('hotel'));
    }

    public function activer($id)
    {
        $hotel = hotel::findOrFail($id);
        $user = $hotel->user; // Récupérer l'utilisateur associé à l'entreprise
        //dd($hotel);
        // Mettre à jour la propriété estActive de l'utilisateur
        $user->estActive = 1;
        $user->save(); // Enregistrer les modifications dans la base de données
        //Mail::to($user->email)->send(new ActiverMail($user));
        return redirect()->back()->with('success', 'Hôtel activé avec succès.');
    }

    public function desactiver($id)
    {
        $hotel = hotel::findOrFail($id);
        $user = $hotel->user; // Récupérer l'utilisateur associé à l'entreprise
        //dd($hotel);
        // Mettre à jour la propriété estActive de l'utilisateur
        $user->estActive = 0;
        $user->save();

        //Mail::to($user->email)->send(new DesactiverMail($user));

        return redirect()->back()->with('success', 'Hôtel désactivé avec succès.');
    }

    

    public function updateProfil(hotel $hotel, User $user, Request $request){

       // dd($request);

        
        try {
            $user= $hotel->user_id;
            $hotel->nom = $request->nom;
            $hotel->pays = $request->pays;
            $hotel->adresse = $request->adresse;
            $hotel->responsableTelephone = $request->responsableTelephone;
            $hotel->responsableEmail = $request->responsableEmail;
            $hotel->responsable = $request->responsable;
            $hotel->telephone = $request->telephone;
            $hotel->email = $request->email;

           

            if ($request->hasFile('new_image')) {
                // Supprimer l'ancien fichier si nécessaire
                if ($hotel->photo && file_exists(public_path('images/' . $hotel->photo))) {
                    unlink(public_path('images/' . $hotel->photo));
                }
    
                // Enregistrer le nouveau fichier
                // Vérifiez si un fichier a été téléchargé
                $image = $request->file('new_image');

                // Obtenez le nom d'origine du fichier
                $imageName = $image->getClientOriginalName();

                // Déplacez le fichier dans le répertoire public/images
                $image->move(public_path('images'), $imageName);

                // Sauvegardez le nom du fichier dans la base de données
                $hotel->photo = $imageName;
                //$hotel->save();
        
                //$hotel->photo = $fileName;
            }
            //dd($hotel);
            $userrechercher=User::where('id',$user)->first();
            //dd($user,$userrechercher->email);
            $userrechercher->email = $request->email;
            
            $userrechercher->update();
            $hotel->update();
            //dd($hotel);
            return back()->with('success', 'Votre profil a été modifié avec succès');

        } catch (Exception $e) {
            dd($e);
        }


    }

}
