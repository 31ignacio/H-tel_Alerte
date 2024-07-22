@extends('layouts.master')

@section('content')

<section class="hp-room-section">
   
    <div class="container">
        <h4 class="text-center">Liste des Entreprises</h4>
       
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
    
        <div class="menu">
            <select class="form-control" id="category1" onchange="showHotels('category1')">
                <option value="none">Sélectionner un hôtel</option>
                <option value="luxe">Hôtels du Bénin</option>
                <option value="standard">Hôtels du Togo</option>
            </select>
        </div>
    
        <div class="hotel-list" id="luxe-hotels">
            <p class="text-center">
                <span class="total-enterprises">Nombre d'entreprises (BENIN) :</span>
                <span class="badge badge-pill badge-primary">{{ $hotelsBenin->total() }}</span>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Pays</th>
                            <th scope="col">Hôtel</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($hotelsBenin as $benin)
                    <tbody>
                        <tr>
                            <td><span class="badge badge-success">{{$benin->pays}}</span></td>
                            <td>{{$benin->nom}}</td>
                            <td>{{$benin->telephone}}</td>
                            <td>{{$benin->adresse}}</td>
                            <td>
                                <a href="{{ route('hotelPays.show', $benin->id) }}" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a>
                                @if ($benin->user->estActive)
                                    <form action="{{ route('hotelPays.desactiver', $benin->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-toggle-off"></i></button>

                                    </form>
                                @else
                                    <form action="{{ route('hotelPays.activer', $benin->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-toggle-on"></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        <!-- Ajoutez d'autres hôtels de catégorie de luxe -->
                    </tbody>
                    @endforeach
    
                </table>
                <br>
                {{-- LA PAGINATION --}}
                <div style="display: flex; justify-content: center;" class="mb-3 mt-3">
                    {{$hotelsBenin->links()}}
                </div>
            </div>
            
        </div>
    
        <div class="hotel-list" id="standard-hotels">
            <p class="text-center">
                <span class="total-enterprises">Nombre total d'entreprises (TOGO) :</span>
                <span class="badge badge-pill badge-primary">{{ $hotelsTogo->total() }}</span>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Pays</th>
                            <th scope="col">Hôtel</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($hotelsTogo as $togo)
                    <tbody>
                        <tr>
                            <td><span class="badge badge-warning">{{$togo->pays}}</span></td>
                            <td>{{$togo->nom}}</td>
                            <td>{{$togo->telephone}}</td>
                            <td>{{$togo->adresse}}</td>
                            <td>
                                <a href="{{ route('hotelPays.show', $togo->id) }}" class="btn btn-sm btn-info"><i class="fa fa-info-circle"></i></a>
                                @if ($togo->user->estActive)
                                    <form action="{{ route('hotelPays.desactiver', $togo->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-toggle-off"></i></button>

                                    </form>
                                @else
                                    <form action="{{ route('hotelPays.activer', $togo->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('PUT')

                                        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-toggle-on"></i></button>
                                    </form>
                                @endif
                            
                            
                            </td>
                        </tr>
                        <!-- Ajoutez d'autres hôtels de catégorie de luxe -->
                    </tbody>
                    @endforeach
    
                </table>
                <br>
                {{-- LA PAGINATION --}}
                <div style="display: flex; justify-content: center;" class="mb-3 mt-3">
                    {{$hotelsTogo->links()}}
                </div>
            </div>
            
        </div>
    </div>
    
    
    
</section> 
<style>
    body {
        font-family: Arial, sans-serif;
    }
    .menu {
        margin-bottom: 20px;
    }
    .hotel-list {
        display: none;
    }
    @media (min-width: 576px) {
        .hotel-list {
            margin-top: 20px;
        }
    }
</style>

<script>
    function showHotels(category) {
        var selectedCategory = document.getElementById(category).value;
        var hotelLists = document.querySelectorAll('.hotel-list');

        hotelLists.forEach(function(list) {
            list.style.display = 'none';
        });

        document.getElementById(selectedCategory + '-hotels').style.display = 'block';
    }

    // Afficher la liste des hôtels de luxe par défaut
    window.onload = function() {
        document.getElementById('luxe-hotels').style.display = 'block';
    };
</script>
@endsection