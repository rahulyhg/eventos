<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="bg-white border rounded my-3 mx-3 px-4 py-4">
		<div class="row">
			<div class="col text-center">
				<h2><?php echo htmlspecialchars( $event["descricao_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
			</div>
		</div>
		<br>
		<div class="row">
		  <div class="col-sm-6 mb-3">
		    <div class="card">
		      <div class="card-body">
		        <div class="text-center">
		        	<h5 class="card-title"><strong>Informações do evento</strong></h5>
		        </div>
		        <p class="card-text">
		        	<strong>Código do evento: </strong><?php echo htmlspecialchars( $event["cod_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	<strong>Data do evento: </strong><?php echo htmlspecialchars( $event["data_temp"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

		        </p>
		        <p class="card-text">
		        	<strong>ENDEREÇO: </strong><br>
		        	Rua: <?php echo htmlspecialchars( $event["rua"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	Número: <?php echo htmlspecialchars( $event["numero"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	Bairro: <?php echo htmlspecialchars( $event["bairro"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	Cidade: <?php echo htmlspecialchars( $event["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	Estado: <?php echo htmlspecialchars( $event["estado"], ENT_COMPAT, 'UTF-8', FALSE ); ?><br>
		        	País: <?php echo htmlspecialchars( $event["pais"], ENT_COMPAT, 'UTF-8', FALSE ); ?>

		        </p>
		        <a href="/eventos/admin/alter-event" class="btn btn-primary">Editar informações</a>
		      </div>
		    </div>
		  </div>
		  <div class="col-sm-6 mb-3">
		    <div class="card">
		      <div class="card-body">
		        <h5 class="card-title">Lista de participantes</h5>
		        <p class="card-text">Acesse a lista dos participantes do seu evento, altere informações ou libere certificados.</p>
		        <a href="/eventos/admin/list-of-participants" class="btn btn-primary">Acessar lista</a>
		      </div>
		    </div>
		  </div>
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
              Informações alteradas com sucesso!
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
              Desculpe, houve um problema ao alterar informações! Tente novamente mais tarde!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
            </div>
          </div>
        </div>
      </div>      