<?php

require_once "model/AdmModel.php";

class AdmController{



    public function cadastro(){
    
    $obj = new AdmModel();

        if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cpf"]) && isset($_POST["senha"]) && isset($_POST["confirmar_senha"]) && isset($_POST["cargo"]) ) {

            if ($_POST['senha'] == $_POST['confirmar_senha']) {

            $obj->setNome($_POST['nome']);
            $obj->setEmail($_POST['email']);
            $obj->setCpf($_POST['cpf']);
            $obj->setSenha($_POST['senha']);
            $obj->setCargo($_POST['cargo']);

            $obj->cadastro();

            } else {

                echo "O campo Confirmar Senha deve ser idêntico ao campo senha.";

            }

        } else {

            echo "";

        }
        require_once 'view/adm/adc.php';


    }

     public function login(){
         

        if(isset($_POST["nome"])){
            $obj =  new AdmModel();
            $obj->login($_POST['nome'], $_POST['senha']);
            if (isset($_SESSION['adm']) ){
                header("Location:view/adm");
            }else{
                echo "Algo deu errado. Tente novamente mais tarde.";
            }
        }else{

            require_once 'view/login_adm.php';
        }
    }   

    public function logout(){

        $obj = new AdmModel();
        $obj->logout();

        header("Location: ./");

    }

    public function updatesenha(){

        if (isset($_POST["antiga"]) && isset($_POST["nova_senha"]) && isset($_POST["confirmacao"]) ){
           
            if (($_POST["nova_senha"]) == ($_POST["confirmacao"])) {

                $antiga_senha = $_POST["antiga"];
                $nova_senha = $_POST["nova_senha"];

                $obj = new AdmModel();
                $obj->updatesenha($antiga_senha, $nova_senha);

            }else{

                echo "A confirmação deve ser igual à nova senha!";

            }

        }else{
            
            echo "Preencha tudo!!";
        }
        
    }

    public function rel_usuarios(){

        $obj = new AdmModel();
        $usuarios = $obj->rel_usuarios();
        require_once 'view/adm/historico_usuarios.php';

    }

    public function rel_parceiros(){

        $obj = new AdmModel();
        $parceiros = $obj->rel_parceiros();
        require_once 'view/adm/historico_parceiros.php';

    }
}

?>