<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Configurar Horário</h4>
					</div>
					<form enctype="multipart/form-data" method="POST" action="<?=BASE_URL?>medico/inserir" id="form_cadastroMedico">
						<div class="card-body">						
							<div class="row mt-3 mb-3">
								<div class="col-sm-4 mt-3">
									<div class="form-group bmd-form-group">
										<label for="#nomeMedico" class="bmd-label-floating">Nome</label>
										<input type="text" class="form-control" id="nomeMedico" name="nomeMedico" required="true" minlength="6">
									</div>
								</div>
								<div class="col-sm-4 mt-3">
									<div class="form-group bmd-form-group">
										<label for="#emailMedico" class="bmd-label-floating">Email</label>
										<input type="email" class="form-control" id="emailMedico" name="emailMedico" required="true" minlength="6">
									</div>
								</div>							
								<div class="col-sm-4 mt-3">
									<div class="form-group bmd-form-group">
										<label for="#senhaMedico" class="bmd-label-floating">Senha</label>
										<input type="password" class="form-control" id="senhaMedico" name="senhaMedico" required="true" minlength="6">
									</div>
								</div>
							</div>						
						</div>
						<div class="modal-footer align-items-center text-center">
							<button type="button" class="btn btn-secondary">Cancelar</button>
							<button type="submit" class="btn btn-primary">Inserir</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php $this->loadView('frame/footer'); ?>

<script>
	inserirMedico('#form_cadastroMedico');

	function inserirMedico(id)
	{	
		$(id).validate({
			highlight: function(element)
			{
				$(element).closest('.form-group').removeClass('has-success').addClass('has-danger');
				$(element).closest('.form-check').removeClass('has-success').addClass('has-danger');
			},
			success: function(element)
			{
				$(element).closest('.form-group').removeClass('has-danger').addClass('has-success');
				$(element).closest('.form-check').removeClass('has-danger').addClass('has-success');
			},
			errorPlacement: function(error, element)
			{
				$(element).closest('.form-group').append(error);
			},
			submitHandler: function(form)
			{
				$("#loader").show();
				var data = new FormData(form);
				var url = $(form).attr('action');

				$.ajax({
					url:url,      
					type:"post",        
					data: data,
					processData: false,
            		cache: false,
            		contentType: false,
					dataType: "json",
					success: function(result)
					{
						$("#loader").hide();
						md.showNotification('top','right', result.text, result.type);
						md.resetForm(form);	
					}
				});
			}
		});
	}
</script>