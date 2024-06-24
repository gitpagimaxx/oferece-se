@extends('layouts.app')
@section('titulo', '| Excluir Oferta')
@section('content')
<div class="container p-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/excluir/{{$id}}">
    @csrf
    @method('PUT')
        <div class="card">
            <div class="card-header">
                <b>Excluir Oferta #{{$id}}</b>
            </div>
            <div class="card-body">
                @if ($oferta == null) 
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger mb-3">Oferta não encontrada, <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas">clique aqui</a> para retornar a lista</div>
                        </div>
                    </div>
                @else 
                <div class="row">
                    <div class="col">
                        <p>
                            Deseja realmente excluir a oferta <b>{{$oferta->Titulo}}</b>?
                        </p>    
                    </div>
                </div>
                @endif
            </div>
            <div class="card-footer">
                @if ($oferta != null)
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Confirmar</button>
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{$id}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Cancelar</a>
                @else
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Voltar</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection