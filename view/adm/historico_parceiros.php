
<!DOCTYPE html>
<html lang="pt">
<head>

    <title>Naeco - Administrador</title>
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
    <h4 class="sidebar-text">Olá!</h4>

    <a href="view/adm/index.php"><i class="fa fa-home fa-xs"></i> Home</a>
    <a href="?classe=Adm&acao=cadastro"><i class="fa fa-plus fa-xs"></i> Adicionar</a>
    <a href="view/adm/configuracoes.php"><i class="fa fa-cogs fa-xs"></i> Configurações</a>
    <a href="?classe=Adm&acao=rel_usuarios"><i class="fa fa-users fa-xs"></i> Usuários</a>
    <a href="?classe=Adm&acao=rel_parceiros"><i class="fa fa-heart fa-xs"></i> Parceiros</a>
    <a href="?classe=Adm&acao=logout"><i class="fa fa-power-off fa-xs"></i> Logout</a>
</div>

<center>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light">
        <span class="btn-sidebar" style="margin-left: 10px;" onclick="openNav()">&#9776;</span>
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php" style="margin-left: 50px;">Naeco</a>
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
</center>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <h2 style="margin-top: 50px;">Histórico de Parceiros</h2>
            <h4 style="font-family: Quicksand, sans-serif">Todos os parceiros cadastrados na base de dados</h4>
        </div>
        <div class="col-md-7 text-center">

            <table class="table" style="width:100%; margin-top: 50px;">
        
                <thead class="thead" style="background-color: #57bf46; color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nome Fantasia</th>
                        <th>Razão Social</th>
                        <th>CNPJ</th>
                        <th>Email</th>

                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach($parceiros as $parceiro){ ?>
                        <tr>
                            <td><?=$parceiro->id_parceiro;?></td>
                            <td><?=$parceiro->nome_fantasia_parceiro;?></td>
                            <td><?=$parceiro->razao_social_parceiro;?></td>
                            <td><?=$parceiro->cnpj_parceiro;?></td>
                            <td><?=$parceiro->email_parceiro;?></td>

                        </tr>
                <?php } ?>

                </tbody>

            </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

<br>
<br>
<br>
<br>
<br>

<?php include 'inc/footer_sistema.php'; ?>