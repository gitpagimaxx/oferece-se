@extends('layouts.app')
@section('titulo', '| Detalhes do Cliente')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Detalhes do Cliente #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if(!empty(Session::get('message')))
                        <div class="alert alert-{{ Session::get('typeMessage') }} mb-3"> {{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="row mb-3 p-3">
                    <div class="col">
                        <h2><b>{{ $entity->Nome }}</b></h2>
                        <p><b>Telefone:</b> {{ $entity->Telefone }}</p>
                        <p><b>CEP:</b> {{ $entity->CEP }}</p>
                        <p><b>Endereço:</b> {{ $entity->Endereco }}, {{ $entity->Numero }}</p>
                        <p><b>Complemento:</b> {{ $entity->Complemento }}</p>
                        <p><b>Bairro:</b> {{ $entity->Bairro }}</p>
                        <p><b>Cidade:</b> {{ $entity->Cidade }}</p>
                        <p><b>Estado:</b> {{ $entity->Estado }}</p>
                        <p><b>Referência:</b> {{ $entity->Referencia }}</p>
                        <p><b>Data do Cadastro:</b> {{ date('d/m/Y', strtotime($entity->created_at)) }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/alterar/{{$id}}" class="btn btn-outline-info"><i class="fas fa-edit"></i>&nbsp;Alterar</a>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/excluir/{{$id}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i>&nbsp;Excluir</a>
            <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
        </div>
    </div>
</div>
@endsection