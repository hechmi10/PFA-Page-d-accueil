@extends('base')

@section('content')

   <div class="bg-light p-5 mb-5 text-center"> 
       <div class="container">
           <h1>Bienvenue sur notre Marketplace</h1>
           <p>Agriconnect est votre destination en ligne pour des produits agricoles frais et de qualité. Connectant les agriculteurs locaux avec les consommateurs, notre marketplace propose une variété de fruits, légumes, produits laitiers et plus encore, le tout avec un engagement envers une agriculture durable et des prix équitables. Découvrez une expérience d'achat conviviale, avec une livraison rapide et des produits frais directement de la ferme à votre porte. Rejoignez-nous pour soutenir les producteurs locaux et savourer une alimentation saine et locale.</p>
       </div>
   </div>

   <div class="container">
    <h2>Nos derniers produits</h2>
    <div class="row">

        @foreach ($properties as $property )
        
        <div class="col">
            @include('property.card')
        </div>
        @endforeach

    </div>
   </div>
@endsection
