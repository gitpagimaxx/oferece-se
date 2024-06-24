@extends('layouts.app')
@section('titulo', '| Detalhar Oferta')
@section('content')
<div class="container p-3">
    <div class="card">
        <div class="card-header">
            <b>Detalhes da Oferta #{{$id}}</b>
        </div>
        <div class="card-body">
            <div class="row mb-4">
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

            @if ($oferta == null) 
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger mb-3">Oferta não encontrada, <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas">clique aqui</a> para retornar a lista</div>
                    </div>
                </div>
            @else 
                <div class="row mb-3">
                    <div class="col">
                        <h1 class="font-semibold text-xl text-gray-800 leading-tight mb-3">
                            <b>{{ $oferta->Titulo }}</b>
                        </h1>
                        <p><b>Detalhes:</b> {{ $oferta->Descricao }}</p>
                        <p><b>Validade:</b> {{ date('d/m/Y', strtotime($oferta->Validade)) }}</p>
                        <p>
                            <b>Link da Oferta:</b> <a href="{{ url(ENV('APP_URL')) . '/ofertas/' . Str::slug($perfil->NomeUsuario, '-') . '/' . $id }}" target="_blank">{{ url(ENV('APP_URL')) . '/ofertas/' . Str::slug($perfil->NomeUsuario, '-') . '/' . $id }}</a>
                            <button onclick="copyFunction('{{getenv('APP_URL') . '/ofertas/' . Str::slug($perfil->NomeUsuario, '-') . '/' . $id }}')" class="btn btn-sm btn-info text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Copiar Link"><i class="fas fa-copy"></i></button>
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-2">
                        <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/adicionar/{{$id}}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>&nbsp;Adicionar Item de Oferta</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <hr class="mb-4">
                        <h2><b>Itens da Oferta</b></h2>
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Título</th>
                                <th scope="col">Criado em</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($ofertaItem ?? '' as $item)
                            <tr>
                                <td><a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/alterar/{{ $item->id }}">{{ $item->Item }}</a></td>
                                <td style="width:180px;">{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
                                <td style="width:130px;">
                                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/alterar/{{ $item->id }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar Item"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/item/excluir/{{ $item->id }}" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Item"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            @if ($oferta != null) 
                <input type="hidden" name="UserId" value="{{ Auth::user()->id }}">
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/alterar/{{$id}}" class="btn btn-outline-info"><i class="fas fa-edit"></i>&nbsp;Editar</a>
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/excluir/{{$id}}" class="btn btn-outline-danger"><i class="fas fa-trash"></i>&nbsp;Excluir</a>
                <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i>&nbsp;Voltar</a>
            
            @endif
        </div>
    </div>
</div>

<script>
function copyFunction(url) {

    /* Copy the text inside the text field */
    // variable content to be copied
  var copyText = url;
  // create an input element
  let input = document.createElement('input');
  // setting it's type to be text
  input.setAttribute('type', 'text');
  // setting the input value to equal to the text we are copying
  input.value = copyText;
  // appending it to the document
  document.body.appendChild(input);
  // calling the select, to select the text displayed
  // if it's not in the document we won't be able to
  input.select();
  // calling the copy command
  document.execCommand("copy");
  // removing the input from the document
  document.body.removeChild(input)
  
  alert('Link copiado');
}
</script>

@endsection