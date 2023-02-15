@extends('layouts.app')
@section('titulo', '| Adicionar Cliente')
@section('content')
<div class="container pt-3">

    @section('titulo', '| Adicionar Cliente')
    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/clientes/adicionar">
    @csrf
    <div class="card">
        <div class="card-header">
            <b>Adicionar Cliente</b>
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
                <div class="col-6">
                <div class="form-group mb-3">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" name="Nome">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control" name="Telefone">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="CEP">CEP</label>
                        <input type="text" class="form-control" name="CEP">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Endereco">Endereço</label>
                        <input type="text" class="form-control" name="Endereco">
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="Numero">Número</label>
                        <input type="text" class="form-control" name="Numero">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="Complemento">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Bairro">Bairro</label>
                        <input type="text" class="form-control" name="Bairro">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Cidade">Cidade</label>
                        <input type="text" class="form-control" name="Cidade">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Estado">Estado</label>
                        <input type="text" class="form-control" name="Estado">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Referencia">Ponto de Referência</label>
                        <input type="text" class="form-control" name="Referencia">
                    </div>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Cancelar</a>
        </div>
    </div>
    </form>
</div>
@endsection