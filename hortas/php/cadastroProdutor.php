<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author" content="Cristian Krone, Gabriel Langa e Letícia Caxoeira">
  <meta name="description" content="Sistema Web para Hortas Comunitárias">
  <meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--Bootstrap 5.1 CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!--jQuery-->
  <script src="../jss/jquery-3.6.0.min.js"></script>
  <!--Arquivos de estilo-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link href="../css/header.css" rel="stylesheet" type="text/css">
  <!--Bootstrap 5.1 JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <title>Cadastro de Produtor</title>
</head>

<body>
  <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <ul id="logo" class="nav">
      <a class="navbar-brand">Hortas Comunitárias</a>
    </ul>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Home</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Cadastro de Usuários</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="cadastroProdutor.php">Cadastrar Produtor</a></li>
          <li><a class="dropdown-item" href="cadastroONG.php">Cadastrar ONG</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Login de Usuários</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="./php/login.php">Login de Produtor</a></li>
          <li><a class="dropdown-item" href="./php/loginong.php">Login da ONG</a></li>
          <li><a class="dropdown-item" href="./php/loginadm.php">Acesso do Administrador</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Cadastro de Produtor </h4>
      <p class="text-center">Crie sua conta para ter acesso ao nosso sistema!</p>
      <?php
      include("conexao.php");
      session_start();

      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

      <form method="POST" action="processa.php">
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input name="nome" class="form-control" placeholder="Nome Completo" type="text" required>

        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
          </div>
          <input name="cpf" class="form-control" placeholder="CPF (somente números)" type="text" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
          </div>
          <input name="email" class="form-control" placeholder="E-mail " type="email" required>
        </div> <!-- form-group// -->
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
          </div>
          <input name="telefone" class="form-control" placeholder="Telefone" type="text" required>
        </div>
        <div class="form-group input-group">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
            </div>
            <input name="celular" class="form-control" placeholder="Celular" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
            </div>
            <input name="senha" class="form-control" minlength="8" placeholder="Crie uma senha" type="password" required>
          </div>
          <div>
            <span>Endereço</span>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
            <input name="rua" class="form-control" placeholder="Rua" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
            <input name="bairro" class="form-control" placeholder="Bairro" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
            <input name="numero" class="form-control" placeholder="Número" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
            <input name="cep" class="form-control" placeholder="CEP" type="text" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
            </div>
            <input name="cidade" class="form-control" placeholder="Cidade" type="text" required>
          </div>
          <div class="form-group input-group">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"> Criar conta </button>
          </div>
      </form>
    </article>

</body>

</html>