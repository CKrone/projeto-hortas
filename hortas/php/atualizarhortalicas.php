<?php
require_once("verificalogin.php");
include("conexao.php");

$cod_produtor = filter_input(INPUT_GET, 'cod_produtor', FILTER_SANITIZE_NUMBER_INT);

?>

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

    <title>Atualizar Hortaliças</title>
</head>

<body>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
        <ul id="logo" class="nav">
            <a class="navbar-brand">Informar Hortaliças </a>
        </ul>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../index.html">Página Inicial</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="telaProdutor.php" role="button" aria-expanded="false">Painel Produtor</a>
            </li>
        </ul>
    </nav>
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Atualizar Hortaliças Já Doadas</h4>
        <p class="text-center">Faça a atualização das hortaliças!</p>
        <form method="POST" action="atthortalicas.php">
            <div>
                <h6>Selecione a hortaliça para ser atualizada</h6>
            </div>
            <div class="form-group input-group">
                <input type="hidden" name="cod_produtor" value="<?php echo $_SESSION['cod_produtor'] ?>">

                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-leaf"></i> </span>
                </div>
                <select name="cod_produto">
                    <option>Selecione</option>
                    <?php
                    $consulta = "SELECT * FROM produto where cod_produtor = '$_SESSION[cod_produtor]'";
                    $conecta = mysqli_query($conn, $consulta);
                    while ($row_produto = mysqli_fetch_assoc($conecta)) { ?>
                        <option name="cod_produto" value="<?php echo $row_produto['cod_produto'] ?>"><?php echo $row_produto['nome'] ?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div>
                <h6>Informe a data de colheita do produto</h6>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-calendar-check"></i> </span>
                </div>
                <input name="datacolheita" class="form-control" placeholder="Data da Colheita" type="date" required>
            </div>
            <div>
                <h6>Informe a data de vencimento do produto</h6>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-calendar-times"></i> </span>
                </div>
                <input name="datavencimento" class="form-control" placeholder="Data de Vencimento " type="date" required>
            </div>
            <div>
                <h6>Informe a quantidade de produtos colhidos</h6>
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fas fa-plus"></i> </span>
                </div>
                <input name="quantidade" class="form-control" placeholder="Quantidade" type="text" onkeypress="return ApenasNumeros(event,this);" required>
                <select name="unidade" class="form-select" aria-label="Default select example" required>
                    <option selected value="">Selecione a unidade</option>
                    <option value="KG">KG</option>
                    <option value="Unidades">Unidades</option>
                    <option value="Maço">Maço</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Atualizar Hortaliça</button>
            </div>
        </form>

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="../jss/jquery-3.6.0.min.js"></script>
    <script src="../jss/tela.js"></script>
</body>

</html>