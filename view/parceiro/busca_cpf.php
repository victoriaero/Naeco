<?php include '../../inc/header_parceiro.php'; ?>


<div class="container-fluid bg_cadastro">
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<h3>Busca de CPF</h3><br><br>
			<form name="busca_cpf" class="form-group cpf" method="POST" action="../../?classe=Parceiro&acao=busca_cpf">
				<h4 class="lbl_cadastro text-justify">Insira o CPF do cliente:</h4>
				<input type="text" name="cpf" placeholder="CPF" class="form-control box shadow-sm" required><br><br>
				<button class="btn btn-light shadow" type="submit" style="margin-bottom: 50px;">Enviar</button>
			</form>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<?php include '../../inc/footer_sistema_parceiro.php'; ?>