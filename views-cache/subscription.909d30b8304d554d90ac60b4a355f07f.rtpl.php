<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
      <div class="row">
        <div class="col">
        </div>
      </div>
      <div class="row">
        <div class="col"></div>
        <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 border rounded bg-white my-4 mx-4">
          <div class="text-center"><img src="res/img/logo.png" class="img-fluid mt-3"></div>
          <div class="text-center">
            <h2 class="my-3">Se registre no evento</h2>
          </div>
          <form class="px-2" data-js="form" method="POST" action="/eventos/subscription">
            <div class="form-group">
              <label for="nome">Nome: </label>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" data-js="input">
            </div>
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" data-js="input">
            </div>
            <div class="form-group">
              <label class="evento">Evento: </label>
              <select class="custom-select" name="cod_evento">
                <option>Escolha o evento</option>
                <?php $counter1=-1;  if( isset($events) && ( is_array($events) || $events instanceof Traversable ) && sizeof($events) ) foreach( $events as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["cod_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao_evento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>

              </select>
            </div>
            <br>
            <div class="text-center">
              <input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-success btn-block">
            </div>
            <br>
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <div class="modal fade" id="modal-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-success" id="exampleModalLongTitle">Sucesso!</h5>
          </div>
          <div class="modal-body">
            Cadastrado no evento com sucesso!
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
            Desculpe, houve um problema ao cadastrar! Tente novamente mais tarde!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modal-warning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-warning" id="exampleModalLongTitle">Erro!</h5>
          </div>
          <div class="modal-body">
            Desculpe, já existe um usuário cadastrado com esse email nesse evento!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>    