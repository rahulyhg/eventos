<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container">
	<div class="row">
		<div class="col border rounded bg-white my-3 mx-3 px-4 py-4">
			<div class="text-center">
				<h2 class="my-3 mx-3">Altere informações do seu evento</h2>
			</div>
			<hr>
			<form data-js="form" method="POST" action="/eventos/admin/create-event">
				<div class="form-group">
					<label for="nome-evento">Nome do evento: </label>
					<input type="text" name="nome-evento" id="nome-evento" class="form-control" placeholder="Nome do evento" data-js="input">
				</div>
				<div class="form-group">
					<label for="data-realizacao">Data de realização: </label>
					<input type="date" name="data-realizacao" id="data-realizacao" class="form-control" placeholder="Data de realização" data-js="input">
				</div>
				<div class="form-group">
					<label for="horario">Horário: </label>
					<input type="time" name="horario" id="horario" class="form-control" placeholder="Horário" data-js="input">
				</div>
				<div class="form-group">
					<label for="endereco">Endereço: </label>
					<select class="form-control" data-js="input" name="endereco" id="endereco">
						<option value="">Selecione o endereço</option>
						<?php $counter1=-1;  if( isset($address) && ( is_array($address) || $address instanceof Traversable ) && sizeof($address) ) foreach( $address as $key1 => $value1 ){ $counter1++; ?>
							<option value="<?php echo htmlspecialchars( $value1["cod_endereco"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"> N° <?php echo htmlspecialchars( $value1["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, R. <?php echo htmlspecialchars( $value1["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, B. <?php echo htmlspecialchars( $value1["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $value1["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
						<?php } ?>
					</select>
				</div>				
				<br>
				<br>
				<div class="text-center"><input type="submit" name="cadastrar" value="Cadastrar Evento" class="btn btn-success"></div>
			</form>
		</div>
	</div>
</div>