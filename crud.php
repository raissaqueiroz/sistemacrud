<?php
	require_once 'functions/functions.php';
	carregaIncludes("functions", array("config", "conexao", "database"));
		if(isset($_POST['salvar'])){
			$id = addslashes($_POST['id']);
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$idade = addslashes($_POST['idade']);
			$status = addslashes($_POST['status']);
				//se os campos n estiverem vazios:
				if(!empty($nome) || !empty($email) || !empty($idade) || !empty($status)){ 
					//se esse nome e email n tiver sido cadastrado antes:
					$data = array(
						"nome" => "$nome",
						"email" => "$email",
						"idade" => "$idade",
						"status" => "$status"
					);
					$table = "cliente";
					$where = "id = $id";
					$editCliente = dbUpdate($table, $data, $where);
						if($editCliente){
							echo "<script language='javascript'>alert('Cliente editado com êxito!'); window.location='clientes.php';</script>";
				 		} else {
							echo "<script language='javascript'>alert('Erro ao tentar editar cliente! Por favor, tente mais tarde.'); window.location='clientes.php';</script>";
						}	
				} else {
					echo "<script language='javascript'>alert('Preencha todos os campos!'); window.location='cadastrar.php';</script>";
				}
		} else {
			//redirecionar
		}
?>