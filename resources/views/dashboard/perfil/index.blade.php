@extends('layouts.app')
@section('titulo', '| Perfil')
@section('content')
<div class="container pt-3">

    <form method="POST" action="{{ url(ENV('APP_URL')) }}/dashboard/perfil/{{$perfil->id}}" enctype="multipart/form-data">
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
                        <div class="col">
                            @if(!empty(Session::get('message')))
                                <div class="alert alert-{{ Session::get('typeMessage') }} mb-3"> {{ Session::get('message') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    Perfil
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="Nome">Título</label>
                                        <input type="text" class="form-control" name="Nome" value="{{ old('Nome', Auth::user()->name) }}" maxlength="250" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="NomeUsuario">Nome de Usuário</label>
                                        <input type="text" class="form-control" name="NomeUsuario" value="{{ old('NomeUsuario', $perfil->NomeUsuario) }}" {{ ($perfil->NomeUsuario != '' ? " disabled" : '') }} maxlength="250">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Telefone">Telefone</label>
                                        <input type="text" class="form-control col-4" name="Telefone" value="{{ old('Telefone', $perfil->Telefone) }}" maxlength="15" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="WhatsApp">WhatsApp</label>
                                        <input type="text" class="form-control col-4" name="WhatsApp" value="{{ old('WhatsApp', $perfil->WhatsApp) }}" maxlength="15">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="Localizacao">Localização</label>
                                        <textarea name="Localizacao" rows="3" class="form-control" maxlength="500">{{$perfil->Localizacao}}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="LinkMaps">Link Maps</label>
                                        <input type="text" class="form-control" name="LinkMaps" value="{{ old('LinkMaps', $perfil->LinkMaps) }}" maxlength="300">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="HorarioAtendimento">Horário de Atendimento</label>
                                        <textarea name="HorarioAtendimento" rows="3" class="form-control" maxlength="300">{{$perfil->HorarioAtendimento}}</textarea>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="Buscador" {{ ($perfil->Buscador == 1 ? " checked" : '') }}>
                                        <label class="form-check-label" for="Buscador">
                                            Habilitar Buscador
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Delivery" value="1" {{ ($perfil->Delivery == 1 ? " checked" : '') }}>
                                        <label class="form-check-label" for="Delivery">
                                            Habilitar Delivery
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="Avaliacoes" value="1" {{ ($perfil->Avaliacoes == 1 ? " checked" : '') }}>
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
                                        @if($perfil->Logotipo != '')
                                            <img src="{{env('APP_URL')}}/images/avatars/{{ $perfil->Logotipo }}" alt="{{ $perfil->Nome }}">
                                        @endif
                                    </p>

                                    <div class="mb-3">
                                        <label for="Logotipo" class="form-label">Arquivo</label>
                                        <input class="form-control" type="file" name="Logotipo" accept="image/x-png,image/gif,image/jpeg">
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
