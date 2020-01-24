<!DOCTYPE html>
<html lang="pt">
<head>
                            
    <title>Naeco - Parceiro</title>
    <link rel="icon" href="imagens/logo.png">
                            
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
                            
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                            
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
                            
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
                            
    <link rel="stylesheet" type="text/css" href="css/style.css">
                            
                            
    <link rel="stylesheet" type="text/css" href="css/style.css">
                            
</head>                            
<body>                        
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h3 class="sidebar-text">Bem vind@!</h3>
        <br><br>
                            
        <a href="?classe=Parceiro&acao=perfil"><i class="fa fa-user fa-xs"></i> Meu perfil</a>
        <a href="view/parceiro/busca_cpf.php"><i class="fa fa-address-card fa-xs"></i> Buscar CPF</a>
        <a href="view/parceiro/suporte.php"><i class="fa fa-question-circle fa-xs"></i> Suporte</a>
        <a href="view/parceiro/relatorios.php"><i class="fa fa-list fa-xs"></i> Relatórios</a>
        <a href="?classe=Parceiro&acao=logout"><i class="fa fa-power-off fa-xs"></i> Logout</a>
        <hr>
        <h6 style="" class="sidebar-text"> A NaEco fica muito feliz em te ter como parceiro!</h6>
        </div>
                            
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <h2 style="margin-top: 50px;">Histórico de Débitos</h2>
            <h4 style="font-family: Quicksand, sans-serif">Pelo intervalo de datas selecionado</h4>
        </div>
        <div class="col-md-7 text-center">

            <table class="table" style="width:100%; margin-top: 50px;">
        
                <thead class="thead" style="background-color: #57bf46; color: white;">
                    <tr>
                        <th>Cliente</th>
                        <th>CPF</th>
                        <th>Valor Descontado</th>
                        <th>Data</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                    foreach($dados as $dado){ ?>
                        <tr>
                            <td><?=$dado->nome_usuario;?></td>
                            <td><?=$dado->cpf_usuario;?></td>
                            <td><?=$dado->valor_debito;?></td>
                            <td><?=$dado->data_debito;?></td>

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