@extends('layouts.app')
@section('titulo', '| Ofertas')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Ofertas</b>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
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
                    <form action="{{ url(ENV('APP_URL')) }}/dashboard/ofertas" method="get" class="row g-3">
                        <div class="col-11">
                            <input type="search" class="form-control" name="buscar" id="buscar" placeholder="Buscar..." value={{$palavra ?? ''}}>
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

            @if ($qtdeRegistros == 0)
            <div class="row">
                <div class="col">
                    <div class="alert alert-danger mb-3">Nenhuma oferta encontrada</div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Título</th>
                            <th scope="col">Qtde Items</th>
                            <th scope="col">Validade</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ofertas ?? '' as $item)
                        <tr>
                            <td><a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{ $item->id }}">{{ $item->Titulo }}</a></td>
                            <td style="width:100px;">{{ $item->qtdeItens }}</td>
                            <td style="width:150px;">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                            <td style="width:130px;">
                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/detalhar/{{ $item->id }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Detalhar"><i class="fas fa-info-circle"></i></a>&nbsp;
                                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/alterar/{{ $item->id }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar"><i class="fas fa-edit"></i></a>
                                <button onclick="copyFunction('{{getenv('APP_URL') . '/ofertas/' . Str::slug($perfil[0]->NomeUsuario, '-') . '/' . $item->id }}')" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Copiar Link"><i class="fas fa-copy"></i></button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col text-right">
                    {{ $ofertas->links() }}
                </div>
            </div>
            @endif
        </div>
        <div class="card-footer">
            <b>{{ $qtdeRegistros ?? 0 }}</b> oferta(s) encontrado(s)
        </div>
    </div>
</div>
@endsection