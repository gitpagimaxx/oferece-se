@extends('layouts.app')
@section('titulo', '| Excluir Oferta')
@section('content')
<div class="container p-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/excluir/{{$id}}">
    @csrf
    @method('PUT')
    <div class="container p-5">
        <div class="card">
            <div class="card-header">
                <b>Excluir Oferta #{{$id}}</b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                    <p>
                        Deseja realmente excluir a oferta <b>{{$oferta[0]->Titulo}}</b>?
                    </p>    
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" value="{{ $id }}">
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Confirmar</button>
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{$id}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection