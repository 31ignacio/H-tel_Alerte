@extends('layouts.master')

@section('content')
<section>
    <div class="container">
        <!-- Breadcrumb Section Begin -->
    
        <section>
            <div class="row">
                
                {{-- MES ANNONCES --}}
                <div class="col-md-12">

                       {{-- Message de succès --}}
                       <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                @if (Session::get('success_messagee'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success_messagee') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                    <p class="text-center bg-secondary text-white px-1 py-1">Mes annonces</p>
                   
                    <div class="container mt-5">
                        <div class="row">
                            @foreach($clients->chunk(1) as $chunk)
                            <div class="col-md-3 ">
                                @foreach($chunk as $client)
                                <div class="card mb-3">
                                    <img src="{{ asset('images/' . $client->photo) }}" class="card-img-top client-photo" alt="{{ $client->nom }}">

                                    <div class="card-body">
                                        <h5 class="card-title">{{ $client->nom }}</h5>
                                        <p class="card-text">Téléphone: {{ $client->telephone }}</p>
                                        <p class="card-text">Nationalité: {{ $client->pays }}</p>
                                        <p class="card-text">Période: <span style="font-size: 13px;">  {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}

                                        </span></p>

                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-sm btn-info mr-1" data-toggle="modal" data-target="#detailModal{{ $client->id }}">Détail</button>
                                            {{-- <button type="button" class="btn btn-sm btn-success mr-1">Valider</button> --}}
                                            <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#modifierModal{{ $client->id }}">Modifier</button>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#confirmationModal{{ $client->id }}">Annuler</button>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal pour les détails -->
                                    <div class="modal fade" id="detailModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailModalLabel{{ $client->id }}">Détails du client : <b> {{ $client->nom }}</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Contenu des détails du client -->
                                                    <p>Téléphone: {{ $client->telephone }}</p>
                                                    <p>Nationalité: {{ $client->pays }}</p>
                                                    <p>Période: {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}</p>
                                                    <!-- Ajoutez d'autres détails ici -->

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><b>Description</b></h5>
                                                            <p class="card-text"><pre>{{ $client->description }}</pre></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Modal pour les détails -->


                                <!-- Modal pour la modification des signalements-->
                                    <div class="modal fade" id="modifierModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="modifierModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modifierModalLabel{{ $client->id }}">Modifier les informations de : <b> {{ $client->nom }}</b></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Formulaire de modification -->
                                                    <form method="post" action="{{ route('signalement.update', ['client' => $client->id]) }}" enctype="multipart/form-data">

                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $client->id }}">

                                                        <div class="form-row">
                                                            <!-- Première ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="nom">Nom</label>
                                                                <input type="text" class="form-control" id="nom" name="nom" value="{{ $client->nom }}" required>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="pays">Nationalité</label>
                                                                <input type="text" class="form-control" id="pays" name="pays" value="{{ $client->pays }}" required>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="form-row">
                                                            <!-- Deuxième ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="telephone">Téléphone</label>
                                                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $client->telephone }}" required>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="telephone">Image</label>
                                                                <input type="hidden" class="form-control" name="image_id" value="{{ $client->id }}" required>
                                                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                                                            </div>

                                                            
                                                        </div>

                                                        <div class="form-row">
                                                            <!-- Deuxième ligne d'inputs -->
                                                            <div class="form-group col-md-6">
                                                                <label for="dateArriver">Date d'arrivée</label>
                                                                <input type="date" class="form-control" id="dateArriver" name="dateArriver" value="{{ $client->dateArriver }}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="dateDepart">Date de départ</label>
                                                                <input type="date" class="form-control" id="dateDepart" name="dateDepart" value="{{ $client->dateDepart }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="description">Description de l'incident:</label>
                                                                    <textarea class="form-control" id="description" name="description" rows="6" required>{{ $client->description }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Ajoutez d'autres inputs selon vos besoins -->
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-warning">Modifier</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Modal pour la modification des signalements-->

                                <!-- Modal pour la confirmation de suppression -->
                                    <div class="modal fade" id="confirmationModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel{{ $client->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmationModalLabel{{ $client->id }}">Confirmation</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Êtes-vous sûr de vouloir annuler ce signalement ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                                    <form method="post" action="{{ route('client.destroy', ['client' => $client->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Oui</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- Fin Modal pour la confirmation de suppression -->
                                {{-- style pour les photo --}}
                                    <style>
                                        .client-photo {
                                        width: 500px;
                                        height: 200px;
                                        object-fit: cover;
                                    }

                                    </style>

                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        <br>
                        {{-- LA PAGINATION --}}
                        <div style="display: flex; justify-content: center;" class="mb-3 mt-3">
                            {{$clients->links()}}
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </section>
    </div>
</section>




<!-- Modal pour modifier un profil -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Modifier profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editProfileForm" method="post" action="{{ route('hotel.profil.update', ['hotel' => $hotels->id]) }}">

                @csrf

                <div class="modal-body">
                    <!-- Champs du formulaire -->
                    <input type="hidden" id="hotelId" name="id" value="{{$hotels->id}}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelName">Hôtel</label>
                                <input type="text" class="form-control" id="hotelName" name="nom" value="{{$hotels->nom}}" required>
                            
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelCountry">Pays</label>
                                <input type="text" class="form-control" id="hotelCountry" name="pays" value="{{$hotels->pays}}" required>
                            </div>
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hotelAddress">Adresse</label>
                                <input type="text" class="form-control" id="hotelAddress" name="adresse" value="{{$hotels->adresse}}" required>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsable">Responsable</label>
                                <input type="text" class="form-control" id="responsable" name="responsable" value="{{$hotels->responsable}}" required>
                            </div>
        
                        </div>
                    </div>
                    
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="{{$hotels->telephone}}" required>
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ifu">Numéro d'identification fiscale</label>
                                <input type="text" class="form-control" id="ifu" name="ifu" value="{{$hotels->ifu}}" required>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection