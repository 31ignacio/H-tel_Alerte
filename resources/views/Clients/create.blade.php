@extends('layouts.master')

@section('content')
    <section>
        <div class="container">
            <div class="container">
                <div class="row">
                    <a href="{{ route('hotel.accueil') }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i></a>

                    <div class="col-md-12 text-center mb-3">

                        <h2>Description du signalement</h2>
                        <p>Remplissez le formulaire ci-dessous pour signaler un client.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('clientCreate.jpg') }}" class="img-fluid" alt="Image Client">
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                {{-- Message de succès --}}
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        @if (Session::get('success_message'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ Session::get('success_message') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div id="msg5" class="text-center"></div>


                                <form id="form" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nomClient">Nom du client :</label>
                                                <input type="text" class="form-control" id="nom" name="nom" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pays">Pays d'origine :</label>
                                                <input type="text" class="form-control" id="pays" name="pays" required>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telephone">Téléphone :</label>
                                                <input type="text" class="form-control" id="telephone" name="telephone" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telephone">Photo,pièce d'identité ou autre :</label>
                                                <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateArriver">Date d'arrivée :</label>
                                                <input type="date" class="form-control" id="dateArriver" name="dateArriver"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dateDepart">Date départ :</label>
                                                <input type="date" class="form-control" id="dateDepart" name="dateDepart"
                                                    required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description de l'incident:</label>
                                                <textarea class="form-control" id="description" name="description" rows="6"
                                                    placeholder="Expliquez la raison du signalement"></textarea>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 d-flex align-items-center">
                                        <button type="button" class="btn btn-primary" id="envoyer" onclick="submitForm()">Signaler</button>
                                        <span id="msg50" class="ms-5" style="font-size:15px;color:red"></span>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>

        <!-- Modal resumé -->
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="staticBackdropLabel1">Facturation</h3>
                        {{-- {# <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> #} --}}
                    </div>
                    <div class="modal-body">

                        <p > Frais de dépôt d'annonce <b class="badge rounded-pill bg-success"><span style="color: white;"> 5.000 FCFA </span></b></p>
                        <span style="color:rgb(255, 0, 0);"><b>Cette somme est non remboursable</b></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                        <span id="payer"> <kkiapay-widget amount="4907" key="caf3f6e0eacf11ee80ae5bdd91083b6e"
                                {{-- {# url="<url-vers-votre-logo>" #}  --}} position="center" sandbox="true" data="" method="post"
                                {{-- {# callback="<url-de-redirection-quand-lepaiement-est-reuissi>" #} --}}>
                            </kkiapay-widget>
                        </span>

                    </div>
                </div>
            </div>
        </div>


    </section>
    <br><br>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        
        function submitForm() {
           
            // Récupérer les valeurs des dates
            var dateDebut = $('#dateArriver').val();
            var dateFin = $('#dateDepart').val();
            var nom = $('#nom').val();
            var pays = $('#pays').val();
            var telephone = $('#telephone').val();
            var description = $('#description').val();
            var image = $('#image').val();

            // Convertir les dates en objets Date pour comparaison
            var debut = new Date(dateDebut);
            var fin = new Date(dateFin);

            if(nom=="" || pays=="" || telephone=="" || image=="" || description==""){

                $('#msg5').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Veuillez revoir les champs vides.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>`
                );

            }

            // Vérifier si la date de début est supérieure à la date de fin
            else if (debut > fin) {

                $('#msg5').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    La date de début ne peut pas être supérieure à la date de fin.
                    </div>`
                );

                 // Fermer l'alerte après 5 secondes
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);

            } else {
                // Récupérer le jeton CSRF
                var formData = new FormData();
                formData.append('image', $('#image')[0].files[0]);
                formData.append('nom', $('#nom').val());
                formData.append('pays', $('#pays').val());
                formData.append('description', $('#description').val());
                formData.append('dateDepart', $('#dateDepart').val());
                formData.append('dateArriver', $('#dateArriver').val());
                formData.append('telephone', $('#telephone').val());

                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                var url = "{{ route('client.store') }}";
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                $('#staticBackdrop2').modal('show');
                $('#payer').on('click', function(e) {
                    $('#staticBackdrop2').modal('hide');
                    addSuccessListener(response => {
                        $('#staticBackdrop2').modal('hide');
                        //console.log(response);
                        // Récupérer la transactionId à partir de la réponse
                        const transactionId = response.transactionId;
                        formData.transactionId =transactionId; // Mettez à jour la propriété transactionId avec la valeur récupérée

                        //alert(229);

                        $.ajax({
                            url: "{{ route('client.store') }}",
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(response) {
                                //alert(14);
                                if (parseInt(response) == 200 || parseInt(response) ==500) {
                                    if (parseInt(response) == 500) {
                                        $("#msg5").html(`<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Attention !!!</strong> une erreur s'est produite, veuillez réessayer...
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`);
                                    } else {
                                        $('#msg5').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Félicitations, votre annonce a été déposée avec succès.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>`);
                                    }
                                }
                                $('#staticBackdrop2').modal('hide');

                                var url ="{{ route('hotel.profil') }}"; // Assurez-vous que la route client.store est correctement définie
                                if (response == 200) {
                                    setTimeout(function() {
                                        window.location = url;
                                    }, 10000);
                                } else {
                                    $("#msg5").html(response);
                                }
                            }
                        });


                        addFailedListener(error => {
                            alert("La transaction a échoué, veuillez réessayer.");
                        });
                    });

                    $('#annuler').on('click', function(e) {
                        e.preventDefault();
                        $('#envoyer').hide();
                    });

                });

            }

        };
    </script>

     {{-- Control sur la date --}}
     <script>

        //N'ACCEPTE QUE DES CHIFFRES
                
        $('#telephone').on('input', function(e) {
            var inputVal = $(this).val();
            var onlyNumbers = inputVal.replace(/[^0-9]/g, ''); // Remplace tous les caractères qui ne sont pas des chiffres par une chaîne vide
            $(this).val(onlyNumbers);
        });

        $('#pays').on('input', function(e) {
            var inputVal = $(this).val();
            var onlyLettersAndSigns = inputVal.replace(/[^a-zA-ZÀ-ÿ\s-]/g, ''); // Remplace tous les caractères qui ne sont pas des lettres, espaces, ou signes autorisés par une chaîne vide
            $(this).val(onlyLettersAndSigns);
        });


        // Récupérer la date d'aujourd'hui
        var dateActuelle = new Date();
        var annee = dateActuelle.getFullYear();
        var mois = ('0' + (dateActuelle.getMonth() + 1)).slice(-2);
        var jour = ('0' + dateActuelle.getDate()).slice(-2);
    
        // Formater la date pour l'attribut value de l'input
        var dateAujourdhui = annee + '-' + mois + '-' + jour;
    
        // Définir la valeur et la propriété max de l'input
        var inputDate = document.getElementById('dateArriver');
        var inputDate1 = document.getElementById('dateDepart');
        inputDate.value = dateAujourdhui;
        inputDate.max = dateAujourdhui;
        inputDate1.value = dateAujourdhui;
        inputDate1.max = dateAujourdhui;
    </script>

    {{-- Le js pour les pays --}}
    <script>
        $(function() {
            var availableCountries = [
                "Afghanistan",
                "Afrique du Sud",
                "Albanie",
                "Algérie",
                "Allemagne",
                "Andorre",
                "Angola",
                "Antigua-et-Barbuda",
                "Arabie Saoudite",
                "Argentine",
                "Arménie",
                "Australie",
                "Autriche",
                "Azerbaïdjan",
                "Bahamas",
                "Bahreïn",
                "Bangladesh",
                "Barbade",
                "Belgique",
                "Belize",
                "Bénin",
                "Bhoutan",
                "Biélorussie",
                "Birmanie",
                "Bolivie",
                "Bosnie-Herzégovine",
                "Botswana",
                "Brésil",
                "Brunei",
                "Bulgarie",
                "Burkina Faso",
                "Burundi",
                "Cambodge",
                "Cameroun",
                "Canada",
                "Cap-Vert",
                "République centrafricaine",
                "Chili",
                "Chine",
                "Chypre",
                "Colombie",
                "Comores",
                "Congo-Brazzaville",
                "République démocratique du Congo",
                "Corée du Nord",
                "Corée du Sud",
                "Costa Rica",
                "Côte d'Ivoire",
                "Croatie",
                "Cuba",
                "Danemark",
                "Djibouti",
                "Dominique",
                "Égypte",
                "Émirats arabes unis",
                "Équateur",
                "Érythrée",
                "Espagne",
                "Estonie",
                "Eswatini",
                "États-Unis",
                "Éthiopie",
                "Fidji",
                "Finlande",
                "France",
                "Gabon",
                "Gambie",
                "Géorgie",
                "Ghana",
                "Grèce",
                "Grenade",
                "Guatemala",
                "Guinée",
                "Guinée-Bissau",
                "Guinée équatoriale",
                "Guyana",
                "Haïti",
                "Honduras",
                "Hongrie",
                "Inde",
                "Indonésie",
                "Irak",
                "Iran",
                "Irlande",
                "Islande",
                "Israël",
                "Italie",
                "Jamaïque",
                "Japon",
                "Jordanie",
                "Kazakhstan",
                "Kenya",
                "Kirghizistan",
                "Kiribati",
                "Koweït",
                "Laos",
                "Lesotho",
                "Lettonie",
                "Liban",
                "Liberia",
                "Libye",
                "Liechtenstein",
                "Lituanie",
                "Luxembourg",
                "Macédoine du Nord",
                "Madagascar",
                "Malaisie",
                "Malawi",
                "Maldives",
                "Mali",
                "Malte",
                "Maroc",
                "Îles Marshall",
                "Maurice",
                "Mauritanie",
                "Mexique",
                "Micronésie",
                "Moldavie",
                "Monaco",
                "Mongolie",
                "Monténégro",
                "Mozambique",
                "Namibie",
                "Nauru",
                "Népal",
                "Nicaragua",
                "Niger",
                "Nigeria",
                "Norvège",
                "Nouvelle-Zélande",
                "Oman",
                "Ouganda",
                "Ouzbékistan",
                "Pakistan",
                "Palaos",
                "Palestine",
                "Panama",
                "Papouasie-Nouvelle-Guinée",
                "Paraguay",
                "Pays-Bas",
                "Pérou",
                "Philippines",
                "Pologne",
                "Portugal",
                "Qatar",
                "Roumanie",
                "Royaume-Uni",
                "Russie",
                "Rwanda",
                "Saint-Kitts-et-Nevis",
                "Saint-Vincent-et-les-Grenadines",
                "Sainte-Lucie",
                "Saint-Marin",
                "Salomon",
                "Salvador",
                "Samoa",
                "São Tomé-et-Príncipe",
                "Sénégal",
                "Serbie",
                "Seychelles",
                "Sierra Leone",
                "Singapour",
                "Slovaquie",
                "Slovénie",
                "Somalie",
                "Soudan",
                "Soudan du Sud",
                "Sri Lanka",
                "Suède",
                "Suisse",
                "Suriname",
                "Syrie",
                "Tadjikistan",
                "Tanzanie",
                "Tchad",
                "République tchèque",
                "Thaïlande",
                "Timor oriental",
                "Togo",
                "Tonga",
                "Trinité-et-Tobago",
                "Tunisie",
                "Turkménistan",
                "Turquie",
                "Tuvalu",
                "Ukraine",
                "Uruguay",
                "Vanuatu",
                "Vatican",
                "Venezuela",
                "Vietnam",
                "Yémen",
                "Zambie",
                "Zimbabwe"
            ];

            $("#pays").autocomplete({
                source: availableCountries
            });
        });
    </script>
@endsection
