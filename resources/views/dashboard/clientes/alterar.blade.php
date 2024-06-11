@extends('layouts.app')
@section('titulo', '| Alterar Cliente')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/clientes/alterar/{{$id}}">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <b>Alterar Cliente #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                </div>
            </div>
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
                        <input type="text" class="form-control" name="Nome" value="{{ old('Nome', $entity[0]->Nome) }}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control" name="Telefone" value="{{ old('Telefone', $entity[0]->Telefone) }}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label for="CEP">CEP</label>
                        <input type="text" class="form-control" name="CEP" value="{{ old('CEP', $entity[0]->CEP ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Endereco">Endereço</label>
                        <input type="text" class="form-control" name="Endereco" value="{{ old('Endereco', $entity[0]->Endereco ) }}">
                    </div>
                    <div class="form-group mb-3 col-3">
                        <label for="Numero">Número</label>
                        <input type="text" class="form-control" name="Numero" value="{{ old('Numero', $entity[0]->Numero ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="Complemento" value="{{ old('Complemento', $entity[0]->Complemento ) }}">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Bairro">Bairro</label>
                        <input type="text" class="form-control" name="Bairro" value="{{ old('Bairro', $entity[0]->Bairro ) }}">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Cidade">Cidade</label>
                        <input type="text" class="form-control" name="Cidade" value="{{ old('Cidade', $entity[0]->Cidade ) }}">
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="Estado">Estado</label>
                        <input type="text" class="form-control" name="Estado" value="{{ old('Estado', $entity[0]->Estado ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Referencia">Ponto de Referência</label>
                        <input type="text" class="form-control" name="Referencia" value="{{ old('Referencia', $entity[0]->Referencia ) }}">
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