@extends('layouts.app')
@section('titulo', '| Excluir Cliente')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/clientes/excluir/{{$id}}">
    @csrf
    @method('PUT')

        <div class="card">
            <div class="card-header">
                <b>Excluir Cliente #{{$id}}</b>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    @if(!empty(Session::get('message')))
                        <div class="alert alert-success"> {{ Session::get('message') }}</div>
                    @endif
                    @if(!empty(Session::get('error')))
                        <div class="alert alert-danger"> {{ Session::get('error') }}</div>
                    @endif
            
                </div>
                <div class="row">
                    <div class="col">
                    <p>
                        Deseja realmente excluir a oferta <b>{{$entity[0]->Nome}}</b>?
                    </p>    
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <input type="hidden" name="id" value="{{ $id }}">
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Confirmar</button>
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/detalhar/{{$id}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection