<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="author" content="Cristian Krone e Gabriel Langa">
  <meta name="description" content="Sistema Web para Hortas Comunitárias">
  <meta name="keywords" content="hortas comunitarias, bootstrap, javascript">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
  <link href="../css/header.css" rel="stylesheet" type="text/css">

  <title>Cadastro ONG</title>
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
          <li><a class="dropdown-item" href="cadastroAdm.php">Cadastrar Administrador</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Login de Usuários</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="login.php">Login de Produtor</a></li>
          <li><a class="dropdown-item" href="loginong.php">Login da ONG</a></li>
          <li><a class="dropdown-item" href="loginadm.php">Acesso do Administrador</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <div class="card bg-light">
    <article class="card-body mx-auto" style="max-width: 400px;">
      <h4 class="card-title mt-3 text-center">Cadastro de ONGs </h4>
      <p class="text-center">Crie sua conta para ter acesso ao nosso sistema!</p>
      <?php
      include("conexao.php");
      session_start();

      if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
      ?>

      <form method="POST" action="processaONG.php">
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
          </div>
          <input name="razaoSocial" class="form-control" placeholder="Razão Social" type="text" onkeypress="return ApenasLetras(event,this);" required>

        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-id-card"></i> </span>
          </div>
          <input name="cnpj" id="cnpj" class="form-control" placeholder="CNPJ (somente números)" type="text" onkeypress="return ApenasNumeros(event,this);" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
          </div>
          <input name="email" class="form-control" placeholder="E-mail" type="email" required>
        </div>

        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
          </div>
          <input name="telefone" id="telefone" class="form-control" placeholder="Telefone" type="text" onkeypress="return ApenasNumeros(event,this);" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
          </div>
          <input name="celular" id="celular" class="form-control" placeholder="Celular" type="text" onkeypress="return ApenasNumeros(event,this);" required>
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
          <input name="numero" class="form-control" placeholder="Número" type="text" onkeypress="return ApenasNumeros(event,this);" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
          </div>
          <input name="cep" id="cep" class="form-control" placeholder="CEP" type="text" onkeypress="return ApenasNumeros(event,this);" required>
        </div>
        <div class="form-group input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-map-marker-alt"></i> </span>
          </div>
          <input name="cidade" class="form-control" placeholder="Cidade" type="text" onkeypress="return ApenasLetras(event,this);" required>
        </div>
        <div class="form-group input-group">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block"> Criar conta </button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
        <script src="../jss/jquery-3.6.0.min.js"></script>
        <script src="../jss/jquery.maskedinput-1.1.4.pack.js"></script>
        <script src="../jss/tela.js"></script>
</body>

</html>