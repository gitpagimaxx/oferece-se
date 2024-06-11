@if($perfil[0]->Avaliacoes == 1)	
	<div class="container-fluid text-bg-light bg-hydrogen">
		<div class="container pt-4 pb-4">
            <div class="row">
                <h2 class="titulo">Avaliações</h2>
                <p class="texto mt-2 text-white">
                    Veja as avaliações de quem já comprou conosco
                </p>

                <div class="card mb-3 bg-avaliacao">
                    <div class="card-body">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem.</p>
                    </div>
                </div>

                <div class="card mb-3 bg-avaliacao">
                    <div class="card-body">
                        <h5 class="card-title">Mary Jane</h5>
                        <p class="card-text">Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid.</p>
                    </div>
                </div>
                
            </div>
        </div>
	</div>
@endif