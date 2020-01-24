<?php include '../inc/header01.php'; ?>
<br><br><br>
<div class="container-fluid bg_contato">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center">
                <h2 style="margin-bottom: 50px; color: #4c9141">Fale conosco!</h2>
                <p>Como podemos te ajudar?</p>
            </div>
            <form name="nome" class="form-group contato" method="POST" action="enviar.php">
                <p class="email">Email</p>
                <input type="email" name="email" class="form-control box shadow-sm" required><br>
                <p class="nome">Nome</p>
                <input type="text" name="nome" class="form-control box shadow-sm" required><br>
                <p class="msg">Mensagem</p>
                <input type="text" name="msg" class="form-control box shadow-sm" required><br>
        
                <div class="col-md-12 text-center">
                    <button class="btn btn-light shadow" type="submit" style="margin-bottom: 100px;">Enviar</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include '../inc/footer01.php'; ?>