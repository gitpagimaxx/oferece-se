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
                        <input type="text" class="form-control" name="Nome" value="{{ old('Nome', $entity->Nome) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Telefone">Telefone</label>
                        <input type="text" class="form-control col-4" name="Telefone" id="Telefone" value="{{ old('Telefone', $entity->Telefone) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="CEP">CEP</label>
                        <input type="text" class="form-control col-3" name="CEP" id="CEP" value="{{ old('CEP', $entity->CEP ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Endereco">Endereço</label>
                        <input type="text" class="form-control" name="Endereco" id="Endereco" value="{{ old('Endereco', $entity->Endereco ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Numero">Número</label>
                        <input type="text" class="form-control col-3" name="Numero" value="{{ old('Numero', $entity->Numero ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Complemento">Complemento</label>
                        <input type="text" class="form-control" name="Complemento" value="{{ old('Complemento', $entity->Complemento ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Bairro">Bairro</label>
                        <input type="text" class="form-control" name="Bairro" id="Bairro" value="{{ old('Bairro', $entity->Bairro ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Cidade">Cidade</label>
                        <input type="text" class="form-control col-6" name="Cidade" id="Cidade" value="{{ old('Cidade', $entity->Cidade ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Estado">Estado</label>
                        <input type="text" class="form-control col-2" name="Estado" id="Estado" value="{{ old('Estado', $entity->Estado ) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="Referencia">Ponto de Referência</label>
                        <input type="text" class="form-control" name="Referencia" value="{{ old('Referencia', $entity->Referencia ) }}">
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