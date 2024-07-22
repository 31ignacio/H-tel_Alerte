@extends('layouts.master')

@section('content')

 <!-- Contact Section Begin -->
 <section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contacte Info</h2>
                    <p>Besoin d'aide ou avez-vous des questions ? Nous sommes là 
                        pour vous aider ! Contactez-nous dès maintenant et nous vous répondrons dans les plus brefs délais.</p>
                    {{-- <table>
                        <tbody>
                            <tr>
                                <td class="c-o">Adresse:</td>
                                <td>cotonou,Bénin</td>
                            </tr>
                            <tr>
                                <td class="c-o">Téléphone:</td>
                                <td>(229) 40735335</td>
                            </tr>
                            <tr>
                                <td class="c-o">Email:</td>
                                <td>ariExpertiz@gmail.com</td>
                            </tr>
                            
                        </tbody>
                    </table> --}}
                </div>
            </div>
            <div class="col-lg-7 offset-lg-1">

                @if(Session::has('msg'))
                    <p class="alert alert-success">{{Session::get('msg')}}</p>

                @endif

                <form action="{{route('hotel.postMessage')}}" class="contact-form" id="contact-form" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Votre nom" name="name" required >
                        </div>
                        <div class="col-lg-6">
                            <input type="email" placeholder="Votre Email" name="email" required>
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Votre Message" name="message" required></textarea>
                            <button type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
</section>
<!-- Contact Section End -->

@endsection