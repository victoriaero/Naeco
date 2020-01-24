<?php include '../../inc/header_parceiro.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 hist text-center">
            <div class="hist_box shadow" style="background-color: #57bf46; padding: 40px 20px 40px 20px;">
                <h2 class="" style="color: #fff">Débitos por Data</h2>
                    <form name="cadastro" class="form-group cadastro" method="POST" action="../../?classe=Parceiro&acao=relatorio_clientes">
                        <p class="lbl_cadastro" style="color: #fff">Data Inicial</p>
                        <input type="date" name="data_inicio" class="form-control box shadow-sm">
                        <p class="lbl_cadastro" style="color: #fff">Data Final</p>
                        <input type="date" name="data_fim" class="form-control box shadow-sm">
                        <div class="text-center">
                            <p class="lbl_cadastro" style="color: #fff">Continue aqui para ver o relatório de débitos em clientes pelo intervalo de datas desejado.</p>
                            <button class="btn btn-light shadow" style="margin-top: 20px;" type="submit">Buscar</button>
                        </div>
                    </form>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>

<?php include '../../inc/footer_sistema.php'; ?>