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
            <div class="row">
                <div class="col-6">
                <div class="form-group mb-3">
                        <label for="Nome">Nome</label>
                        <input type="text" class="form-control" name="Nome" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control col-4" name="Telefone" id="Telefone" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="CEP">CEP</label>
                        <input type="text" class="form-control col-4" name="CEP" id="CEP" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="Endereco">Endereço</label>
                        <input type="text" class="form-control" name="Endereco" id="Endereco">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Numero">Número</label>
                        <input type="text" class="form-control col-4" name="Numero" id="Numero">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="Complemento" id="Complemento">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Bairro">Bairro</label>
                        <input type="text" class="form-control col-6" name="Bairro" id="Bairro">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Cidade">Cidade</label>
                        <input type="text" class="form-control col-6" name="Cidade" id="Cidade">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Estado">Estado</label>
                        <input type="text" class="form-control col-2" name="Estado" id="Estado">
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