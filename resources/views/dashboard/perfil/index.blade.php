@extends('layouts.app')
@section('titulo', '| Perfil')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/perfil/{{$perfil[0]->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <b>Dados Principais</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Perfil
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="Nome">Título</label>
                                        <input type="text" class="form-control" name="Nome" value="{{ old('Nome', $perfil[0]->Nome) }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="NomeUsuario">Nome de Usuário</label>
                                        <input type="text" class="form-control" name="NomeUsuario" value="{{ old('NomeUsuario', $perfil[0]->NomeUsuario) }}" {{ ($perfil[0]->NomeUsuario != '' ? " disabled" : '') }}>
                                    </div>
                                    <div class="form-group col-4 mb-3">
                                        <label for="Telefone">Telefone</label>
                                        <input type="text" class="form-control" name="Telefone" value="{{ old('Telefone', $perfil[0]->Telefone) }}">
                                    </div>
                                    <div class="form-group col-4 mb-3">
                                        <label for="WhatsApp">WhatsApp</label>
                                        <input type="text" class="form-control" name="WhatsApp" value="{{ old('WhatsApp', $perfil[0]->WhatsApp) }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Localizacao">Localização</label>
                                        <textarea name="Localizacao" rows="3" class="form-control">{{$perfil[0]->Localizacao}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="LinkMaps">Link Maps</label>
                                        <input type="text" class="form-control" name="LinkMaps" value="{{ old('LinkMaps', $perfil[0]->LinkMaps) }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="HorarioAtendimento">Horário de Atendimento</label>
                                        <textarea name="HorarioAtendimento" rows="3" class="form-control">{{$perfil[0]->HorarioAtendimento}}</textarea>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Buscador" {{ ($perfil[0]->Buscador == 1 ? " checked" : '') }}>
                                        <label class="form-check-label" for="Buscador">
                                            Habilitar Buscador
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Delivery" value="1" {{ ($perfil[0]->Delivery == 1 ? " checked" : '') }}>
                                        <label class="form-check-label" for="Delivery">
                                            Habilitar Delivery
                                        </label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" name="Avaliacoes" value="1" {{ ($perfil[0]->Avaliacoes == 1 ? " checked" : '') }}>
                                        <label class="form-check-label" for="Avaliacoes">
                                            Habilitar Avaliações
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Logotipo
                                </div>
                                <div class="card-body">
                                    <p class="mb-5 text-center">
                                        @if($perfil[0]->Logotipo != '')
                                            <img src="{{env('APP_URL')}}/images/avatars/{{ $perfil[0]->Logotipo }}" alt="{{ $perfil[0]->Nome }}">
                                        @endif
                                    </p>

                                    <div class="mb-3">
                                        <label for="Logotipo" class="form-label">Arquivo</label>
                                        <input class="form-control" type="file" name="Logotipo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i>&nbsp;&nbsp;Salvar</button>
                </div>
            </div>
        </div>
    </div>
    
    </form>
</div>
@endsection
