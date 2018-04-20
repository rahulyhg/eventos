<?php if(!class_exists('Rain\Tpl')){exit;}?><nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">Admin</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/eventos/admin/register-address">Cadastrar Endereço</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eventos/admin/create-event">Criar eventos</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="/eventos/admin/events-list">Lista de eventos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/eventos/logout-admin">Sair</a>
      </li>                        
    </ul>
  </div>
</nav>