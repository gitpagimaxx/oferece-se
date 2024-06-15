@if($perfil->Delivery == 1)	
	<div class="container-fluid text-bg-light bg-hydrogen">
		<div class="container pt-4 pb-4 text-center">
            <div class="row">
                <h1 class="titulo">A melhor entrega de remédios <span class="color-orange">na região</span></h1>
                <p class="texto mt-2 text-white">
                    Não perca tempo e peça pelo WhatsApp, e tenha a comodidade de nossa entrega mais bem avaliada da região.
                </p>
                <p class="mt-3 mb-3 d-grid">
                <a href="https://wa.me/55{{$perfil->WhatsApp}}?text=Estou%20interessado%20em%20seus%20produtos" class="btn btn-success btn-lg border border-info-subtle pt-4 pb-4" target="_blank">Me chame no WhatsApp &nbsp;<i class="fab fa-whatsapp"></i></a>
                </p>
            </div>
        </div>
	</div>
@endif