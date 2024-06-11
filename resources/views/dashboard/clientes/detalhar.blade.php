@extends('layouts.app')
@section('titulo', '| Detalhes do Cliente')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Detalhes do Cliente #{{$id}}</b>
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

                <div class="row mb-3 p-3">
                    <div class="col">
                        <p><b>Nome: {{ $cliente[0]->Nome }}</b></p>
                        <p><b>Telefone:</b> {{ $cliente[0]->Telefone }}</p>
                        <p><b>CEP:</b> {{ $cliente[0]->CEP }}</p>
                        <p><b>Endereço:</b> {{ $cliente[0]->Endereco }}, {{ $cliente[0]->Numero }}</p>
                        <p><b>Complemento:</b> {{ $cliente[0]->Complemento }}</p>
                        <p><b>Bairro:</b> {{ $cliente[0]->Bairro }}</p>
                        <p><b>Cidade:</b> {{ $cliente[0]->Cidade }}</p>
                        <p><b>Estado:</b> {{ $cliente[0]->Estado }}</p>
                        <p><b>Referência:</b> {{ $cliente[0]->Referencia }}</p>
                        <p><b>Data do Cadastro:</b> {{ date('d/m/Y', strtotime($cliente[0]->created_at)) }}</p>
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