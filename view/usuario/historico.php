<?php include '../../inc/header_usuario.php'; ?>

<div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4 hist text-center">
                <div class="hist_box shadow" style="background-color: #57bf46; padding: 40px 20px 40px 20px;">
                    <h2 class="" style="color: #fff">Histórico de Crédito</h2>
                    <p class="lbl_cadastro" style="color: #fff">Continue aqui para ver seu histórico de créditos, ou seja, todos os seus códigos cadastrados e a pontuação adicionada.</p>
                    <a href="../../?classe=Usuario&acao=historico_credito" class="btn btn-light shadow" style="margin-top: 20px;">Continuar</a>     
                </div>
            </div>
            <div class="col-md-4 hist text-center">
                <div class="hist_box shadow" style="background-color: #57bf46; padding: 40px 20px 40px 20px;">
                    <h2 class="" style="color: #fff">Hitórico de Débito</h2>
                    <p class="lbl_cadastro" style="color: #fff">Continue aqui para ver seu histórico de débitos, ou seja, toda pontuação convertida em serviços de nossos parceiros para você.</p>
                    <a href="../../?classe=Usuario&acao=historico_debito" class="btn btn-light shadow" style="margin-top: 20px;">Continuar</a>  
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>

<?php include '../../inc/footer_sistema.php'; ?>