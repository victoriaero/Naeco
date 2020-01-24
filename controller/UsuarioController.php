<?php

require_once "model/UsuarioModel.php";

class UsuarioController{



    public function cadastro(){

        $obj = new UsuarioModel();

        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["CPF"]) && isset($_POST["senha"]) && isset($_POST["c_senha"]) && isset($_POST["bairro"]) && isset($_POST["cidade"]) && isset($_POST["uf"]) && isset($_POST["cep"])) {
            //

            if ($_POST['senha'] == $_POST['c_senha']) {

            $obj->setNome($_POST['nome']);
            $obj->setEmail($_POST['email']);
            $obj->setCpf($_POST['CPF']);
            $obj->setSenha($_POST['senha']);
            $obj->setBairro($_POST['bairro']);
            $obj->setCidade($_POST['cidade']);
            $obj->setUf($_POST['uf']);
            $obj->setCep($_POST['cep']);

            $obj->cadastro();

            } else {

                echo "O campo Confirmar Senha deve ser idêntico ao campo senha.";

            }

        } else {

            echo "";

        }

        require_once 'view/cadastro.php';

    }

    public function login(){
         

        if(isset($_POST["email"])){
            $obj =  new UsuarioModel();
            $obj->login($_POST['email'], $_POST['senha']);
            if (isset($_SESSION['usuario']) ){
                header("Location:view/usuario/index.php");
            }else{
                echo "Algo deu errado. Tente novamente mais tarde.";
            }
        }else{

            require_once 'view/login.php';
        }
    }   

    public function logout(){

        $obj = new UsuarioModel();
        $obj->logout();

        header("Location: ./");

    }

    public function usuario_saldo(){

        $obj = new UsuarioModel();
        $obj->usuario_saldo();
        
    }

    public function validar_codigo(){

        $obj = new UsuarioModel();

        if (isset($_POST["codigo"])){

            $obj->setString_codigo($_POST["codigo"]);

            $obj->validar_codigo();

        } else {

            echo "Insira o código a ser cadastrado.";

        }

        require_once 'view/usuario/codigo.php';
        

    }
    
    public function historico_credito(){

        $obj = new UsuarioModel();
        $creditos = $obj->historico_credito();
        require_once 'view/usuario/historico_credito.php';

    }

    public function historico_debito(){

        $obj = new UsuarioModel();
        $debitos = $obj->historico_debito();
        require_once 'view/usuario/historico_debito.php';

    }

    public function delete(){

        $obj = new UsuarioModel();
        $obj->usuario_delete();
        
    }

     public function updatesenha(){

        if (isset($_POST["antiga"]) && isset($_POST["nova_senha"]) && isset($_POST["confirmacao"]) ){
           
            if (($_POST["nova_senha"]) == ($_POST["confirmacao"])) {

                $antiga_senha = $_POST["antiga"];
                $nova_senha = $_POST["nova_senha"];

                $obj = new UsuarioModel();
                $obj->usuario_updatesenha($antiga_senha, $nova_senha);

            }else{

                echo "A confirmação deve ser igual à nova senha!";

            }
        }else{
            echo "Preencha tudo!!";
        }

        
    }

    public function perfil(){

        $obj = new UsuarioModel();
        $dados = $obj->perfil();
        require_once 'view/usuario/perfil.php';
        
    }

    public function updatedados(){

        $obj = new UsuarioModel();

        if (isset($_POST['nome'])) {

            $obj->updatedados($_POST['nome'], $_POST['cpf'], $_POST['cep'], $_POST['cidade'], $_POST['bairro'], $_POST['uf'], $_POST['email']);

        }

    }
}

?>