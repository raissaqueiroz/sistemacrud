<?php
	require_once 'functions/functions.php';
	carregaIncludes("functions", array("config", "conexao", "database"));
	carregaIncludes("includes", array("header"));
	//id do cliente selecionado
	
			//editando clientes
			if(isset($_POST['editar'])){
				$id = $_POST['editar'];
				$table = "cliente";
				$params = "WHERE id = '{$id}'";
				$data = dbRead($table, $params);
					if($data){
						foreach ($data as $value) {
							$nome = $value['nome'];
							$email = $value['email'];
							$idade = $value['idade'];
							$status = $value['status'];
						}
					} else {
						echo "<script language='javascript'>alert('Não é possivel editar cliente agora. Por favor, tente mais tarde!'); window.location='clientes.php';</script>";
					}
			//excluir registros
			} elseif(isset($_POST['excluir'])){
				$id = $_POST['excluir'];
				$table = "cliente";
				$where = "id = $id"; 
					if(dbDelete($table, $where)){
						echo "<script language='javascript'>alert('Cliente excluído com êxito!'); window.location='clientes.php';</script>";
					} else {
						echo "<script language='javascript'>alert(Não foi possivel excluir o cliente. Por favor, tente mais tarde!'); window.location='clientes.php';</script>";
					}	
			}else {
				//redirecionar para página de erro
				header("Location: clientes.php");
			}
		
	//cliente editado
	

?>
	
	<section class="cadastrar"><!--section-->
			<form action="crud.php" method="POST">
				<div class="inp">
					<legend>Novo Cliente</legend>
					<?php
						if(isset($msg)){
							if(!empty($msg)){
								echo $msg;
								
							}
						}
					?>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="text" name="nome"  value="<?php echo $nome; ?>" class="caixa" required>
					<input type="email" name="email" value="<?php echo $email; ?>"  required>
					<input type="text" name="idade" value="<?php echo $idade; ?>" maxlength="2"  required>
					<input type="number" name="status" value="<?php echo $status; ?>" maxlength="1" required>
				</div>
				<div class="buttons">
					<input type="submit" name="salvar" value="Salvar" class="btn btn-cadastrar">
					<a href="index.php" class="btn btn-cancelar"> Cancelar </a>
				</div>
			</form>
		</section><!--/section-->
<?php
	//-----includes------
	carregaIncludes("includes", array("footer"));
	//-----/includes-----
?>