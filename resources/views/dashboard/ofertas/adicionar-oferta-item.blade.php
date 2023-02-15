@extends('layouts.app')
@section('titulo', '| Adicionar Oferta Item')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/adicionar">
    @csrf
    <div class="card">
        <div class="card-header">
            <b>Adicionar Item na Oferta #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="Item">Item</label>
                        <input type="text" class="form-control" name="Item">
                    </div>
                    <div class="form-group mb-3">
                        <label for="TextoWhatsApp">Complemento do botão do WhatsApp</label>
                        <input type="text" class="form-control" name="TextoWhatsApp">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="OfertaId" value="{{ $id }}">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{$id}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
        </div>
    </div>
    </form>
    
</div>
@endsection