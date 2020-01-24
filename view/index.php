<?php include 'inc/header.php';?>

<div class="jumbotron" style="background-color: #c9b691">
  <center>
    <img src="imagens/logo.png"  style="width: 25%; height: 25%;" ></div></center>


<div class="bg-gradient" style="background-image: linear-gradient(white, rgb(226, 226, 226));">
<!-- Container (About Section) -->
<div id="about" class="container-fluid" style="background-color: transparent;">
  <div class="row">
    <div class="col-md-12 text-center"><h2 style="color:#4C9141;">Ajudando o mundo</h2><br></div>
    <div class="col-sm-6 text-center">
      <img class="icon-text logo slideanim" src="imagens/earth_icon.png">
    </div>
    <div class="col-sm-6" style="margin-top: 75px;">
      <h4 style="text-align:justify;">Nosso objetivo como startup é ajudar as pessoas, por meio de recompensas, a se sentirem importantes na preservação do meio ambiente. Queremos espalhar a ideia da reciclagem fazendo as pessoas se divertirem e sentir que isso é importante. Então, salve o mundo com a NaEco!</h4> <p>RECICLE!</p>
    </div>
  </div>
</div>

<!-- Container (Como Funciona Section) -->
<div id="how" class="container-fluid text-center" style="background-color: transparent;">
  <h2 style="margin-bottom: 75px; color:#4C9141;">Como Funciona?</h2><br>
  <div class="row slideanim">
    <div class="col-sm-3">
      <div class="icon">
        <img class="icon-index logo slideanim" src="imagens/recycle_material_icon.png">
      </div>
      <h4>Selecione seu material reciclável</h4><br>
      <p>Na sua casa ou trabalho, você guarda (e limpa) todo o material reciclavel que consome.</p>
    </div>
    <div class="col-sm-3">
      <div class="icon">
        <img class="icon-index logo slideanim" src="imagens/recycle_trash_icon.png">
      </div>
      <h4>Vá até o ponto de coleta mais próximo</h4>
      <p>Com tudo já separado, você vai até um dos PONTOS DE COLETA e descarte!</p> 
    </div>
    <div class="col-sm-3">
      <div class="icon">
        <img class="icon-index logo slideanim" src="imagens/code_icon.png">
      </div>
      <h4>Descarte e receba seu código</h4><br>
      <p>Cada descarte que você faz, gera um código que, ao ser inserido no nosso APP, vira créditos e bônus nas nossas super parceiras!</p>
    </div>
    <div class="col-sm-3">
      <div class="icon">
        <img class="icon-index logo slideanim" src="imagens/smartphone_icon.png">
      </div>
      <h4>Restaure seus pontos</h4>
      <p>Já com seus pontos no aplicativo, basta ir até uma unidade das lojas dos nossos parceiros, comprar e informar seu CPF que você irá receber descontos incríveis! E também é possível resgatar descontos direto pelo APP.</p>
    </div>
  </div>
</div>

<!-- Container (Parceiro Section) -->
<div id="parceiro" class="container-fluid bg-grey">
  <div class="row">
    <div class="col-md-12 text-center"><h2 style="margin-bottom: 75px; color:#4C9141;">Seja nosso parceiro</h2><br></div>
    <div class="col-sm-5">
      <h4 style="color:#4C9141;"><strong>Nos ajude a salvar o planeta</strong></h4>
      <h4 style="text-align:justify;">Quando você se torna um dos nossos parceiros você mostra aos seus clientes que a sua empresa é ligada ao meio ambiente e que se importa com o futuro! Você passa a vender mais e para públicos diferentes. Além do mais, nós vamos te ajudar no seu marketing e a crescer mais e mais, por que o que a gente quer é incentivar empresas conscientes!</h4>

    <a href="?classe=Parceiro&acao=cadastro" class="btn btn-light shadow" style="margin-bottom: 30px;">Seja um parceiro!</a>
    
    </div>
    <div class="col-sm-7 text-center">
      <img class="icon-text logo slideanim" src="imagens/earth_people_icon.png">
    </div>
  </div>
</div>

<div id="cadastro" class="container-fluid" style="background-color: #57bf46; color: white;">
  <div class="row">
    <div class="col-md-12 text-center"><h2>Se interessou?</h2>
      <h1><strong>Faça parte disso!<br>Cadastre-se</strong></h1><br>
      <a href="?classe=Usuario&acao=cadastro" class="btn btn-light shadow">Cadastre-se</a>
    </div>
  </div>
</div>

</div>

<script>

$(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });

</script>

<?php include 'inc/footer.php'; ?>