@extends('layouts.master')

@section('content')
    <section>

        <div class="container">
            <div class="container">
                <div class="row">
                    <a href="{{ route('hotel.accueil') }}" class="btn btn-sm btn-secondary"><i class="fa fa-arrow-left"></i></a>

                    <div class="col-md-12 text-center mb-5">
                        <b>Rejoignez Hôtel_Alerte : Inscrivez votre hôtel dès aujourd'hui !</b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="aze.jpg" class="img-fluid" alt="Image Client"><br><br>

                        <p class="text-justify">
                            Protégez votre établissement en signalant rapidement tout incident ou comportement suspect grâce
                            à Hotel Alerte. Inscrivez-vous dès maintenant pour contribuer à maintenir un environnement sûr
                            et sécurisé pour vos clients et votre personnel.
                        </p>

                    </div>
                    <div class="col-md-6">

                        {{-- Message de succès --}}
                        <div class="row">
                            <div class="col-md-12">
                                @if (Session::get('success_message'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ Session::get('success_message') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-3">Inscription de l'hôtel</h5>
                                
                                <div class="container mt-5">
                                    {{-- <h2 class="text-center my-4">Inscription de l'hôtel</h2> --}}
                                    <form id="multiStepForm" method="post" action="{{ route('hotel.store') }}" enctype="multipart/form-data">

                                        @csrf
                                        <!-- Page 1: Informations de base -->
                                        <div class="step">
                                            <h5>Informations de base de l'hôtel</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label for="nom">Nom de l'hôtel</label>
                                                <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="pays">Pays</label>
                                                <input type="text" class="form-control" id="pays" name="pays" value="{{ old('pays') }}" required>
                                                @error('pays')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="email">Adresse e-mail</label>
                                                <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" required>
                                                
                                                @error('email')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="telephone">Numéro de téléphone</label>
                                                <input type="text" min="0" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                                @error('telephone')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="adresse">Adresse</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse') }}" required>
                                            </div>
                                        </div>
                            
                                        <!-- Page 2: Informations sur le gestionnaire -->
                                        <div class="step hidden">
                                            <h5>Informations sur le gestionnaire de l'hôtel</h5><hr>
                                            <div class="form-group">
                                                <label for="responsable">Nom du gestionnaire</label>
                                                <input type="text" class="form-control" id="responsable" name="responsable" value="{{ old('responsable') }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="responsableTelephone">Numéro de téléphone</label>
                                                <input type="text" class="form-control" id="responsableTelephone" name="responsableTelephone" value="{{ old('responsableTelephone') }}" required>
                                                @error('responsableTelephone')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                            <div class="form-group">
                                                <label for="responsableEmail">Adresse e-mail</label>
                                                <input type="email" class="form-control" id="responsableEmail" name="responsableEmail" value="{{ old('responsableEmail') }}" required>
                                                @error('responsableEmail')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
        
                                        <!-- Page 6: Autres informations -->
                                        <div class="step hidden">
                                            <h5>Autres informations</h5><hr>
                                            <div class="form-group">
                                                <label for="photos">Pièce jointe (Numéro d'Identification Fiscale)</label>
                                                <input type="file" class="form-control-file" id="image" name="image" required>
                                                @error('image')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Mot de passe</label>
                                                <input type="password" class="form-control" id="password" name="password" required>
                                                @error('password')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation">Confirmer mot de passe</label>
                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                                @error('password_confirmation')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            
                                            </div>
                                            
                                        </div>
                            
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Précédent</button>
                                            <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Suivant</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="emailHelp" class="form-text text-center mb-5 text-dark">
                                    Déjà inscrit ? <a href="{{ route('login') }}" class="text-dark fw-bold"><span
                                            class="badge badge-info"> Connectez-vous </span></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </section>

    {{-- css pour control de mail --}}
    <style>
        /* css pour mail */
        .invalid-email {
            border-color: red;
        }
        .disabled-button {
            pointer-events: none;
            opacity: 0.6;
        }
        /* fin */
        .hidden {
            display: none;
        }
        .step {
            margin-top: 20px;
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
    {{-- le script pour mon multipage --}}
    <script>
       
        var currentStep = 0;
        showStep(currentStep);

        function showStep(n) {
            var steps = document.getElementsByClassName("step");
            steps[n].classList.remove("hidden");

            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }

            if (n == (steps.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Soumettre";
            } else {
                document.getElementById("nextBtn").innerHTML = "Suivant";
            }
        }

        function nextPrev(n) {
            var steps = document.getElementsByClassName("step");

            if (n == 1 && !validateForm()) return false;

            steps[currentStep].classList.add("hidden");
            currentStep += n;

            if (currentStep >= steps.length) {
                document.getElementById("multiStepForm").submit();
                return false;
            }

            showStep(currentStep);
        }

        function validateForm() {
            var valid = true;
            var inputs = document.getElementsByClassName("step")[currentStep].getElementsByTagName("input");

            for (var i = 0; i < inputs.length; i++) {
                if (inputs[i].hasAttribute("required") && inputs[i].value == "") {
                    inputs[i].classList.add("is-invalid");
                    valid = false;
                } else {
                    inputs[i].classList.remove("is-invalid");
                }
            }

            return valid;
        }
    </script>

        {{-- //N'ACCEPTE QUE DES CHIFFRES --}}
    <script>
                     
        document.addEventListener('DOMContentLoaded', function() {
            var telephoneInput = document.getElementById('telephone');
            var responsableTelephoneInput = document.getElementById('responsableTelephone');
            var paysInput = document.getElementById('pays');

            telephoneInput.addEventListener('input', function() {
                var inputVal = telephoneInput.value;
                var onlyNumbers = inputVal.replace(/[^0-9\+\-\(\)\s]/g, ''); // Accepte seulement les chiffres et quelques signes
                telephoneInput.value = onlyNumbers;
            });

            responsableTelephoneInput.addEventListener('input', function() {
                var inputVal = responsableTelephoneInput.value;
                var onlyNumbers = inputVal.replace(/[^0-9\+\-\(\)\s]/g, ''); // Accepte seulement les chiffres et quelques signes
                responsableTelephoneInput.value = onlyNumbers;
            });


            paysInput.addEventListener('input', function() {
                var inputVal = paysInput.value;
                var onlyLettersAndSigns = inputVal.replace(/[^a-zA-Z\s\-\']/g, ''); // Accepte seulement les lettres et quelques signes
                paysInput.value = onlyLettersAndSigns;
            });


        });
    </script>

    {{-- Le js pour les pays --}}
    <script>

        document.addEventListener('DOMContentLoaded', function() {
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

            var paysInput = document.getElementById('pays');

            paysInput.addEventListener('input', function() {
                var inputVal = paysInput.value.toLowerCase();
                var suggestions = availableCountries.filter(function(country) {
                    return country.toLowerCase().startsWith(inputVal);
                });
                
                // Créez une liste de suggestions (par exemple, sous forme de datalist)
                var datalist = document.getElementById('countries');
                if (!datalist) {
                    datalist = document.createElement('datalist');
                    datalist.id = 'countries';
                    document.body.appendChild(datalist);
                }
                datalist.innerHTML = '';
                suggestions.forEach(function(suggestion) {
                    var option = document.createElement('option');
                    option.value = suggestion;
                    datalist.appendChild(option);
                });

                paysInput.setAttribute('list', 'countries');
            });
        });

    </script>

    {{-- control mail --}}
    <script>
        // /public/js/validation.js
        document.addEventListener('DOMContentLoaded', function() {
            var emailInput = document.getElementById('responsableEmail');
            var email = document.getElementById('email');

            var submitButton = document.getElementById('nextBtn');

            emailInput.addEventListener('input', function() {
                var emailVal = emailInput.value;
                if (validateEmail(emailVal)) {
                    emailInput.classList.remove('invalid-email');
                    submitButton.classList.remove('disabled-button');
                    submitButton.disabled = false;
                } else {
                    emailInput.classList.add('invalid-email');
                    submitButton.classList.add('disabled-button');
                    submitButton.disabled = true;
                }
            });

            email.addEventListener('input', function() {
                var emailVal1 = email.value;
                if (validateEmail1(emailVal1)) {
                    email.classList.remove('invalid-email');
                    submitButton.classList.remove('disabled-button');
                    submitButton.disabled = false;
                } else {
                    email.classList.add('invalid-email');
                    submitButton.classList.add('disabled-button');
                    submitButton.disabled = true;
                }
            });

            

            function validateEmail(email) {
                // Utilise une expression régulière pour valider l'email
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            function validateEmail1(email) {
                // Utilise une expression régulière pour valider l'email
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });

    </script>
@endsection
