<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\FormData;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\hotel;
use Exception;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    //
    public function index(){

        $clients = Client::orderBy('created_at', 'desc')->paginate(4);

        return view('Clients/index',compact('clients'));

    }

    public function create()
    {
        return view('Clients.create');
    }

    public function store(Client $client, Request $request){

        $user = Auth::user();
        $hotels = hotel::where('user_id', $user->id)->first();
        try{
            $client->nom = $request->nom;
            $client->telephone = $request->telephone;
            $client->pays = $request->pays;
            $client->description= $request->description;
            $client->dateArriver = $request->dateArriver;
            $client->dateDepart = $request->dateDepart;
            $client->hotel_id=$hotels->id;

            // Enregistrez l'image dans le stockage
            $image = $request->file('image');
            //dd($image);
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $client->photo = $imageName;
            $client->save();

            return new Response(200);

        } catch (Exception $e) {
            //dd($e);
            return new Response(500);
        }
        
    }

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('Clients.show', compact('client'));
    }

    public function recherche(Request $request)
    {
        //dd($request);
        $nom = $request->input('nom');
        $hotel = $request->input('hotel');
        $pays = $request->input('pays');

        //dd($request);

        $query = Client::query();

        if ($nom) {
            $query->where('nom', 'like', "%$nom%");
        }

        if ($hotel) {
            $query->whereHas('hotel', function ($q) use ($hotel) {
                $q->where('nom', 'like', "%$hotel%");
            });
        }
        if ($pays) {
            $query->whereHas('hotel', function ($p) use ($pays) {
                $p->where('pays', 'like', "%$pays%");
            });
        }

       

        // Trier les résultats par ordre décroissant en fonction de la date de création
        $query->orderBy('created_at', 'desc');

        // Exécuter la requête
        $clients = $query->paginate(4);

        // if ($clients->isEmpty()) {  
        //     return back()->with('success_message', 'Aucun résultat trouvé');
        // }

        
        return view('Clients/index',compact('clients'));

    }

    public function destroy(Client $client)
    {
        // Supprimer le signalement
        $client->delete();

        // Rediriger avec un message de succès
        return redirect()->back()->with('success_messagee', 'Le signalement a été annulé avec succès.');
    }


}
