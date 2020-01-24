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

<br><br><br><br>



<center>
    <div class="col-lg-9">
        <div class="box">

            <h3 style="color: #57bf46;">Adicionar outro usuário ADM</h3>
            <br>
            <form name="cadastro_adm" class="form-group cadastro" method="POST" action="?classe=Adm&acao=cadastro">

                <div class="col-md-6" style="margin-left: 10px;">
                <input type="text" name="nome" placeholder="Nome" class="form-control box shadow-sm" required>
                </div>
                <div class="col-md-6" style="margin-left: 10px;">
                <input type="email" name="email" placeholder="E-mail" class="form-control box shadow-sm" required>
                </div>
                <div class="col-md-6" style="margin-left: 10px;">
                <input type="text" name="cargo" placeholder="Cargo" class="form-control box shadow-sm" required>
                </div>
                <div class="col-md-6" style="margin-left: 10px;">
                <input type="number" name="cpf" placeholder="CPF" class="form-control box shadow-sm" required>
                </div>
                <div class="col-md-6" style="margin-left: 10px;">
                <input type="password" name="senha" placeholder="Senha" class="form-control box shadow-sm" required><br>
                </div>
                <div class="col-md-6" style="margin-left: 10px;">
                <input type="password" name="confirmar_senha" placeholder="Confirme a Senha" class="form-control box shadow-sm" required><br>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-light"><i class="fa fa-save"></i> Adicionar</button>
                </div>
            </form>

            
</center>

