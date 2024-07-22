@extends('layouts.master')

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text">
                        <h2>Hotel_Alerte</h2>
                        <p style="font-size: 16px;color:#dfa974;">"Un compagnon fiable pour gérer efficacement les incidents dans votre hôtel."</p>
                        {{-- <a href="#" class="primary-btn">Discover Now</a> --}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1" id="booking-form-container">

                    {{-- Inscription hotel  --}}
                
                    @if (!Auth::check())
                        <a href="{{ route('login') }}" class="bk-btn btn btn-primary btn-lg btn-block mt-5">Connexion</a>
                
                        <a href="{{ route('hotel.create') }}" class="bk-btn btn btn-secondary btn-lg btn-block mt-3">Inscription</a>
                    @endif
                    
                </div>

                    {{-- css pour connexion et inscription --}}
                <style>
                    .bk-btn {
                        border-radius: 20px;
                    }

                    .bk-btn.btn-primary {
                        background-color: #dfa974;
                        border-color: #dfa974;
                    }

                    .bk-btn.btn-secondary {
                        background-color: #6c757d;
                        border-color: #6c757d;
                        color: #fff;
                    }

                    .bk-btn:hover {
                        opacity: 0.8;
                    }

                </style>
                
            </div>
        </div>
        <div class="hero-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg"></div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-3.jpg"></div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Section présentation du logiciel -->
    <section class="aboutus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-text">
                        <div class="section-title">
                            <span>Votre Solution Complète pour la Gestion des Incidents Hôteliers</span>

                        </div>
                        <p class="f-para text-justify">Hotel_Alert est votre allié dans la gestion des incidents dans les
                            hôtels. Conçue
                            pour
                            les hôteliers, cette application intuitive offre un moyen simple et efficace de signaler les
                            clients
                            ayant disparu sans payer, ayant volé du matériel dans leur chambre ou ayant causé des dommages
                            matériels.</p>
                        {{-- <p class="s-para">So when it comes to booking the perfect hotel, vacation rental, resort,
                            apartment, guest house, or tree house, we’ve got you covered.</p> --}}
                        {{-- <a href="#" class="primary-btn about-btn">Read More</a> --}}
                        <a href="#" class="primary-btn about-btn" data-toggle="modal" data-target="#myModal">En
                            savoir plus</a>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> <b>Hotel_Alert - Votre Solution
                                                Complète pour la Gestion des Incidents
                                                Hôteliers </b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p class="text-justify">
                                                        <b>Description :</b>
                                                    </p>
                                                    <p class="text-justify">
                                                    
                                                        "Notre application a pour objectif de renforcer la sécurité et la transparence au sein de l'industrie hôtelière. En signalant 
                                                        un client ayant causé des dommages ou ayant quitté un établissement sans régler ses frais, chaque hôtel contribue à un réseau d'alerte partagé. Ainsi, tout hôtel participant peut consulter la plateforme pour identifier les clients signalés et prendre les mesures appropriées pour protéger ses biens et assurer la sécurité de son établissement. Cette initiative collaborative permet une communication proactive entre les établissements hôteliers, renforçant
                                                        ainsi la confiance et la sécurité pour l'ensemble de notre communauté d'hôtels et de voyageurs."
                                                    </p>
                                                   
                                                    
                                                    <p class="text-justify">
                                                        <b>...</b>
                                                    </p>
                                                    <p class="text-justify">
                                                        <b>Rejoignez dès aujourd'hui la communauté d'hôteliers qui font
                                                            confiance à HotelAlert pour assurer la sécurité et le bon
                                                            fonctionnement de leur établissement.</b>
                                                    </p>
                                                    @guest
                                                        <a href="{{ route('hotel.create') }}" class="btn btn-primary mt-3 mb-1">Cliquer pour nous rejoindre</a>
                                                    @endguest

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Fermer</button>
                                        <!-- Add additional buttons if needed -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-pic">
                        <div class="row">
                            <div class="col-sm-6">
                                <img src="img/about/1.jpg" alt="">
                            </div>
                            <div class="col-sm-6">
                                <img src="img/about/2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FIN de la Section présentation du logiciel -->


    <!-- La section des signalements -->
    <section class="hp-room-section">

        <div class="container">
            <div class="hp-room-items">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Signalements</span>
                            <h4>Les Derniers Signalements</h4>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach ($clients->take(9) as $index => $client)
                            @if ($index % 3 == 0 && $index != 0)
                                </div>
                                <hr class="section-divider">
                                <div class="row">
                            @endif
                            <div class="col-md-4 mb-4">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th colspan="2" class="text-center">Client : {{ $client->nom }}</th>
                                        </tr>
                                        <tr>
                                            <th>Nationalité :</th>
                                            <td>{{ $client->pays }}</td>
                                        </tr>
                                        <tr>
                                            <th>Téléphone :</th>
                                            <td>{{ $client->telephone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Hôtel :</th>
                                            <td>
                                                <a href="#" class="hotel-info" data-nom="{{ $client->hotel->nom }}"
                                                    data-pays="{{ $client->hotel->pays }}"
                                                    data-adresse="{{ $client->hotel->adresse }}"
                                                    data-telephone="{{ $client->hotel->telephone }}"
                                                    data-email="{{ $client->hotel->email }}"
                                                    data-description="{{ $client->description }}">{{ $client->hotel->nom }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center">
                                                <a href="#" class="client-photo-link" data-toggle="modal" data-target="#clientModal">
                                                    <img src="{{ asset('images/' . $client->photo) }}" class="card-img-top client-photo" alt="{{ $client->nom }}">
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <style>
                    .section-divider {
                        border: 0;
                        height: 2px;
                        background: linear-gradient(to right, #dfa974, #dfa974, #dfa974);
                        margin: 40px 0;
                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                        opacity: 0.7;
                    }
                </style>
                
                <!-- Modal pour afficher les informations de l'hôtel -->
                <div class="modal fade" id="hotelInfoModal" tabindex="-1" role="dialog"
                    aria-labelledby="hotelInfoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hotelInfoModalLabel">Informations de l'hôtel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nom :</strong> <span id="hotelNom"></span></p>
                                <p><strong>Pays :</strong> <span id="hotelPays"></span></p>
                                <p><strong>Adresse :</strong> <span id="hotelAdresse"></span></p>
                                <p><strong>Téléphone :</strong> <span id="hotelTelephone" class="badge badge-info"></span>
                                </p>
                                <p><strong>Email :</strong> <span id="hotelEmail"></span></p>
                                
                                <p class="text-center"><strong>Description :</strong>
                                <pre id="hotelDescription" class="hotel-description"></pre>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="clientModal" tabindex="-1" role="dialog"
                    aria-labelledby="clientModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="" id="modalClientPhoto" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    .client-photo {
                        width: 100px;
                        /* ajustez cette valeur selon vos besoins */
                        height: 50px;
                        /* ajustez cette valeur selon vos besoins */
                        object-fit: cover;
                        /* pour conserver le rapport d'aspect de l'image */
                        transition: transform 0.3s ease;
                        /* Transition pour l'effet d'agrandissement */

                    }


                    .client-photo:hover {

                        transform: scale(1.2);
                        /* Agrandissement de la photo au survol */
                    }

                    .img-fluid {
                        width: 576px;
                        /* ajustez cette valeur selon vos besoins */
                        height: 279px;
                        /* ajustez cette valeur selon vos besoins */
                        object-fit: cover;
                        /* pour conserver le rapport d'aspect de l'image */

                    }

                    /* POUR VOIR TOUT LES SIGNALEMENTS */
                    .centered-link {
                        display: block;
                        margin: 0 auto;
                        text-align: center;
                        /* Centrer le texte à l'intérieur de l'ancre */
                        text-decoration: underline;
                        /* Ajouter un soulignement */
                        text-decoration-color: #dfa974;
                        /* Couleur du soulignement */


                    }
                </style>
                @if (Auth::check())
                    <a href="{{ route('client.liste') }}" class="centered-link ">
                        <h3 style="color: #dfa974;"><span class="badge custom-badge"> Voir tout les signalements</span>
                        </h3>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="centered-link ">
                        <h3 style="color: #dfa974;"><span class="badge custom-badge"> Voir tout les signalements</span></h3>
                    </a>
                @endif
            </div>
        </div>

    </section>

    
    <!-- MON FAQ -->
    <span class="blog-section spad">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mt-5">
                        <span>FAQ - Hôtel</span>
                        <h4>Les questions les plus courantes</h4>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne">
                            Comment fonctionne cette application ?
                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <p>Les hôtels peuvent signaler un client en fournissant des informations sur l'incident survenu. Ces informations sont ensuite partagées sur la plateforme,
                                 permettant à d'autres hôtels participants de les consulter pour identifier les clients signalés.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo">
                            Comment les hôtels peuvent-ils utiliser cette application pour renforcer leur sécurité ?
                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse" aria-labelledby="headingTwo"
                            data-parent="#faqAccordion">
                            <p>En consultant régulièrement la plateforme, les hôtels peuvent identifier les clients signalés et prendre des mesures préventives pour éviter tout incident similaire dans leur établissement. Cela peut inclure une surveillance accrue, 
                                des mesures de sécurité renforcées ou une communication proactive avec les autres hôtels concernés.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapse3">
                            Qui peut accéder aux informations signalées sur la plateforme ?                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapse3" class="accordion-body collapse" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <p>Seuls les hôtels participants ayant été approuvés par l'administrateur de la plateforme ont accès aux informations signalées. Cela garantit que seuls les 
                                professionnels de l'industrie hôtelière peuvent consulter les données et prendre des mesures en conséquence.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapse4">
                            Est-ce que cette application fonctionne à l'échelle mondiale ?                            <span class="accordion-icon">&#43;</span>
                        </div>
                        <div id="collapse4" class="accordion-body collapse" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <p> Oui, cette application est conçue pour fonctionner à l'échelle mondiale. Les hôtels de toutes les régions peuvent s'inscrire et participer à la plateforme,
                                 renforçant ainsi la sécurité et la transparence dans l'industrie hôtelière à travers le monde.
                            </p>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header" id="headingOne" data-toggle="collapse" data-target="#collapse4">
                            Comment puis-je contacter l'administrateur de la plateforme en cas de questions ou de préoccupations ?      
                        </div>
                        <div id="collapse4" class="accordion-body collapse" aria-labelledby="headingOne"
                            data-parent="#faqAccordion">
                            <p> Vous pouvez contacter l'administrateur de la plateforme en utilisant le formulaire de contact disponible sur la plateforme.
                                 L'administrateur sera heureux de répondre à toutes vos questions et préoccupations.
                            </p>
                        </div>
                    </div>

                    <!-- Ajoutez plus de questions et de réponses ici -->
                </div>
            </div>

        </div>
    </span>
    <!-- Fin mon FAQ -->

    {{-- CSS POUR la description qui s'affiche en bas du modal info hotel --}}
    <style>
        .hotel-description {
            font-style: italic;
            color: #888;
        }

        .custom-badge {
            background-color: #dfa974;
            /* Couleur personnalisée */
            color: white;
            /* Couleur du texte */
        }
    </style>
    {{-- CSS FAQ --}}
    <style>
        .accordion-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .accordion-header {
            background-color: #f9f9f9;
            padding: 15px;
            cursor: pointer;
        }

        .accordion-header:hover {
            background-color: #e9ecef;
        }

        .accordion-icon {
            float: right;
            margin-top: 2px;
        }

        .accordion-body {
            display: none;
            padding: 15px;
        }
    </style>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Le js pour les info de l'hotel --}}
<script>
    $(document).ready(function() {
        $('.hotel-info').hover(function() {
            var nom = $(this).data('nom');
            var pays = $(this).data('pays');
            var adresse = $(this).data('adresse');
            var telephone = $(this).data('telephone');
            var email = $(this).data('email');
            var description = $(this).data('description');

            $('#hotelNom').text(nom);
            $('#hotelPays').text(pays);
            $('#hotelAdresse').text(adresse);
            $('#hotelTelephone').text(telephone);
            $('#hotelEmail').text(email);
            $('#hotelDescription').text(description);

            $('#hotelInfoModal').modal('show');
        }, function() {
            $('#hotelInfoModal').modal('hide');
        });
    });
</script>
{{-- Le js pour la photo --}}
<script>
    $(document).ready(function() {
        // Au survol de la photo
        $('.client-photo').mouseenter(function() {
            var src = $(this).attr('src');
            $('#modalClientPhoto').attr('src', src);
            $('#clientModal').modal('show');
        });

        // Lorsque le curseur quitte la photo
        $('.client-photo-link').mouseleave(function() {
            $('#clientModal').modal('hide');
        });
        // Lorsque le curseur quitte le modal de la photo
        $('#clientModal').mouseleave(function() {
            $('#clientModal').modal('hide');
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.accordion-header').click(function() {
            $(this).toggleClass('active').next().slideToggle('fast');
            $('.accordion-header').not(this).removeClass('active').next().slideUp('fast');
        });
    });
</script>
