@extends('layouts.app')
@section('titulo', '| Avaliações')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Avaliações</b>
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
                <div class="col">
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
                    @foreach ($avaliacoes ?? '' as $item)
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
            </div>

            <div class="row mt-2">
                <div class="col text-right">
                    {{ $avaliacoes->links() }}
                </div>
            </div>
        </div>
        <div class="card-footer">
            Avaliações <b>{{$qtdeRegistros}}</b> encontrado(s)
        </div>
    </div>
</div>
@endsection
