<!DOCTYPE html>
<html lang="pt">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">

    <title>Naeco - Login Administrador</title>
    <link rel="icon" href="imagens/logo.png">

    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<body>


<nav class="navbar" style="background-color: #f9f9f9;">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Naeco</a>
    </div>
    
</nav>

    

<div class="container-fluid bg_cadastro">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center">
                <h2 style="margin-bottom: 50px;">Login - Administrador</h2>
            </div>
            <form name="cadastro" class="form-group cadastro" method="POST" action="?classe=Adm&acao=login">
                <p class="lbl_cadastro">Nome</p>
                <input type="text" name="nome" placeholder="Nome" class="form-control box shadow-sm" required>
                <p class="lbl_cadastro">Senha</p>
                <input type="password" name="senha" placeholder="Senha" class="form-control box shadow-sm" required><br>
                <div class="col-md-12 text-center">
                    <button class="btn btn-light shadow" type="submit" style="margin-bottom: 100px;">Entrar</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include 'inc/footer_inicio.php'; ?>
