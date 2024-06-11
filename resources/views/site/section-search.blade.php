@if($perfil[0]->Buscador == 1)	
	<div class="container-fluid text-bg-light">
		<div class="container pt-4 pb-4">
            <div class="hstack gap-3">
                <input class="form-control me-auto form-control-lg" type="text" placeholder="O que procura?" aria-label="O que procura?">
                <a type="button" class="btn btn-info btn-lg">
                    <i class="fas fa-search"></i>
                </a>
            </div>
        </div>
	</div>
@endif