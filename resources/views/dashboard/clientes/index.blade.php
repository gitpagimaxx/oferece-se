@extends('layouts.app')
@section('titulo', '| Clientes')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Clientes</b>
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
                <div class="col">
                    <form action="{{ url(ENV('APP_URL')) }}/dashboard/clientes" method="get" class="row g-3">
                        <div class="col-11">
                            <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar..." value={{$palavra ?? ''}}>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-outline-primary mb-3">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            @if ($palavra != '')
            <div class="row mb-2">
                <div class="col">
                    <p>
                        <small>Pesquisada por <b>{{$palavra}}</b></small>
                    </p>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Data</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes ?? '' as $item)
                        <tr>
                            <td><a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/detalhar/{{ $item->id }}">{{ $item->Nome }}</a></td>
                            <td style="width:180px;">{{ $item->Telefone }}</td>
                            <td style="width:150px;">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td style="width:130px;">
                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/clientes/detalhar/{{ $item->id }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalhar"><i class="fas fa-info-circle"></i></a>&nbsp;
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-right">
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
        <div class="card-footer">
           <b>{{$qtdeRegistros}}</b> cliente(s) encontrado(s)
        </div>
    </div>
</div>
@endsection
