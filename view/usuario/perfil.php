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
  <link rel="stylesheet" type="text/css" href="../../css/style.css">


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

<br>
<br>
<br>
<br>

<div style="margin-left: 1115px;">
                    <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#encerrar_conta"><i class="fa fa-times fa-xs"></i> Encerrar conta</button>
		            </div>
                <br><br><br><br>

<!-- Modal -->
<div class="modal fade" id="encerrar_conta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Encerrar conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        Realmente deseja encerrar sua conta? Assim todo seus dados serão exluídos do sistema.
      </div>
      <form method="POST" action="?classe=Usuario&acao=delete">
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

                <h1 style="color: #57bf46;">Minha conta</h1>
                <p class="lead">Se precisa alterar algo no seu cadastro, esse é o lugar.</p>
                <br><hr>
                <h4 style="color: #57bf46; margin-left: 10px;">Mudar a senha</h4>
                <form method="POST" action="?classe=Usuario&acao=updatesenha">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Antiga senha</label>
                        <input name="antiga" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">Nova senha</label>
                        <input name="nova_senha" type="password" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Digite de novo a nova senha</label>
                        <input name="confirmacao" type="password" class="form-control">
                      </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-light"><i class="fa fa-save"></i> Salvar</button>
                  </div>
                </form>
                <br><br><hr>
                
                <h4 class="mt-5" style="color: #57bf46;">Detalhes pessoais</h4>

                <form method="POST" action="?classe=Usuario&acao=updatedados">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <label for="firstname">Nome</label>
                          <input id="firstname" type="text" class="form-control" name="nome" value="<?=$dados->nome_usuario?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lastname">CPF</label>
                          <input id="cpf" type="number" class="form-control" name="cpf" value="<?=$dados->cpf_usuario?>"  >
                        </div>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="company">Cep</label>
                          <input id="company" type="number" class="form-control" name="cep" value="<?=$dados->cep_usuario?>"   >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="street">Cidade</label>
                          <input id="cidade" type="text" class="form-control" name="cidade" value="<?=$dados->cidade_usuario?>"   >
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="numero">Bairro</label>
                          <input id="bairro" type="text" class="form-control" name="bairro" value="<?=$dados->bairro_usuario?>"  >
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <label for="uf">UF</label>
                          <input id="uf" type="text" class="form-control" name="uf" value="<?=$dados->uf_usuario?>"  >
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">E-mail</label>
                          <input id="email" type="email" class="form-control" name="email" value="<?=$dados->email_usuario?>" >
                        </div>
                      </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-light"><i class="fa fa-save"></i>  Salvar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </center>

        <br>
        <br>
        <br>
        <br>


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
              <a class="nav-link" href="?classe=Usuario&acao=logout">Logout</a>
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
