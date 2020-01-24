<?php include '../../inc/header_usuario.php'; ?>

<div class="container-fluid bg_contato">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="col-md-12 text-center">
                <h2 style="margin-bottom: 50px; color: #4c9141">Nos peça ajuda!</h2>
                <p>E vamos te ajudar ;)</p>
            </div>
            <form name="nome" class="form-group contato" method="POST" action="../enviar.php">
                <p class="email">Email</p>
                <input type="email" name="email" class="form-control box shadow-sm" required><br>
                <p class="nome">Nome</p>
                <input type="text" name="nome" class="form-control box shadow-sm" required><br>
                <p class="msg">Dúvida</p>
                <textarea class="form-control" id="msg"></textarea>
            <br><br>
        
                <div class="col-md-12 text-center">

                    <button class="btn btn-light shadow" type="submit" style="margin-bottom: 100px;">Enviar</button>
                </div>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php include '../../inc/footer_sistema.php'; ?>