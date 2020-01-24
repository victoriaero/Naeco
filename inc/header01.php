<html lang="pt">
<head>
<head>


  <!-- BRAND COLORS
    #4C9141 - verde escuro
    #57A639 - verde claro
    #FDF4E3 - bege
    #57bf46 - verde
	--> 

  <title>NaEco</title>
  <link rel="icon" href="../imagens/icon.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


  <!-- Bootstrap 4 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Fontes -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

  <!-- Link Style CSS -->
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
  
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav id="navbar" class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="../">NaEco</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../">Site</a>
      </li>
       <li class="nav-item">
<div class="dropdown">
  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Cadastre-se
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="../?classe=Usuario&acao=cadastro">Usuário  </a>
      <a class="dropdown-item" href="../?classe=Parceiro&acao=cadastro">Parceiro</a>
  </div>
</div>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">

<div class="dropdown">
  <a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Login
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="../?classe=Usuario&acao=login">Usuário   </a>
      <a class="dropdown-item" href="../?classe=Parceiro&acao=login">Parceiro</a>
      <a class="dropdown-item" href="../?classe=Adm&acao=login">Administrador</a>
  </div>
</div>
      </li>
    </ul>
  </div>
</nav>