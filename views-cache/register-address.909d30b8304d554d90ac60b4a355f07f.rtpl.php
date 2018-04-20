<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col border rounded bg-white my-3 mx-3 px-4 py-4">
			<div class="text-center">
				<h2>Cadastre um novo endereço</h2>
			</div>
			<hr>
			<form data-js="form" method="POST" action="/eventos/admin/register-address">
				<div class="row">
					<div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<label for="numero">Número: </label>
						<input type="number" name="numero" id="numero" class="form-control" placeholder="Número" data-js="input">
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<label for="rua">Rua: </label>
						<input type="text" name="rua" id="rua" class="form-control" placeholder="Rua" data-js="input">
					</div>
				</div>
				<div class="row">
					<div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<label for="bairro">Bairro: </label>
						<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro" data-js="input">
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6">
						<label for="cidade">Cidade: </label>
						<input type="text" name="cidade" id="cidade" class="form-control" placeholder="Cidade" data-js="input">
					</div>										
				</div>
				<div class="row">
					<div class="form-group col-sm-12 col-md-12 col-lg-4 col-xl-4">
						<label for="estado">Estado: </label>
						<input type="text" name="estado" id="estado" class="form-control" placeholder="Estado" data-js="input">
					</div>
					<div class="form-group col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<label for="pais">País: </label>
						<input type="text" name="pais" id="pais" class="form-control" placeholder="País" data-js="input">
					</div>
				</div>
				<div class="text-center">
					<input type="submit" name="Cadastrar" class="btn btn-success" value="Cadastrar">
				</div>				
			</form>
		</div>
	</div>
</div>

    <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLongTitle">Sucesso!</h5>
          </div>
          <div class="modal-body">
            Endereço cadastrado com sucesso!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modal-erro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLongTitle">Erro!</h5>
          </div>
          <div class="modal-body">
            Desculpe, tivemos um problema ao cadastrar o endereço! Tente novamente mais tarde!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>      
</div>