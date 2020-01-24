<?php

class NaecoModel{

    //FALE COM A GENTE - SUPORTE

    $to = "naeco.startup@gmail.com";
    $subject = "E-mail do Fale com a gente";

    private $from;
    private $msg;
    private $nome;

    private $con;

    public function __construct($from=NULL, $msg=NULL, $nome=NULL){

        $this->from = $from;
        $this->msg = $msg;
        $this->nome = $nome;

        $this->con = $this->con = new PDO(SERVIDOR, USUARIO, SENHA);

    }

    public function fale_conosco(){
        
        $headers = "From: '$this->nome'";

        mail($to, $subject, $this->msg, $headers);

        echo "E-mail enviado com sucesso.";

    }

    // GETTERS e SETTERS

    /**
     * Get the value of from
     */ 
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set the value of from
     *
     * @return  self
     */ 
    public function setFrom($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get the value of msg
     */ 
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Set the value of msg
     *
     * @return  self
     */ 
    public function setMsg($msg)
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }
}