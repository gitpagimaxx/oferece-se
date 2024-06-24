@extends('layouts.app')
@section('titulo', '| Ofertas')
@section('content')
<div class="container pt-3">
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/adicionar">
    @csrf
    <div class="card">
        <div class="card-header">
            <b>Adicionar Oferta</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group mb-3">
                        <label for="Titulo">Título</label>
                        <input type="text" class="form-control" name="Titulo" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Descricao">Descrição</label>
                        <textarea name="Descricao" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group mb-3>
                        <label for="Validade">Validade</label>
                        <input type="date" class="form-control col-3"" name="Validade" required>
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
        </div>
    </div>
    </form>
</div>
@endsection