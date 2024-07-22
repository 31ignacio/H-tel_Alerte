<!-- show.blade.php -->
@extends('layouts.master')

@section('content')
    <section>
        <div class="container mt-2 mb-4">
            <a href="{{route('client.liste')}}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i></a>

            <h3 class="text-center mb-3">Détails du signalement</h3>
            <div class="row">
                <div class="col-md-8">
                    <h5 class="card-title bg-secondary text-white">Informations du client</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="{{ asset('images/' . $client->photo) }}" class="card-img-top client-photo" alt="{{ $client->nom }}">

                                    {{-- <img src="{{ $client->image }}" class="img-fluid" alt="{{ $client->nom }}"> --}}
                                </div>
                                <div class="col-md-7">
                                    <p class="card-text"><b>Nom: </b>{{ $client->nom }}</p>
                                    <p class="card-text"><b>Signalé le: </b>{{ \Carbon\Carbon::parse($client->created_at)->format('j/m/Y') }}</p>
                                    <p class="card-text"><b>Nationalité:</b> {{ $client->pays }}</p>
                                    <p class="card-text"><b>Téléphone:</b> {{ $client->telephone }}</p>
                                    <p class="card-text"><b>Période:</b> {{ \Carbon\Carbon::parse($client->dateArriver)->format('j/m/Y') }} au {{ \Carbon\Carbon::parse($client->dateDepart)->format('j/m/Y') }}</p>
                                    <h5><b>Description :</b></h5>
                                    <pre class="card-text description">{{ $client->description }}</pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <h5 class="card-title bg-secondary text-white">Informations de l'hôtel</h5>

                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><b> Hôtel:</b> {{ $client->hotel->nom }}</p>
                            <p class="card-text"><b>Pays:</b> {{ $client->hotel->pays }}</p>
                            <p class="card-text"><b>Adresse:</b> {{ $client->hotel->adresse }}</p>

                            <p class="card-text"><b>Email:</b> {{ $client->hotel->email }}</p>

                            <p class="card-text"><b>Téléphone:</b> {{ $client->hotel->telephone }}</p>

                        </div>
                    </div><br>

                    <div style="margin-bottom: 20px;">
                        <button class="call-button btn btn-sm btn-info" onclick="window.location.href = 'tel:{{ $client->hotel->telephone }}';">
                            <i class="fa fa-phone"></i> Appeler {{ $client->hotel->nom }}
                        </button>
                        <br><br>
                        <a href="https://api.whatsapp.com/send?phone={{ $client->hotel->telephone }}" target="_blank"
                            style="padding: 10px 20px; border-radius: 5px; text-decoration: none; display: inline-block;"
                            class="btn btn-sm btn-success">
                            <i class="fa fa-whatsapp"></i> Cliquez ici pour contacter l'hôtel ({{ $client->hotel->nom }}) via WhatsApp
                        </a>
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
