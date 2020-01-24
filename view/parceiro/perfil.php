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
  <a href="view/paceiro/relatorio_clientes.php"><i class="fa fa-list fa-xs"></i> Relatórios</a>
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

<br><br><br><br>

					<div style="margin-left: 1115px;">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#encerrar_conta"><i class="fa fa-times fa-xs"></i> Encerrar a parceria</button>
		            </div>
                <br><br><br><br>

<!-- Modal -->
<div class="modal fade" id="encerrar_conta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Encerrar a parceria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        Realmente deseja encerrar sua parceria? Assim todo seus dados serão exluídos do sistema.
      </div>
      <form method="POST" action="?classe=Parceiro&acao=delete">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Vou pensar melhor</button>
        <button type="submit" class="btn btn-danger">Quero encerrar a parceria</button>
      </div>
      </form>
    </div>
  </div>
</div>


<center>
<div class="col-lg-9">
              <div class="box">

                <h1 style="color: #57bf46;">Alterações</h1>
                <p class="lead">Se precisa alterar algo no seu cadastro, esse é o lugar.</p>
                <br><hr>

                <h4 class="mt-5" style="color: #57bf46;">Detalhes da empresa</h4>
                <form method="POST" action="?classe=Parceiro&acao=updatedados">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Nome Fantasia</label>
                          <input id="nome_fantasia" type="text" class="form-control" name="nome_fantasia" value="<?=$dados->nome_fantasia_parceiro?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">Razão Social</label>
                          <input id="razao_social" type="text" class="form-control" name="razao_social" value="<?=$dados->razao_social_parceiro?>"  >
                        </div>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="company">CNPJ</label>
                          <input id="cnpj" type="number" class="form-control" name="cnpj" value="<?=$dados->cnpj_parceiro?>"   >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="street">Email</label>
                          <input id="email" type="text" class="form-control" name="email" value="<?=$dados->email_parceiro?>"   >
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-light"><i class="fa fa-save"></i>  Salvar</button>
                    </div>
                  
                </form>

                <br><br><br><hr>
                <h4 style="color: #57bf46; margin-left: 10px;">Mudar a senha</h4>
                <form method="POST" action="?classe=Parceiro&acao=updatesenha">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Antiga senha</label>
                        <input id="antiga" name="antiga" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">Nova senha</label>
                        <input id="nova_senha" name="nova_senha" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Digite de novo a nova senha</label>
                        <input id="confirmacao" name="confirmacao" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-light"><i class="fa fa-save"></i> Salvar</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
        </center>

        <br><br><br><br>
        
        <div class="footer">
  <footer class="container-fluid">
    <div class="row">
      <div class="col-md-6 footer-brand">
        <h2>NaEco</h2><br>
        <p><i class="fas fa-map-marker-alt"></i> Belo Horizonte, MG</p>
        <p>&copy Projeto NaEco</p>
      </div>
      <div class="col-md-6 footer-nav">
        <nav class="navbar navbar-light">
          <ul class="navbar-nav">
          </ul>
        </nav>
      </div>
      <div class="col-md-12"><hr></div>
      <div class="col-md-6 footer-nav">
        <nav class="navbar navbar-light navbar-expand">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="?classe=Parceiro&acao=logout">Logout</a>
            </li>
            
          </ul>
        </nav>
      </div>
      <div class="col-md-6 footer-sm">
         <a href="https://www.instagram.com/projeto_naeco/" target="window"><i class="fab fa-instagram fab-social"></i>
        <a href="https://www.facebook.com/NaEco-2179504432361553/" target="window"><i class="fab fa-facebook-f fab-social"></i></a>
        <a href="https://www.linkedin.com/company/26214077" target="window"><i class="fab fa-linkedin fab-social"></i></a>
        <a href="https://www.youtube.com/channel/UCsXAnNGYtxbXz7rPTSCJTNw" target="window"><i class="fab fa-youtube fab-social"></i></a>
      </div>
    </div>
  </footer>
</div>
</html>
