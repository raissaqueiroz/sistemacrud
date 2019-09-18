<?php
	#função pra carregar includes
	function carregaIncludes($pasta, $includes){
		if(is_array($includes)){
			if(!empty($includes)){
				foreach ($includes as $value) {
					include_once "$pasta/$value.php";
				}
			}
		}
	}
	#função para inserir novo cliente
	function newCliente($nome, $email, $idade){
		$conn = dbConnect();
		$cliente = array(
			"nome" => "$nome",
			"email" => "$email",
			"idade" => "$idade",
			"status" => "1"
		); 
		$query = dbCreate("cliente", $cliente);
			if($query){
				return true;
			} else {
				return false;
			}
		dbClose($conn);
	}
	#Função pra editar cliente
	function editCliente($table, $data, $where = null){
		$link = DBConectar();
		$table = DB_PREFIX.'_'.$table;	//colocando o prefixo da tabela
		$where = ($where) ? "WHERE {$where}" : null;
		$data = DBEscape($data); //protegendo contra SQL Injection
			foreach ($data as $key => $value) {
				$fields[] = "{$key} = '{$value}'";
			}
		$fields = implode(', ', $fields);

		$query = "UPDATE {$table} SET {$fields} {$where}";
		return DBExecute($query);
		DBClose($link);
	}
	#função para verificar se registro já está cadastrado
	function ifExists($table, $nome, $email){
		$conn = dbConnect();
		$params = "WHERE nome = '{$nome}' AND email = '{$email}'";
		$result = dbRead($table, $params, "*");
			if($result >= 1){
				return false;		
			} else {
				return true;
			}
		dbClose($conn);	
	}
	
?>