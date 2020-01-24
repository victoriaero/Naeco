<!DOCTYPE html>
<html lang="pt">
<head>

  <title>Naeco</title>
    <link rel="icon" href="imagens/logo.png">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/icons/">
    
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h4 class="sidebar-text">Bem vind@!</h4>
 
 <a href="?classe=Usuario&acao=perfil"><i class="fa fa-user fa-xs"></i> Meu perfil</a>
  <a href="?classe=Usuario&acao=usuario_saldo"><i class="fa fa-check-circle fa-xs"></i> Pontuação</h4></a>
    <a href="view/usuario/historico.php"><i class="fa fa-list fa-xs"></i> Histórico</a>
  <a href="view/usuario/codigo.php"><i class="fa fa-plus fa-xs"></i> Inserir Código</a>
  <a href="view/usuario/suporte.php"><i class="fa fa-question fa-xs"></i> Suporte</a>
  <a href="?classe=Usuario&acao=logout"><i class="fa fa-power-off fa-xs"></i> Logout</a>
</div>

<nav id="navbar" class="navbar navbar-expand-lg navbar-light">
  <span class="btn-sidebar" style="margin-left: 10px;" onclick="openNav()">&#9776;</span>
  <div class="navbar-header">
    <a class="navbar-brand" href="view/usuario/index.php" style="margin-left: 50px;">Naeco</a>
  </div>
</nav>

<script>

function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}

</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
        <h2 style="margin-bottom: 50px; margin-top: 50px;">Histórico de Créditos</h4>
        </div>
        <div class="col-md-7 text-center">

            <table class="table" style="width:100%; margin-top: 50px; margin-bottom: 200px;">
        
                <thead class="thead" style="background-color: #57bf46; color: white;">
                    <tr>
                        <th>Código</th>
                        <th>Ponto de Coleta</th>
                        <th>Material</th>
                        <th>Quantidade</th>
                        <th>Valor Creditado</th>
                        <th>Data</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($creditos as $credito){ ?>
                        <tr>
                            <td><?=$credito->codigo?></td>
                            <td><?=$credito->descricao_ponto_coleta?></td>
                            <td><?=$credito->material?></td>
                            <td><?=$credito->quantidade_material?></td>
                            <td><?=$credito->valor_credito?></td>
                            <td><?=$credito->data_credito?></td>

                        </tr>
                    <?php } ?>

                </tbody>

            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>




<?php include 'inc/footer_sistema.php'; ?>