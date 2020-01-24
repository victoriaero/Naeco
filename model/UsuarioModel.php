<?php

require_once "controller/UsuarioController.php";

class UsuarioModel{

    // Variáveis

    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $senha;
    private $confirmar_senha;
    private $cep;
    private $bairro;
    private $cidade;
    private $uf;

    private $idSaldo;
    private $valor_saldo;
    private $string_codigo;
    private $id_material;
    // private $quantidade_material; // por enquanto será igual a 1
    private $valor_material;
    // private $id_ponto_coleta

    private $antiga_senha;
    private $nova_senha;


    private $con;

    // Construtor

    public function __construct($id=NULL, $nome=NULL, $email=NULL, $cpf=NULL, $senha=NULL, $confirmar_senha=NULL, $cep=NULL, $bairro=NULL, $cidade=NULL, $uf=NULL, $idSaldo=NULL, $valor_saldo=NULL, $string_codigo=NULL, $id_material=NULL, $quantidade_material=NULL, $valor_material=NULL)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
        $this->confirmar_senha = $confirmar_senha;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->cep = $cep;

        $this->idSaldo = $idSaldo;
        $this->valor_saldo = $valor_saldo;
        $this->string_codigo = $string_codigo;
        $this->id_material = $id_material;
        $this->quantidade_material = $quantidade_material;
        $this->valor_material = $valor_material;
       

        $this->con = new PDO(SERVIDOR, USUARIO, SENHA);

    }

        public function cadastro(){

        unset($_SESSION['usuario']);
            // CADASTRO USUARIO

              $this->cpf = str_replace('.', '', $this->cpf);
              $this->cpf = str_replace('-', '', $this->cpf);

            $sql = $this->con->prepare("SELECT * FROM usuario WHERE cpf_usuario = ?");
            $sql->execute([$this->cpf]);
            $row = $sql->fetchObject();
            
            if ($row) {
    
                echo "CPF já cadastrado.";
    
            } else {
              $this->cep = str_replace('.', '', $this->cep);
              $this->cep = str_replace('-', '', $this->cep);


            $sql = $this->con->prepare("INSERT INTO usuario VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?);"); 
            $sql->execute(array($this->nome, $this->cpf, $this->email, $this->senha, $this->cep, $this->bairro, $this->cidade, $this->uf));
            
            $sql = $this->con->prepare("SELECT * FROM usuario WHERE email_usuario = ?");
            $sql->execute([$this->email]);
            $row = $sql->fetchObject();

            if ($sql->errorCode() == 00000) {

              $_SESSION['usuario'] = $row;

              $sql = $this->con->prepare("INSERT INTO saldo VALUES(NULL, 0, ?)");
              $sql->execute([$_SESSION['usuario']->id_usuario]);

              header("Location: view/usuario/");
            }else {  
              echo $sql->errorInfo()[2];
            }

    }
  }

    public function login($email, $senha){
        unset($_SESSION['usuario']);

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE email_usuario = ?");
        $sql->execute([$email]);
        $row = $sql->fetchObject();

        if ($row) {

            if ($senha == $row->senha_usuario) {

                $_SESSION['usuario'] = $row;
                
                $sql = $this->con->prepare("SELECT * FROM saldo WHERE id_usuario = ?");
                $sql->execute([$_SESSION['usuario']->id_usuario]);
                $row_saldo = $sql->fetchObject();
        
                $_SESSION['usuario_saldo'] = $row_saldo;

                header("Location:view/usuario/");

            } else {
                echo "Senha inválida.";
            }

        } else {
            echo "Usuário não encontrado.";
        }

    }


    
    public function usuario_delete(){

        $sql = $this->con->prepare("DELETE FROM usuario WHERE id_usuario = ?");
        $sql->execute([$_SESSION['usuario']->id_usuario]);

        header("location: index.php");

      }


    public function usuario_saldo(){

        $sql = $this->con->prepare("SELECT * FROM saldo WHERE id_usuario = ?");
        $sql->execute([$_SESSION['usuario']->id_usuario]);
        $row_saldo = $sql->fetchObject();

        $valor_saldo = $row_saldo->valor_saldo;

        require_once 'view/usuario/pontuacao.php';

echo '

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center" style="margin-top: 70px; margin-bottom: 100px;">
                <div class="card card-saldo shadow" style="background-color: #4c9141">
                <div class="card-body">
                    <h2 class="card-title" style="color: white; margin-top: 30px;">Meus Pontos</h2>
                    <input class="form-control saldo-box shadow" type="text" disabled name="saldo" value="' .$valor_saldo .'">
                    <h4 class="lbl_cadastro" style="color: white; margin-top: 30px; margin-bottom: 50px;">* Para aumentar sua pontuação e conseguir resgatar algum serviço é preciso reciclar. Mãos a obra!</h4>
                </div>
                </div>
            </div>
            <div class="col-md-3"></div>
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

';

    }

    public function logout()
    {
        echo "Sessão encerrada.";
        unset($_SESSION['usuario']);
    }

       public function validar_codigo(){

        $sql = $this->con->prepare("SELECT * FROM codigo WHERE codigo = ? ");
        $sql->execute([$this->string_codigo]);
        $validacao = $sql->fetchObject();

        if(empty($validacao)){

            echo "
            <div class='alert' role='alert' style='
                    background-color: #f01f1f;
                    color: white;
                    border-radius: 0px;
                    margin-bottom: 0px;
                    '>
                <strong>Código Inválido</strong>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true' style='color: white;'>&times;</span>
                </button>
            </div>";

        }else{

            $sql = $this->con->prepare("SELECT valor_material FROM material WHERE id_material = ?");
            $sql->execute([$validacao->id_material]);
            $valor_material = $sql->fetchObject();

            // QUANTIDADE
            $quantidade_material = $validacao->quantidade_material;

            // SALDO DO USUARIO
            $sql = $this->con->prepare("SELECT * FROM saldo WHERE id_usuario = ?");
            $sql->execute([$_SESSION['usuario']->id_usuario]);
            $row_saldo = $sql->fetchObject();

            $saldo = $row_saldo->valor_saldo;

            // VALOR MATERIAL
            $material = $valor_material->valor_material;

            $valor_creditado = $material * $quantidade_material;
            // CALCULO PARA CREDITAR SALDO
            $saldo_creditado =  $saldo + $valor_creditado;

            $sql = $this->con->prepare("UPDATE saldo SET valor_saldo = '$saldo_creditado' WHERE id_saldo = ?");
            $sql->execute([$row_saldo->id_saldo]);
            
            // PARA O HISTÓRICO DE CRÉDITOS
            $sql = $this->con->prepare("INSERT INTO credito VALUES(NULL, ?, ?, CURRENT_TIMESTAMP, ?)");
            $sql->execute([$validacao->id_codigo, $row_saldo->id_saldo, $valor_creditado]);

            if ($sql->errorCode() == 00000) {

                header("location: ./?classe=Usuario&acao=usuario_saldo");
 
              }else {  
                echo $sql->errorInfo()[2];
              }
  

        }
    }
    
    
    public function historico_credito(){

        $sql = $this->con->prepare("SELECT
                                                                    cod.codigo as codigo,
                                                                    cod.quantidade_material as quantidade_material,
                                                                    ptcoleta.logradouro_ponto_coleta as descricao_ponto_coleta,
                                                                    mat.tipo_material as material,
                                                                    CONCAT(mat.valor_material, ' pontos') AS valor_credito,
                                                                    cred.data_credito
                                                                FROM credito AS cred
                                                                    JOIN codigo cod ON cod.id_codigo = cred.id_codigo
                                                                    JOIN ponto_coleta ptcoleta ON ptcoleta.id_ponto_coleta = cod.id_ponto_coleta
                                                                    JOIN saldo sld ON sld.id_saldo = cred.id_saldo
                                                                    JOIN usuario usr ON usr.id_usuario = sld.id_usuario
                                                                    JOIN material mat ON mat.id_material = cod.id_material
                                                                WHERE usr.id_usuario = ?
                                                                ORDER BY cred.data_credito DESC
                                                            ;");

        $sql->execute([$_SESSION['usuario']->id_usuario]);
        return $sql->fetchAll(PDO::FETCH_CLASS);

    }

    public function historico_debito(){

        $sql = $this->con->prepare("SELECT
                                        parc.nome_fantasia_parceiro,
                                        CONCAT(debt.valor_debito, ' pontos') AS valor_debito,
                                        debt.data_debito
                                    FROM debito AS debt
                                        JOIN parceiro parc ON parc.id_parceiro = debt.id_parceiro
                                        JOIN saldo sld ON sld.id_saldo = debt.id_saldo
                                    WHERE sld.id_saldo = ?
                                    ORDER BY debt.data_debito DESC
                                ;");
        $sql->execute(array($_SESSION['usuario_saldo']->id_saldo));
        return $sql->fetchAll(PDO::FETCH_CLASS);

    }

   public function usuario_updatesenha($antiga_senha, $nova_senha){

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $sql->execute([$_SESSION['usuario']->id_usuario]);
        $row = $sql->fetchObject();


        if ($row) {

            if ($antiga_senha == $row->senha_usuario) {

            $sql = $this->con->prepare("UPDATE usuario SET senha_usuario = ? WHERE id_usuario = ?");
            $sql->execute([$nova_senha, $_SESSION['usuario']->id_usuario]);

            header("location: ?classe=Usuario&acao=perfil");

            } else {

                echo "A senha antiga não está correta!";
            }

        } else {

            echo "Erro ao receber informações!";
        }

require_once 'view/usuario/perfil.php';
        
    }

    public function perfil(){

        return $_SESSION['usuario'];
    }

    public function updatedados($nome, $cpf, $cep, $cidade, $bairro, $uf, $email){

        $sql = $this->con->prepare("UPDATE usuario SET
                                        nome_usuario = ?,
                                        cpf_usuario = ?,
                                        cep_usuario = ?,
                                        cidade_usuario = ?,
                                        bairro_usuario = ?,
                                        uf_usuario = ?,
                                        email_usuario = ?
                                    WHERE id_usuario = ?
                                    ");
        $sql->execute([$nome, $cpf, $cep, $cidade, $bairro, $uf, $email, $_SESSION['usuario']->id_usuario]);

        $sql = $this->con->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
        $sql->execute([$_SESSION['usuario']->id_usuario]);
        $row = $sql->fetchObject();

        unset($_SESSION['usuario']);
        $_SESSION['usuario'] = $row;
        
        // var_dump($_SESSION['usuario']);

        header('location: ?classe=Usuario&acao=perfil');
    }




    // GETTERS e SETTERS

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

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
    
    
    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     *
     * @return  self
     */ 
    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }
    

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     *
     * @return  self
     */ 
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     *
     * @return  self
     */ 
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of uf
     */ 
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set the value of uf
     *
     * @return  self
     */ 
    public function setUf($uf)
    {
        $this->uf = $uf;

        return $this;
    }



    /**
     * Get the value of idSaldo
     */ 
    public function getIdSaldo()
    {
        return $this->idSaldo;
    }

    /**
     * Set the value of idSaldo
     *
     * @return  self
     */ 
    public function setIdSaldo($idSaldo)
    {
        $this->idSaldo = $idSaldo;

        return $this;
    }

    /**
     * Get the value of valor_saldo
     */ 
    public function getValor_saldo()
    {
        return $this->valor_saldo;
    }

    /**
     * Set the value of valor_saldo
     *
     * @return  self
     */ 
    public function setValor_saldo($valor_saldo)
    {
        $this->valor_saldo = $valor_saldo;

        return $this;
    }

    /**
     * Get the value of string_codigo
     */ 
    public function getString_codigo()
    {
        return $this->string_codigo;
    }

    /**
     * Set the value of string_codigo
     *
     * @return  self
     */ 
    public function setString_codigo($string_codigo)
    {
        $this->string_codigo = $string_codigo;

        return $this;
    }

    /**
     * Get the value of id_material
     */ 
    public function getId_material()
    {
        return $this->id_material;
    }

    /**
     * Set the value of id_material
     *
     * @return  self
     */ 
    public function setId_material($id_material)
    {
        $this->id_material = $id_material;

        return $this;
    }

    /**
     * Get the value of quantidade_material
     */ 
    public function getQuantidade_material()
    {
        return $this->quantidade_material;
    }

    /**
     * Set the value of quantidade_material
     *
     * @return  self
     */ 
    public function setQuantidade_material($quantidade_material)
    {
        $this->quantidade_material = $quantidade_material;

        return $this;
    }

    /**
     * Get the value of valor_material
     */ 
    public function getValor_material()
    {
        return $this->valor_material;
    }

    /**
     * Set the value of valor_material
     *
     * @return  self
     */ 
    public function setValor_material($valor_material)
    {
        $this->valor_material = $valor_material;

        return $this;
    }
}

?>