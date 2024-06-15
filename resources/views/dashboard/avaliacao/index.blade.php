@extends('layouts.app')
@section('titulo', '| Avaliações')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Avaliações</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    @if(!empty(Session::get('message')))
                        <div class="alert alert-{{ Session::get('typeMessage') }} mb-3"> {{ Session::get('message') }}</div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao" method="get" class="row g-3">
                        <div class="col-11">
                            <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Buscar..." value={{$palavra ?? ''}}>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="btn btn-outline-primary mb-3">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="col alert alert-info">
                        Seu link para solicitar avaliações: <a href="{{ url(ENV('APP_URL')) }}/avaliar/{{ $perfil->NomeUsuario }}" target="_blank">{{ url(ENV('APP_URL')) }}/avaliar/{{ $perfil->NomeUsuario }}</a>
                        <button onclick="copyFunction('{{getenv('APP_URL') . '/avaliar/' . Str::slug($perfil->NomeUsuario, '-') }}')" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Copiar Link"><i class="fas fa-copy"></i></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <table class="table">
                    <thead>
                        <tr>
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
                            <td><a href="{{ url(ENV('APP_URL')) }}/dashboard/avaliacao/detalhar/{{ $item->id }}">{{ $item->Nome }}</a></td>
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
            <b>{{$qtdeRegistros}}</b> avaliações encontrado(s)
        </div>
    </div>
</div>
@endsection
