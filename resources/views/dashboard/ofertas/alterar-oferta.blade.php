@extends('layouts.app')
@section('titulo', '| Alterar Oferta')
@section('content')
<div class="container p-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/alterar/{{$id}}">
    @csrf
    @method('PUT')
        <div class="card">
            <div class="card-header">
                <b>Alterar Oferta #{{$id}}</b>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group mb-3">
                            <label for="Titulo">Título</label>
                            <input type="text" class="form-control" name="Titulo" value="{{ old('Titulo', $oferta[0]->Titulo) }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="Descricao">Descrição</label>
                            <textarea name="Descricao" rows="5" class="form-control">{{ old('Descricao', $oferta[0]->Descricao) }}</textarea>
                        </div>
                        <div class="form-group mb-3>
                            <label for="Validade">Validade</label>
                            <input type="date" class="form-control col-3" name="Validade" value="{{ old('Validade', \Carbon\Carbon::parse($oferta[0]->Validade)->format('Y-m-d')) }}">
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{$id}}" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
            </div>
        </div>
    </form>
</div>
@endsection