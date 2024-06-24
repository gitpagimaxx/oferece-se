@extends('layouts.app')
@section('titulo', '| Excluir Oferta Item')
@section('content')
<div class="container p-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/excluir/{{$id}}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <b>Excluir Item #{{$id}} da Oferta</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                <p>
                    Deseja realmente excluir o item <b>{{$ofertaItem->Item}}</b>?
                </p>    
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="id" value="{{ $id }}">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Confirmar</button>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{$ofertaItem->OfertaId}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
        </div>
    </div>
    </form>
</div>
@endsection