@extends('layouts.site')

@section('content')
<!-- Depoimentos de nosso Delivery -->
<div class="container">
    <div class="row mt-4 text-white">
        <h3>{{$oferta[0]->Titulo}}</h3>
        <hr>
        <p>{{$oferta[0]->Descricao}}🔥🔥🔥</p>
    </div>
    <div class="row mt-2 mb-2">
        <div class="col">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($ofertaItem ?? '' as $item)
                    <li class="list-group-item">
                        <i class="fas fa-star heading-color"></i>	
                        {{$item->Item}}<br>
                        <a href="https://wa.me/5511991306333?text={{$item->TextoWhatsApp}}" target="_blank" class="btn btn-success btn-sm mt-2 mb-2">Quero essa oferta</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card bg-info text-white mt-4 text-center">
            <div class="card-body">
                <h3>Disponível até {{ date('d/m/Y', strtotime($oferta[0]->Validade)) }}</h3>
                <p>Venha economizar 🔥🔥🔥</p>
            </div>
        </div>
    </div>

</div>

@endsection