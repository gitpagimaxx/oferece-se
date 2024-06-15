@if($perfil->Avaliacoes == 1)	
	<div class="container-fluid text-bg-light bg-hydrogen">
		<div class="container pt-4 pb-4">
            <div class="row">
                <h2 class="titulo text-center">Avaliações</h2>
                <p class="texto mt-2 text-white text-center">
                    Veja as avaliações de quem já comprou conosco
                </p>

                @foreach ($avaliacoes as $avaliacao) 
                    <div class="card mb-3 bg-avaliacao">
                        <div class="card-body">
                            <h5 class="card-title">{{ $avaliacao->Nome }}</h5>
                            <p class="card-text">{{ $avaliacao->Observacao }}</p>
                            <p class="badge text-bg-primary">
                                Atendimento: 
                                @for ($i = 1; $i <= $avaliacao->Atendimento; $i++)
                                    <i class="fas fa-regular fa-star pr-1"></i>
                                @endfor
                            </p>
                            <p class="badge text-bg-primary">
                                Entrega: 
                                @for ($i = 1; $i <= $avaliacao->Entrega; $i++)
                                    <i class="fas fa-regular fa-star pr-1"></i>
                                @endfor
                            </p>
                            <p><small class="text-muted">Avaliado em <b>{{ date('d/m/Y H:i', strtotime($avaliacao->created_at)) }}</b></small></p>
                        </div>  
                    </div>
                @endforeach
            </div>
        </div>
	</div>
@endif