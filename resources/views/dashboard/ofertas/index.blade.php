@extends('layouts.app')
@section('titulo', '| Ofertas')
@section('content')
<div class="container pt-3">
    <div class="card">
        <div class="card-header">
            <b>Ofertas</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <a href="{{ url(ENV('APP_URL')) }}/dashboard/ofertas/adicionar" class="btn btn-primary"><i class="fas fa-plus-circle"></i>&nbsp;Novo</a>
                </div>
            </div>
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
                            <th scope="col">Título</th>
                            <th scope="col">Qtde Items</th>
                            <th scope="col">Validade</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($ofertas ?? '' as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $item->Titulo }}</td>
                            <td></td>
                            <td>{{ date('d/m/Y H:i', strtotime($item->created_at)) }}</td>
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
        </div>
        <div class="card-footer">
            Ofertas(s) <b>{{$qtdeRegistros}}</b> encontrado(s)
        </div>
    </div>
</div>
@endsection

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
  
}
</script>