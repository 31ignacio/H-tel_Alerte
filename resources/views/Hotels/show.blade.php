<!-- show.blade.php -->
@extends('layouts.master')

@section('content')
    <section>
        <div class="container mt-2 mb-4">
            <a href="{{route('hotel.liste')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i></a>

            <h3 class="text-center mb-3">Détails de l'hôtel {{ $hotel->nom }}</h3>
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title bg-secondary text-white">Informations de l'hôtel</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ asset('hotel.jpg') }}" class="card-img-top client-photo" alt="">

                                </div>
                                <div class="col-md-7">
                                    <p class="card-text"><b>Hôtel: </b>{{ $hotel->nom }}</p>
                                    <p class="card-text"><b>Enregistré le: </b>{{ \Carbon\Carbon::parse($hotel->created_at)->format('j/m/Y') }}</p>
                                    <p class="card-text"><b>Pays:</b> {{ $hotel->pays }}</p>
                                    <p class="card-text"><b>Téléphone:</b> {{ $hotel->telephone }}</p>
                                    <p class="card-text"><b>Email:</b>{{ $hotel->email }}</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <h5 class="card-title bg-secondary text-white">Informations du gestionnaire</h5>

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><b> Gestionnaire:</b> {{ $hotel->responsable }}</p>
                            <p class="card-text"><b>Téléphone:</b> {{ $hotel->responsableTelephone }}</p>
                            <p class="card-text"><b>Email:</b> {{ $hotel->responsableEmail }}</p>
                        </div>
                    </div><br>

                    <h5 class="card-title bg-secondary text-white">Pièce jointe</h5>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                @if($hotel->photo)
                                    <?php
                                        // Extraire le nom du fichier à partir du chemin
                                        $fileName = basename($hotel->photo);
                                    ?>
                            
                                    <div class="d-flex align-items-center justify-content-between">
                                        <!-- Nom du document (inactif) -->
                                        <p class="text-muted mb-0">{{ $fileName }}</p>
                            
                                        <!-- Bouton de téléchargement avec icône -->
                                        <a href="{{ asset('images/' . $hotel->photo) }}" download="{{ $fileName }}" class="btn btn-success btn-icon" title="Télécharger">
                                            <i class="fa fa-download"></i>
                                        </a>
                                    </div>
                            
                                @else
                                    <p class="text-warning">Aucun fichier joint.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    


                    
    
                </div>
            </div>
        </div>

        <style>
            .description {
                font-size: 16px;
                line-height: 1.6;
                color: #555; /* Couleur du texte */
                border: 1px solid #ccc; /* Bordure */
                background-color: #f9f9f9; /* Fond */
                padding: 20px; /* Espacement intérieur */
                border-radius: 10px; /* Coins arrondis */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre douce */
                margin-top: 20px; /* Marge supérieure */
                transition: all 0.3s ease; /* Animation de transition */
            }

            .description:hover {
                transform: scale(1.02); /* Effet de zoom au survol */
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); /* Ombre plus prononcée */
            }



        </style>
    </section>
@endsection
