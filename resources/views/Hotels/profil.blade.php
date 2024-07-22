@extends('layouts.master')

@section('content')
<div class="page-head"> 
    <div class="container">
        <h1 class="page-title"><span class="orange strong">Mon profil</span></h1>
    </div>
</div>

<div class="content-area user-profiel">
    <div class="container">   
        <div class="row">
            <!-- Informations de l'hôtel et du gestionnaire -->
           
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 style="color: #dfa974;">Informations de l'hôtel et du gestionnaire</h5>
                    </div>
                    <div class="table-responsive">
                        @if(Session::get('success'))
                            <div class="alert alert-success text-center" id="msg_success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                
                        <script>
                            // Masquer le message d'erreur après 3 secondes
                            setTimeout(function() {
                                $('#msg_success').hide();
                            }, 5000);
                        </script>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{ route('hotel.update', ['hotel' => $hotels->id]) }}" method="post">
                            @csrf
                            <div class="row">
                                <!-- Hotel Information Card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="color: #dfa974;">Hôtel</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Hôtel :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->nom }}" id="nom" name="nom">
                                            </div>
                                            <div class="form-group">
                                                <label>Adresse :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->adresse }}" id="adresse" name="adresse">
                                            </div>
                                            <div class="form-group">
                                                <label>Pays :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->pays }}" id="pays" name="pays">
                                            </div>
                                            <div class="form-group">
                                                <label>Téléphone :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->telephone }}" id="telephone" name="telephone">
                                            </div>
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control" value="{{ $hotels->user->email }}" id="rmail" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Manager Information Card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="color: #dfa974;">Gestionnaire</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nom :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->responsable }}" id="responsable" name="responsable" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control" value="{{ $hotels->responsableEmail }}" id="responsableEmail" name="responsableEmail" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Téléphone :</label>
                                                <input type="text" class="form-control" value="{{ $hotels->responsableTelephone }}" id="responsableTelephone" name="responsableTelephone" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                            
                        </form> --}}

                      
                        <form action="{{ route('hotel.update', ['hotel' => $hotels->id]) }}" method="post" id="profileForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Hotel Information Card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="color: #dfa974;">Hôtel</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Hôtel :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->nom }}" id="nom" name="nom">
                                            </div>
                                            <div class="form-group">
                                                <label>Adresse :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->adresse }}" id="adresse" name="adresse">
                                            </div>
                                            <div class="form-group">
                                                <label>Pays :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->pays }}" id="pays" name="pays">
                                            </div>
                                            <div class="form-group">
                                                <label>Téléphone :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->telephone }}" id="telephone" name="telephone">
                                            </div>
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control required" value="{{ $hotels->user->email }}" id="email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Manager Information Card -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="color: #dfa974;">Gestionnaire</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Nom :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->responsable }}" id="responsable" name="responsable">
                                            </div>
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" class="form-control required" value="{{ $hotels->responsableEmail }}" id="responsableEmail" name="responsableEmail">
                                            </div>
                                            <div class="form-group">
                                                <label>Téléphone :</label>
                                                <input type="text" class="form-control required" value="{{ $hotels->responsableTelephone }}" id="responsableTelephone" name="responsableTelephone">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="card">
                                        <div class="card-header">
                                            <h6 style="color: #dfa974;">Pièce jointe <span style="font-size: 60%">(Numéro d'Identification Fiscale)</span></h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                @if($hotels->photo)
                                                    <?php
                                                        // Extraire le nom du fichier à partir du chemin
                                                        $fileName = basename($hotels->photo);
                                                    ?>
                                            
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <!-- Nom du document (inactif) -->
                                                        <p class="text-muted mb-0">{{ $fileName }}</p>
                                            
                                                        <!-- Bouton de téléchargement avec icône -->
                                                        <a href="{{ asset('images/' . $hotels->photo) }}" download="{{ $fileName }}" class="btn btn-sm btn-success btn-icon" title="Télécharger">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                    </div>
                                                        <hr class="section-divider"/>
                                                    <div class="form-group">
                                                        <label for="new_image">Remplacer le fichier :</label>
                                                        <input type="file" class="form-control-file" id="new_image" name="new_image" accept=".pdf">
                                                        @error('new_image')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    {{-- <button type="submit" class="btn btn-warning btn-icon">
                                                        <i class="fa fa-upload"></i> Remplacer le fichier
                                                    </button> --}}
                                            
                                                @else
                                                    <p class="text-warning">Aucun fichier joint.</p>

                                                    <div class="form-group">
                                                        <label for="new_image">Ajouter une pièce jointe fichier :</label>
                                                        <input type="file" class="form-control-file" id="new_image" name="new_image" accept=".pdf">
                                                        @error('new_image')
                                                            <div class="text text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group text-right mt-3">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h6 style="color: #dfa974;">Changer mon mot de passe</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf

                            @if(Session::get('danger'))
                                <div class="alert alert-warning" id="msg_danger">
                                    {{ Session::get('danger') }}
                                </div>
                            @endif

                            <script>
                                setTimeout(function() {
                                    $('#msg_danger').hide();
                                }, 5000);
                            </script>

                            <div class="form-group">
                                <label for="old_password">Ancien mot de passe :</label>
                                <input name="old_password" id="old_password" type="password" value="{{old('old_password')}}" class="form-control">
                                @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Nouveau mot de passe :</label>
                                <input name="password" id="password" type="password" class="form-control" value="{{old('password')}}">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 
                            <div class="form-group">
                            <label for="password_confirmation"> Confirmer mot de passe :</label>
                                <input name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" type="password" class="form-control">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div> 

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
        </div><!-- end row -->

    </div>
</div>

    <style>

        
    /* css pour control de mail */
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

        /* le trait qui separe le document telecharger */
        .section-divider {
            border: 0;
            height: 2px;
            background: linear-gradient(to right, #dfa974, #dfa974, #dfa974);
            margin: 20px 0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            opacity: 0.7;
        }
        /* fin */
                    
        .page-head {
            background-color: #f7f7f7;
            padding: 10px 0;
            text-align: center;
        }
        .page-title {
            font-size: 2rem;
        }
        .orange {
            color: #dfa974;
        }
        .content-area {
            background-color: #fcfcfc;
            padding: 10px 0;
        }
        .card {
            margin-top: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f7f7f7;
        }
        .form-control {
            border-radius: 0.25rem;
        }
        .btn-primary {
            background-color: #dfa974;
            border-color: #dfa974;
        }
        .btn-primary:hover {
            background-color: #dfa974;
            border-color: #dfa974;
        }
        .alert {
            margin-top: 10px;
        }
    </style>

    <script>
        document.getElementById('profileForm').addEventListener('submit', function(event) {
            var isValid = true;
            var requiredFields = document.querySelectorAll('.required');

            requiredFields.forEach(function(field) {
                if (!field.value.trim()) {
                    field.style.borderColor = 'red';
                    isValid = false;
                } else {
                    field.style.borderColor = '';
                }
            });

            // Validate email format
            var emailField = document.getElementById('email');
            var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailPattern.test(emailField.value)) {
                emailField.style.borderColor = 'red';
                inputs[i].classList.add("is-invalid");

                isValid = false;
            } else {
                emailField.style.borderColor = '';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });

        document.getElementById('telephone').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
        });

        document.getElementById('responsableTelephone').addEventListener('input', function() {
            this.value = this.value.replace(/\D/g, '');
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
