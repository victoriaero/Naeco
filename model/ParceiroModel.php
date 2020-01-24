<?php

class ParceiroModel{

        private $id_parceiro;
        private $nome_fantasia;
        private $razao_social;
        private $email;
        private $cnpj;
        private $senha;

        private $con;

        public function __construct($id_parceiro=NULL, $nome_fantasia=NULL, $email=NULL, $razao_social=NULL, $cnpj=NULL, $senha=NULL)
        {
            $this->id_parceiro = $id_parceiro;
            $this->nome_fantasia = $nome_fantasia;
            $this->razao_social = $razao_social;
            $this->email = $email;
            $this->cnpj = $cnpj;
            $this->senha = $senha;

            $this->con = new PDO(SERVIDOR, USUARIO, SENHA);

        }

        public function cadastro(){

            unset($_SESSION['parceiro']);

            $this->cnpj = str_replace('/', '', $this->cnpj);
            $this->cnpj = str_replace('.', '', $this->cnpj);
            $this->cnpj = str_replace('-', '', $this->cnpj);

            $sql = $this->con->prepare("SELECT * FROM parceiro WHERE cnpj_parceiro = ?");
            $sql->execute([$this->cnpj]);
            $row = $sql->fetchObject();
            
            if ($row) {
    
                echo "CNPJ já cadastrado.";
    
            } else {

                $sql = $this->con->prepare("INSERT INTO parceiro VALUES(NULL, ?, ?, ?, ?, ?)");
                $sql->execute(array($this->nome_fantasia, $this->razao_social, $this->cnpj, $this->email, $this->senha));

                if($sql->errorCode() == "00000")
                {
                    $sql = $this->con->prepare("SELECT * FROM parceiro WHERE cnpj_parceiro = ?");
                    $sql->execute([$this->cnpj]);
                    $row = $sql->fetchObject();

                    if ($row) {

                        $_SESSION['parceiro'] = $row;

                        header("Location: view/parceiro/");

                    }

                } else {

                    echo "<b>ERRO</b> " . $sql->errorInfo()[2];

                }
                        
            }
            
        }

        public function login($cnpj, $senha){    

            unset($_SESSION['parceiro']);

            $cnpj = str_replace('.', '', $cnpj);
            $cnpj = str_replace('-', '', $cnpj);
            $cnpj = str_replace('/', '', $cnpj);

            // var_dump($cnpj);

            $sql = $this->con->prepare("SELECT * FROM parceiro WHERE cnpj_parceiro = ?");
            $sql->execute([$cnpj]);
            $row = $sql->fetchObject();

            if ($row) {
            
                if (($senha) == $row->senha_parceiro) {
                
                    $_SESSION['parceiro'] = $row;
                     
                    header("Location:../view/parceiro/");
                    
                } else {
                    echo "Senha inválida.";
                }
            } else {
                echo "Parceiro não encontrado.";
            }

        }



            public function logout()
        {
            echo "Sessão encerrada.";
            unset($_SESSION['parceiro']);
        }

