<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid">
	<div class="row">
		<div class="col border rounded bg-white my-3 mx-3 px-4 py-4">
			<div class="text-center"><h2>Lista de eventos</h2></div>
			<br>
			<div class="list-group list-group-flush">
				<?php $counter1=-1;  if( isset($events) && ( is_array($events) || $events instanceof Traversable ) && sizeof($events) ) foreach( $events as $key1 => $value1 ){ $counter1++; ?>

					<a href="/eventos/admin/event/<?php echo htmlspecialchars( $value1["cod_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="list-group-item list-group-item-action"><?php echo htmlspecialchars( $value1["descricao_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></a>
				<?php } ?>

			</div>				
		</div>
	</div>
</div>