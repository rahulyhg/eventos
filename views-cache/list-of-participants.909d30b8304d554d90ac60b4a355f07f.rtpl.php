<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row bg-white border rounded my-3 mx-3 px-4 py-4">
		<div class="col">
			<div class="text-center"><h2>Lista de participantes</h2></div>
			<br>
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nome</th>
			      <th scope="col">Email</th>
			      <th scope="col">Ação</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $counter1=-1;  if( isset($listParticipants) && ( is_array($listParticipants) || $listParticipants instanceof Traversable ) && sizeof($listParticipants) ) foreach( $listParticipants as $key1 => $value1 ){ $counter1++; ?>

				    <tr>
				      <th scope="row"><?php echo htmlspecialchars( $value1["cod_participante"], ENT_COMPAT, 'UTF-8', FALSE ); ?></th>
				      <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				      <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
				      <td><button class="btn btn-success btn-sm">Liberar Certificado</button></td>
				    </tr>			  	
			  	<?php } ?>

			  </tbody>
			</table>			
		</div>
	</div>
</div>