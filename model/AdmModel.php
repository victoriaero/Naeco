<?php

require_once "controller/AdmController.php";

class AdmModel{

    // Variáveis

    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $confirmar_senha;
    private $cargo;
    private $novaSenha;
    
    private $con;

    // Construtor

    public function __construct($id=NULL, $nome=NULL, $email=NULL, $cpf=NULL, $cargo=NULL, $senha=NULL, $confirmar_senha=NULL, $novaSenha=NULL)
    {
        $this->id = $id;
        $this->nome  = $nome;
        $this->email  = $email;
        $this->cpf  = $cpf;
        $this->cargo = $cargo;
        $this->senha = $senha;
        $this->confirmar_senha = $confirmar_senha;
        $this->novaSenha = $novaSenha;
        
        

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);

    }

    public function cadastro(){

        unset($_SESSION['adm']);

              $this->cpf = str_replace(array('.', '-'), '', $this->cpf);

            // CADASTRO ADM

            $sql = $this->con->prepare("INSERT INTO administrador VALUES(NULL, ?, ?, ?, ?, ?);");
            $sql->execute(array($this->nome, $this->email, $this->cpf, $this->cargo, $this->senha));

            if ($sql->errorCode() == '00000') {

            

                // capturando dados da tbl adm
                $sql = $this->con->prepare("SELECT * FROM administrador WHERE email = ?");
                $sql->execute([$this->email]);
                $row = $sql->fetchObject();

                if ($row) {

                    echo "Administrador cadastrado com sucesso! Ele já pode fazer login no site!";
        
                }

            } else {

                echo "<b>ERRO</b> " . $sql->errorInfo()[2];

            }

    }

    public function login($nome, $senha){
        unset($_SESSION['adm']);

        $sql = $this->con->prepare("SELECT * FROM administrador WHERE nome = ?");
        $sql->execute([$nome]);
        $row = $sql->fetchObject();

        if ($row) {

            if ($senha == $row->senha) {

                $_SESSION['adm'] = $row;
                
                header("Location:view/adm/");

            } else {
                echo "Senha inválida.";
            }

        } else {
            echo "Administrador não encontrado.";
        }

    }

 public function logout()
    {
        echo "Sessão encerrada.";
        unset($_SESSION['adm']);
    }

    public function updatesenha($antiga_senha, $nova_senha){

        $sql = $this->con->prepare("SELECT * FROM administrador WHERE id = ?");
        $sql->execute([$_SESSION['adm']->id]);
        $row = $sql->fetchObject();
  
        // var_dump($_SESSION['adm']);
  
        if ($row) {
  
            if ($antiga_senha == $row->senha) {
  
            $sql = $this->con->prepare("UPDATE administrador SET senha = ? WHERE id = ?");
            $sql->execute([$nova_senha, $_SESSION['adm']->id]);
  
            header("location: view/adm/configuracoes.php");
  
            } else {

                echo "A senha antiga não está correta!";
            }
  
        } else {
  
            echo "Erro ao receber informações!";
        }
    
    }


public function rel_usuarios(){

        $sql = $this->con->prepare("SELECT
                                        usr.id_usuario,
                                        usr.nome_usuario,
                                        usr.cpf_usuario,
                                        usr.email_usuario,
                                        usr.cep_usuario,
                                        sld.id_saldo,
                                        sld.valor_saldo
                                    FROM usuario usr
                                    JOIN saldo sld ON sld.id_usuario = usr.id_usuario
                                    ORDER BY nome_usuario
                                ;");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_CLASS);

    }

public function rel_parceiros(){

        $sql = $this->con->prepare("SELECT
                                        *
                                    FROM parceiro 
                                    ORDER BY nome_fantasia_parceiro
                                ;");
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_CLASS);

    }



// getters and setters

    public function getId()
    {
        return $this->id;
    }

 public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

public function getNome()
    {
        return $this->nome;
    }

 public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

public function getEmail()
    {
        return $this->email;
    }

 public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

public function getCargo()
    {
        return $this->cargo;
    }

 public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

 public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

 public function getSenha()
    {
        return $this->senha;
    }

 public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }


     public function getNovaSenha()
    {
        return $this->novaSenha;
    }

 public function setNovaSenha($novaSenha)
    {
        $this->novaSenha = $novaSenha;

        return $this;
    }


}


    ?>