            public function relatorio_clientes($data_inicio, $data_fim){
            $sql = $this->con->prepare("SELECT 
                                            usu.nome_usuario,
                                            usu.cpf_usuario,
                                            deb.valor_debito,
                                            deb.data_debito
                                            FROM debito as deb
                                            JOIN saldo sld
                                            ON deb.id_saldo = sld.id_saldo
                                            JOIN usuario usu ON usu.id_usuario = sld.id_usuario
                                            WHERE deb.data_debito between ? and ?");
                                $sql->execute(array($data_inicio, $data_fim));

                                if($sql->errorCode() == "00000")
                                {
                                return $sql->fetchAll(PDO::FETCH_CLASS);

                                } else{
                                echo $sql->errorInfo()[2];
                                }
            }
        
        
        public function busca_cpf($cpf){

          unset($_SESSION['saldo_para_desconto']);

                $sql = $this->con->prepare("SELECT
                                            sld.id_saldo,
                                            usr.id_usuario,
                                            usr.nome_usuario,
                                            sld.valor_saldo
                                            FROM usuario AS usr
                                            JOIN saldo sld
                                            ON sld.id_usuario = usr.id_usuario
                                            WHERE usr.cpf_usuario = ?
                                            ");
        
                $sql->execute([$cpf]);
                $row = $sql->fetchObject();
        
                if ($row) {

                    require_once 'view/parceiro/dados_cpf.php';
                    echo 
                    '<!DOCTYPE html>
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

                    <br>
                    <br>
                    <br>
                    <br>

                    <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-4 text-center">
                        <form class="form-group cadastro" method="POST" action="?classe=Parceiro&acao=desconta_saldo">
                            <h2 class="card-title" style="margin-top: 30px;">Descontar Saldo</h2><br>
                            <p class="lbl_cadastro">Valor a ser descontado: </p>
                            <input class="form-control box shadow-sm" type="number" value="" name="valor_desconto" required>
                            <button class="btn btn-light shadow" type="submit">Descontar</button>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5 text-center">
                        <div class="card card-saldo shadow" style="background-color: #4c9141">
                            <div class="card-body">
                                <h2 class="card-title" style="color: white; margin-top: 30px;">Dados do cliente</h2>
                                <p class="text" style="color: white;">Nome: </p>
                                <input class="form-control saldo-box shadow" type="text" disabled name="nome_usuario" value=" ' .$row->nome_usuario .'"><br><br>
                                <p class="text" style="color: white;">Pontuação Atual: </p>
                                <input class="form-control saldo-box shadow" type="text" disabled name="pontuacao" value=" ' .$row->valor_saldo .'">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    </div>
                
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
                                    <a class="nav-link" href="view/termos.php">Termos de Uso</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" href="view/privacidade.php">Política de Privacidade</a>
                                    </li>
                                </ul>
                                </nav>
                            </div>
                            <div class="col-md-6 footer-sm">
                                <a href="https://www.instagram.com/projeto_naeco/"><i class="fab fa-instagram fab-social"></i>
                                <a href="https://pt-br.facebook.com/"><i class="fab fa-facebook-f fab-social"></i></a>
                                <a href="https://www.linkedin.com/feed/"><i class="fab fa-linkedin fab-social"></i></a>
                                <a href="https://www.youtube.com/channel/UCsXAnNGYtxbXz7rPTSCJTNw"><i class="fab fa-youtube fab-social"></i></a>
                            </div>
                            </div>
                        </footer>
                        </div>
                        </html>
                        ';

                        $_SESSION['saldo_para_desconto'] = $row;
        
                } else {
        
                    echo "CPF não cadastrado.";
    
                }
        
            }

        
        public function desconta_saldo($valor_desconto){

            //   $saldo_dados = $_SESSION['saldo_para_desconto'];
            //   var_dump($saldo_dados);

              $id_saldo_p_desc = $_SESSION['saldo_para_desconto']->id_saldo;

              $valor_saldo_p_desc = $_SESSION['saldo_para_desconto']->valor_saldo;
              
              if ($valor_saldo_p_desc < $valor_desconto) {

                  echo "Saldo do cliente é menor do que valor a ser descontado.";

              } else {
                  
                  $saldo_atualizado = ($valor_saldo_p_desc - $valor_desconto);

                  $sql = $this->con->prepare("UPDATE saldo SET valor_saldo = ? WHERE id_saldo = ?");
                  $sql->execute(array($saldo_atualizado, $id_saldo_p_desc));

                  $sql = $this->con->prepare("INSERT INTO debito VALUES(NULL, ?, ?, ?, CURRENT_TIMESTAMP)");
                  $sql->execute(array($id_saldo_p_desc, $_SESSION['parceiro']->id_parceiro, $valor_desconto));

                  require_once 'view/parceiro/dados_cpf.php';
                  echo '

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
                      <div class="row" style="margin-bottom: 100px;">
                          <div class="col-md-4"></div>
                          <div class="col-md-4 text-center">
                              <h2>Saldo descontado com sucesso</h2><h4>O saldo atual agora é: ' .$saldo_atualizado .'</h4>
                              <a class="btn btn-light shadow" href="view/parceiro/busca_cpf.php">Voltar para Busca CPF</a>
                          </div>
                          <div class="col-md-4"></div>
                      </div>
                  </div>

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
                                  <a class="nav-link" href="view/termos.php">Termos de Uso</a>
                                  </li>
                                  <li class="nav-item">
                                  <a class="nav-link" href="view/privacidade.php">Política de Privacidade</a>
                                  </li>
                              </ul>
                              </nav>
                          </div>
                          <div class="col-md-6 footer-sm">
                              <a href="https://www.instagram.com/projeto_naeco/"><i class="fab fa-instagram fab-social"></i>
                              <a href="https://pt-br.facebook.com/"><i class="fab fa-facebook-f fab-social"></i></a>
                              <a href="https://www.linkedin.com/feed/"><i class="fab fa-linkedin fab-social"></i></a>
                              <a href="https://www.youtube.com/channel/UCsXAnNGYtxbXz7rPTSCJTNw"><i class="fab fa-youtube fab-social"></i></a>
                          </div>
                          </div>
                      </footer>
                      </div>
                      </html>
                  ';

                  unset($_SESSION['saldo_para_desconto']);

              }
            }





            public function parceiro_delete(){

        $sql = $this->con->prepare("DELETE FROM parceiro WHERE id_parceiro = ?");
        $sql->execute([$_SESSION['parceiro']->id_parceiro]);

        header("location: index.php");
        
    }

        

     public function updatesenha($antiga_senha, $nova_senha){

      $sql = $this->con->prepare("SELECT * FROM parceiro WHERE id_parceiro = ?");
      $sql->execute([$_SESSION['parceiro']->id_parceiro]);
      $row = $sql->fetchObject();

      // var_dump($_SESSION['usuario']);

      if ($row) {

          if ($antiga_senha == $row->senha_parceiro) {

          $sql = $this->con->prepare("UPDATE parceiro SET senha_parceiro = ? WHERE id_parceiro = ?");
          $sql->execute([$nova_senha, $_SESSION['parceiro']->id_parceiro]);

          header("location: ?classe=Parceiro&acao=perfil");

          } else {

              echo "A senha antiga não está correta!";
          }

      } else {

          echo "Erro ao receber informações!";
      }

require_once 'view/parceiro/perfil.php';
      
  }


  public function perfil(){

      return $_SESSION['parceiro'];
  }

  public function updatedados($nome_fantasia, $razao_social, $cnpj, $email){

      // var_dump($nome_fantasia);

      $sql = $this->con->prepare("UPDATE parceiro SET
                                      nome_fantasia_parceiro = ?,
                                      razao_social_parceiro = ?,
                                      cnpj_parceiro = ?,
                                      email_parceiro = ?
                                  WHERE id_parceiro = ?
                                  ");
      $sql->execute([$nome_fantasia, $razao_social, $cnpj, $email, $_SESSION['parceiro']->id_parceiro]);

      $sql = $this->con->prepare("SELECT * FROM parceiro WHERE id_parceiro = ?");
      $sql->execute([$_SESSION['parceiro']->id_parceiro]);
      $row = $sql->fetchObject();

      unset($_SESSION['parceiro']);
      $_SESSION['parceiro'] = $row;
      
      // var_dump($_SESSION['parceiro']);

      header('location: ?classe=Parceiro&acao=perfil');
  }
        
        
        
        // GETTERS e SETTERS

        /**
         * Get the value of idParceiro
         */ 
        public function getId_parceiro()
        {
                return $this->idParceiro;
        }

        /**
         * Set the value of idParceiro
         *
         * @return  self
         */ 
        public function setId_parceiro($idParceiro)
        {
                $this->idParceiro = $idParceiro;

                return $this;
        }

        /**
         * Get the value of nome_fantasia
         */ 
        public function getNome_fantasia()
        {
                return $this->nome_fantasia;
        }

        /**
         * Set the value of nome_fantasia
         *
         * @return  self
         */ 
        public function setNome_fantasia($nome_fantasia)
        {
                $this->nome_fantasia = $nome_fantasia;

                return $this;
        }

        /**
         * Get the value of razao_social
         */ 
        public function getRazao_social()
        {
                return $this->razao_social;
        }

        /**
         * Set the value of razao_social
         *
         * @return  self
         */ 
        public function setRazao_social($razao_social)
        {
                $this->razao_social = $razao_social;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of cnpj
         */ 
        public function getCnpj()
        {
                return $this->cnpj;
        }

        /**
         * Set the value of cnpj
         *
         * @return  self
         */ 
        public function setCnpj($cnpj)
        {
                $this->cnpj = $cnpj;

                return $this;
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
                $this->senha = $senha;

                return $this;
        }
}



?>