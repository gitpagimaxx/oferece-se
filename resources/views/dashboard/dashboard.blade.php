@extends('layouts.app')
@section('titulo', '| Dashboard')
@section('content')
<div class="container pt-3">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Quantidade de Ofertas</h4>
                </div>
                <div class="card-body">
                    <h1>{{$qtdeOfertas}}</h1>
                </div>
                <div class="card-footer">
                    <small>Total</small>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Quantidade de Clientes</h4>
                </div>
                <div class="card-body">
                    <h1>{{$qtdeClientes}}</h1>
                </div>
                <div class="card-footer">
                    <small>Total</small>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Quantidade de Avaliações</h4>
                </div>
                <div class="card-body">
                    <h1>{{$qtdeAvaliacao}}</h1>
                </div>
                <div class="card-footer">
                    <small>Total</small>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <b>Últimas ofertas</b>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Título</th>
                            <th scope="col">Qtde Items</th>
                            <th scope="col">Validade</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ofertas ?? '' as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->Titulo }}</td>
                            <td></td>
                            <td>{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer">
                    Últimos registros
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <b>Últimas avaliações</b>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Publicado</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($avaliacao ?? '' as $item)
                        <tr>
                            <th scope="row" style="width:60px;">{{ $item->id }}</th>
                            <td>{{ $item->Nome }}</td>
                            <td style="width:130px;">{{ $item->Telefone }}</td>
                            <td style="width:100px;">{{ ($item->Publicar == 1) ? 'Sim' : 'Não' }}</td>
                            <td style="width:150px;">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td style="width:130px;">
                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao/detalhar/{{ $item->id }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalhar"><i class="fas fa-info-circle"></i></a>&nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer">
                    Últimos registros
                </div>
            </div>
        </div>
    </div>

</div>    
@endsection