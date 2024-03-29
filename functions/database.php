<?php
	#função para proteger contra SQL Injections
	function dbEscape($data){
		$conn = dbConnect();
			if(!is_array($data)){
				$data = mysqli_real_escape_string($conn, $data);
			} else {
				$arr = $data;
					foreach ($arr as $key => $value) {
						$key = mysqli_real_escape_string($conn, $key);
						$value = mysqli_real_escape_string($conn, $value);
						$data[$key] = $value;
					}
			}
		dbClose($conn);
		return $data;
	}
	#Função para executar querys no banco
	function dbExecute($query){
		$conn = dbConnect();
		$result = @mysqli_query($conn, $query) or die("Falha ao tentar executar query: ".@mysqli_error($conn));
		dbClose($conn);
		return $result;
	}
	#deletar registros
	function dbDelete($table, $where){
		$link = dbConnect();
		$table = DB_PREFIX.'_'.$table;	//colocando o prefixo da tabela
		$where = ($where) ? "WHERE {$where}" : null;
		$query = "DELETE FROM {$table} {$where}";
		return DBExecute($query);
		DBClose($link);
	}
	#Altera registro
	function dbUpdate($table, array $data, $where = null){
		$link = dbConnect();
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
	#Função para inserir dados no banco
	function dbCreate($table, array $data){
		$conn = dbConnect(); //abrindo conexão
		$table = DB_PREFIX."_".$table; //colocando prefixo na tabela
		$data = dbEscape($data); //protegendo query contra sql injection
		$fields = implode(', ', array_keys($data)); //quebrando as chaves do array com vírgulas
		$values = "'".implode("', '", $data)."'"; //quebrando os valores do array com vírgulas
		$query = "INSERT INTO {$table} ({$fields}) VALUES ({$values})"; //montando a query
		return dbExecute($query); //executando a query
		dbClose($conn); //fechando conexão
	}
	#Função para ler registros do banco
	function dbRead($table, $params = null, $fields = "*"){
		$conn = dbConnect(); //abrindo conexão
		$table = DB_PREFIX."_".$table; //add prefixo na tabela
		$query = "SELECT {$fields} FROM {$table} {$params}";
		$result = dbExecute($query);
			if(!mysqli_num_rows($result)){
				return false;
			} else {
				while ($res = mysqli_fetch_assoc($result)) {
					$data[] = $res;
				}
			}

		dbClose($conn); //fechando conexão
		return $data;
	}
//mysqli_affected_rows
?>