@extends('layouts.site')

@section('content')

<div class="container-fluid">
    <div class="container">
        <div class="row text-white">
            <div class="col">
                <h2>Avaliação</h2>
                <p>Ela é muito importante para sempre melhorarmos nosso atendimento</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" action="/registrar-avaliacao">
                    @method('POST')
                    @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="tel" class="form-control" name="telefone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Como foi o atendimento?</label>
                            <input type="range" class="form-range" min="1" max="5" name="atendimento">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Como foi a entrega?</label>
                            <input type="range" class="form-range" min="1" max="5" name="entrega">
                        </div>
                        <div class="mb-3">
                            <label for="observacao" class="form-label">Gostaria de fazer uma observação?</label>
                            <textarea class="form-control" name="observacao" rows="3"></textarea>
                        </div>
                        <input type="hidden" name="username" value="{{$perfil[0]->NomeUsuario}}">
                        <input type="hidden" name="vendaid" value="1">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar &nbsp;<i class="fas fa-paper-plane"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
