<?php if(!class_exists('Rain\Tpl')){exit;}?>    <div class="container">
      <div class="row">
        <div class="col"></div>
      </div>
      <div class="row">
        <div class="col"></div>
        <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 border rounded bg-white my-4 mx-4">
          <div class="text-center"><img src="res/img/logo.png" class="img-fluid mt-3"></div>
          <div class="text-center">
            <h2 class="my-3">Faça login</h2>
            <h4>Administrador</h4>
          </div>
          <form class="px-2" method="POST" action="/eventos/login-admin" data-js="form">
            <div class="form-group">
              <label for="email">Email: </label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" data-js="input">
            </div>
            <div class="form-group">
              <label for="senha">Senha: </label>
              <input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" data-js="input">
            </div>
            <a href="/eventos/create-admin">Criar login</a>
            <br>
            <a href="#">Esquesci minha senha</a>
            <br><br>
            <div class="text-center">
              <input type="submit" name="cadastrar" value="Logar" class="btn btn-success btn-block">
            </div>
            <br>
          </form>
        </div>
        <div class="col"></div>
      </div>
    </div>

    <div class="modal fade" id="modal-erro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLongTitle">Erro!</h5>
          </div>
          <div class="modal-body">
            Email ou senha incorreto(a)! Tente novamente!
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
            <h5 class="modal-title text-warning" id="exampleModalLongTitle">Aviso!</h5>
          </div>
          <div class="modal-body">
            Informe o seu email de administrador!
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Ok</button>
          </div>
        </div>
      </div>
    </div>         