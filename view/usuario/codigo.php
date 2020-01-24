<!DOCTYPE html>
<html>
<head>
	<title>Naeco - Inserir Código</title>
    <link rel="icon" href="../../imagens/logo.png">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>
<body>

<nav class="navbar" style="background-color: #f9f9f9;">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">NaEco</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item"><a class="nav-link" href="index.php">Voltar para a Home</a></li>
    </ul>
</nav>

<div class="container-fluid bg_cadastro">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<h2 style="margin-top: 50px;">Insira o código gerado</h2>
			<h4 style="font-family: Quicksand, sans-serif">Ao clicar em enviar, seu código será convertido em pontuações para serem trocadas por serviços de empresas parceiras. Bom proveito!</h4>
			<form class="form-group codigo" method="POST" action="../../?classe=Usuario&acao=validar_codigo">
				<p class="lbl_cadastro text-justify">Código</p>
				<input type="text" name="codigo" placeholder="Código" class="form-control box shadow-sm" required><br><br>
				<button class="btn btn-light shadow" type="submit" style="margin-bottom: 50px;">Enviar</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php include '../../inc/footer_sistema.php'; ?>