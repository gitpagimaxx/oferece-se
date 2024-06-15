@extends('layouts.app')
@section('titulo', '| Detalhes da Avaliação')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao/publicar/{{$id}}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <b>Detalhes da Avaliação #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                @if(!empty(Session::get('message')))
                    <div class="alert alert-success"> {{ Session::get('message') }}</div>
                @endif
                @if(!empty(Session::get('error')))
                    <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                @endif

                <div class="row mb-3 p-3">
                    <div class="col">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                        <b>{{ $avaliacao->Nome }}</b> 
                        </h1>
                        <p><b>Telefone:</b> {{ $avaliacao->Telefone }}</p>
                        <p><b>Data da Avaliação:</b> {{ date('d/m/Y', strtotime($avaliacao->created_at)) }}</p>
                        <p><b>Atendimento:</b> {{ $avaliacao->Atendimento }}</p>
                        <p><b>Entrega:</b> {{ $avaliacao->Entrega }}</p>
                        <p><b>Observação:</b> {{ $avaliacao->Observacao }}</p>
                        <p><b>Publicado:</b> {{ ($avaliacao->Publicar == 1) ? 'Sim' : 'Não' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <input type="hidden" name="Publicar" value="1">
            @if ($avaliacao->Publicar == 0)
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Publicar</button>
            @endif
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
        </div>
    </div>
    </form>

</div>
@endsection