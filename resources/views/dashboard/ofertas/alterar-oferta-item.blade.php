@extends('layouts.app')
@section('titulo', '| Alterar Oferta Item')
@section('content')
<div class="container p-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/alterar/{{$id}}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <b>Alterar Item da Oferta #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/adicionar/{{$ofertaItem->OfertaId}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                </div>        
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="Item">Item</label>
                        <input type="text" class="form-control" name="Item" value="{{ old('Item', $ofertaItem->Item) }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="TextoWhatsApp">Complemento do botão do WhatsApp</label>
                        <input type="text" class="form-control" name="TextoWhatsApp" value="{{ old('TextoWhatsApp', $ofertaItem->TextoWhatsApp) }}" required>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <input type="hidden" name="OfertaId" value="{{ $ofertaItem->OfertaId }}">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{ $ofertaItem->OfertaId }}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
        </div>
    </div>
</div>
@endsection