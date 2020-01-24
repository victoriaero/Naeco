<?php

require_once "model/ParceiroModel.php";

class ParceiroController{

    public function cadastro(){

        $obj = new ParceiroModel();

        if (isset($_POST["nome_fantasia"]) && isset($_POST["razao_social"]) && isset($_POST["email"]) && isset($_POST["cnpj"]) && isset($_POST["senha"]) && isset($_POST["confirmar_senha"])) {

            if ($_POST['senha'] == $_POST['confirmar_senha']) {

                $obj->setNome_fantasia($_POST['nome_fantasia']);
                $obj->setRazao_social($_POST['razao_social']);
                $obj->setEmail($_POST['email']);
                $obj->setCnpj($_POST['cnpj']);
                $obj->setSenha($_POST['senha']);

                $obj->cadastro();

            } else {

                echo "O campo Confirmar Senha deve ser idêntico ao campo Senha.";

            }
        
        } else {

            echo "";

        }

        require_once 'view/cadastro_parceiro.php';

    }

   public function login(){
         

        if(isset($_POST["cnpj"])){
            $obj =  new ParceiroModel();
            $obj->login($_POST['cnpj'], $_POST['senha']);
            if (isset($_SESSION['parceiro']) ){
                header("Location:view/parceiro/index.php");
                
            }else{
                echo "Algo deu errado. Tente novamente mais tarde.";
            }
        }else{

            require_once 'view/login_parceiro.php';
            
        }
    }   
    
    

    public function logout(){

        $obj = new ParceiroModel();
        $obj->logout();

        header("Location: ./");

    }
    
    
    public function busca_cpf(){

        $obj = new ParceiroModel();
        $obj->busca_cpf($_POST['cpf']);

    }

    public function desconta_saldo(){

        $obj = new ParceiroModel();

        if (isset($_POST['valor_desconto'])) {

            if ($_POST['valor_desconto'] !== '0') {
                $valor_desconto = $_POST['valor_desconto'];
                $obj->desconta_saldo($valor_desconto);
            } else {
                echo "Insira um valor para desconto válido.";
            }

        }
    }

    public function delete(){

        $obj = new ParceiroModel();
        $obj->parceiro_delete();
        
    }

   public function relatorio_clientes(){

        if (isset($_POST['data_inicio']) && isset($_POST['data_fim'])) {
                
            $data_inicio = date('y-m-d', strtotime($_POST['data_inicio']));
            $data_fim = date('y-m-d', strtotime($_POST['data_fim']));

            $obj = new ParceiroModel();
            $dados = $obj->relatorio_clientes($data_inicio, $data_fim);

            require_once 'view/parceiro/relatorio_clientes.php';

        }
    }

    public function updatesenha(){

        if (isset($_POST["antiga"]) && isset($_POST["nova_senha"]) && isset($_POST["confirmacao"]) ){
           
            if (($_POST["nova_senha"]) == ($_POST["confirmacao"])) {

                $antiga_senha = $_POST["antiga"];
                $nova_senha = $_POST["nova_senha"];

                $obj = new ParceiroModel();
                $obj->updatesenha($antiga_senha, $nova_senha);

            }else{

                echo "A confirmação deve ser igual à nova senha!";

            }

        }else{
            
            echo "Preencha tudo!!";
        }

        
    }

    public function perfil(){

        $obj = new ParceiroModel();
        $dados = $obj->perfil();
        require_once 'view/parceiro/perfil.php';
        
    }

    public function updatedados(){

        $obj = new ParceiroModel();

        if (isset($_POST['nome_fantasia'])) {

            $obj->updatedados($_POST['nome_fantasia'], $_POST['razao_social'], $_POST['cnpj'], $_POST['email']);

        }

    }

}

?>