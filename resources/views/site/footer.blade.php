    <section id="footer" class="container-fluid bg-footer text-white border-top pt-4 pb-4">
		<div class="container">
			<div class="row gx-36">

				<!-- Horario -->
				<div class="col-lg-4">

					<div class="main-block icon-block light-color text-center">
						
						<div class="main-block-container icon-block-container">

							<div class="main-block-header icon-block-header accent-color">
								<i class="fas fa-2x fa-clock pt-4 pb-4"></i>
							</div>

							<div class="main-block-body icon-block-body">

								<div class="main-block-heading icon-block-heading">
									<h6 class="pt-2">Horário de Atendimento:</h6>
								</div>

								<div class="main-block-content icon-block-content">
									<p>
									{{ $perfil->HorarioAtendimento }}
									</p>
								</div>

								<div class="main-block-footer icon-block-footer">
									<p>
									<a href="https://wa.me/55{{$perfil->WhatsApp}}?text=Estou%20interessado%20em%20seus%20produtos" class="btn btn-info mt-2" target="_blank">
										Tire sua dúvida aqui
									</a>
									</p>
								</div>

							</div>

						</div>
					</div>

					<!-- GAP -->
					<div class="gap gap-18"></div>

				</div>

                <!-- Contato -->
				<div class="col-lg-4">

					<div class="main-block icon-block light-color text-center">

						<div class="main-block-container icon-block-container">

							<div class="main-block-header icon-block-header accent-color">
								<i class="fas fa-2x fa-phone pt-4 pb-4"></i>
							</div>

							<div class="main-block-body icon-block-body">

								<div class="main-block-heading icon-block-heading">
									<h6 class="pt-2">Contatos:</h6>
								</div>

								<div class="main-block-content icon-block-content">
									<p>
										Telefone: <a href="tel:+55{{$perfil->Telefone}}">{{ preg_replace('~.*(\d{2})[^\d]{0,9}(\d{5})[^\d]{0,9}(\d{4}).*~', '($1) $2-$3', $perfil->Telefone)  }}</a>
										<br>
										WhatsApp: <a href="https://wa.me/55{{$perfil->WhatsApp}}?text=Estou%20interessado%20em%20seus%20produtos" target="_blank">{{ preg_replace('~.*(\d{2})[^\d]{0,9}(\d{5})[^\d]{0,9}(\d{4}).*~', '($1) $2-$3', $perfil->WhatsApp)  }}</a>
									</p>
								</div>

								<div class="main-block-footer icon-block-footer">
									<p>
									<a href="https://wa.me/55{{$perfil->WhatsApp}}?text=Estou%20interessado%20em%20seus%20produtos" class="btn btn-success btn-whatsapp mt-2" target="_blank">Me chame no WhatsApp</a>
									</p>
								</div>

							</div>

						</div>
					</div>

					<!-- GAP -->
					<div class="gap gap-18"></div>

				</div>

				<!-- Localização -->
				<div class="col-lg-4">

					<div class="main-block icon-block light-color text-center">
						
						<div class="main-block-container icon-block-container">

							<div class="main-block-header icon-block-header accent-color">
								<i class="fas fa-2x fa-map pt-4 pb-4"></i>
							</div>

							<div class="main-block-body icon-block-body">

								<div class="main-block-heading icon-block-heading">
									<h6 class="pt-2">Localização:</h6>
								</div>

								<div class="main-block-content icon-block-content">
									<p>
										{!! $perfil->Localizacao !!}
									</p>
								</div>

								<div class="main-block-footer icon-block-footer">
									<p>
									<a href="{{$perfil->LinkMaps}}" class="btn btn-primary mt-2" target="_blank">Ver no Mapa</a>
									</p>
								</div>

							</div>

						</div>
					</div>

					<div class="gap gap-18"></div>

				</div>


			</div>
		</div>

		<hr>
		<div class="footer-section-copyright mt-4">
			<div class="main-section">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="footer-section-copyright-content light-color text-center">
								<p>&copy; {{ date('Y') }} Site by  
									<a href="https://pagimaxx.com/ofertas" target="_blank">
										<b>PAGIMAX</b> Soluções
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>