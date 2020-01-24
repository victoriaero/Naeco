<!DOCTYPE html>
<html lang="pt">
<head>
    <title>Naeco - Seja Parceiro!</title>
    <link rel="icon" href="imagens/logo.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


</head>
<body>

<nav class="navbar" style="background-color: #f9f9f9;">
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">NaEco</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
            <a class="nav-link" href="../?classe=Parceiro&acao=login">Já possui cadastro? Acesse a conta</a></li>
    </ul>
</nav>

<div class="container-fluid bg_cadastro">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center">
                <h2>Cadastre sua empresa e seja nosso parceiro!</h2>
                <h4 style="font-family: Quicksand, sans-serif">Insira nos campos abaixo os dados da empresa</h4>
            </div>
            <form name="cadastro" class="form-group cadastro" method="POST" action="index.php?classe=Parceiro&acao=cadastro">
                <p class="lbl_cadastro">Nome Fantasia</p>
                <input type="text" name="nome_fantasia" placeholder="Nome Fantasia" class="form-control box shadow-sm" required>
                <p class="lbl_cadastro">Razão social</p>
                <input type="text" name="razao_social" placeholder="Razão Social" class="form-control box shadow-sm" required>
                <p class="lbl_cadastro">Email</p>
                <input type="email" name="email" placeholder="Email" class="form-control box shadow-sm" required>
                <p class="lbl_cadastro">CNPJ</p>
                <input type="text" id="CNPJ" maxlength="19" name="cnpj" placeholder="CNPJ" class="form-control box shadow-sm" required>

                <script type="text/javascript">

                  $(document).ready(function(){

        var $seuCampoCnpj = $("#CNPJ");      
        $seuCampoCnpj.mask('##.###.###/####-##', {reverse: true});
        
    });
    </script>       
                
                		
                
                <p class="lbl_cadastro">Senha</p>
                <input type="password" name="senha" placeholder="Senha" class="form-control box shadow-sm" required>
                <p class="lbl_cadastro">Confirmar Senha</p>
                <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" class="form-control box shadow-sm" required><br>
                <div class="col-md-12 text-center">
                    <button class="btn btn-light shadow" type="submit">Cadastrar</button>
                    <p class="lbl_nota">Ao clicar em cadastrar, você aceita os <a href="view/termos.php">Termos de Uso</a> e confirma que leu a <a href="view/privacidade.php">Política de Privacidade</a> da Naeco.</p>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include 'inc/footer_inicio.php'; ?>