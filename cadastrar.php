<?php
	//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions", array("config", "conexao", "database"));
	carregaIncludes("includes", array("header"));
	//-----/includes-----
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(isset($_POST['cadastrar'])){
				$nome = addslashes($_POST['nome']);
				$email = addslashes($_POST['email']);
				$idade = addslashes($_POST['idade']);
					//se os campos n estiverem vazios:
					if(!empty($nome) || !empty($email) || !empty($idade)){ 
						//se esse nome e email n tiver sido cadastrado antes:
						if(ifExists("cliente", $nome, $email)){ 
							$novoCliente = newCliente($nome, $email, $idade);
								if($novoCliente){
									 echo "<script language='javascript'>alert('Cliente cadastrado com êxito!'); window.location='cadastrar.php';</script>";
			 					} else {
									echo "<script language='javascript'>alert('Erro ao tentar cadastrar novo cliente1 Por favor, tente mais tarde.'); window.location='index.php';</script>";
								}	
						} else {
							echo "<script language='javascript'>alert('Esse cliente já está cadastrado!'); window.location='cadastrar.php';</script>";
						}
					} else {
						echo "<script language='javascript'>alert('Preencha todos os campos!'); window.location='cadastrar.php';</script>";
					}	
			}
		}
?>
		<section class="cadastrar"><!--section-->
			<form action="" method="POST">
				<div class="inp">
					<legend>Novo Cliente</legend>
					<?php
						if(isset($msg)){
							if(!empty($msg)){
								echo $msg;
								
							}
						}
					?>
					<input type="text" name="nome"  placeholder="Nome: " class="caixa" required>
					<input type="email" name="email" placeholder="Email: " required>
					<input type="text" name="idade"  maxlength="2" placeholder="Idade: " required>
				</div>
				<div class="buttons">
					<input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-cadastrar">
					<a href="index.php" class="btn btn-cancelar"> Cancelar </a>
				</div>
			</form>
		</section><!--/section-->
<?php
	//-----includes------
	carregaIncludes("includes", array("footer"));
	//-----/includes-----
?>