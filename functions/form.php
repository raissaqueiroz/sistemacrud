<?php
	//-----includes------
	require_once 'config.php';
	require_once 'conexao.php';
	require_once 'database.php';
	require_once 'functions.php';
	//-----/includes-----

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['cadastrar'])){
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$idade = addslashes($_POST['idade']);
				if(empty($nome) || empty($email) || empty($idade)){
					$msg = '<h3 class="error">Você precisa preencher todos os campos</h3>';	
					header("Location: ../cadastrar.php");			
				} else {
					$novoCliente = newCliente($nome, $email, $idade);
						if($novoCliente){
							$msg = '<h3 class="sucess">Cliente Cadastrado com Sucesso!</h3>';
						} else {
							$msg = '<h3 class="error">Erro ao tentar adicionar novo cliente.</h3>';
						}
				}
		}
	}
?>