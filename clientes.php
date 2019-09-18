<?php
	//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions", array("config", "conexao", "database"));
	carregaIncludes("includes", array("header"));//-----/INCLUINDO CABEÇALHO/-----
	//-----/includes-----
?>
		<section class="clientes"><!--section-->
			<article class="cabecalho">
				<h2>Clientes</h2>
				<div class="menuzin">
					<a href="cadastrar.php"><i class="fas fa-plus"></i>&nbsp;Novo Cliente</a>
					<a href="clientes.php" onClick="history.go(0)"><i class="fas fa-redo"></i>&nbsp;atualizar</a>
				</div>
			</article>
			<article class="principal">
				<table>
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Idade</th>
							<th>Status</th>
							<th>Opções</th>
						</tr>
					</thead>
					<tbody>
				<?php
					$clientes = dbRead("cliente");
					foreach ($clientes as $value) {
						$id = $value['id'];
						echo '
							<tr>
								
								<td>'.$value['nome'].'</td>
								<td>'.$value['email'].'</td>
								<td>'.$value['idade'].'</td>
								<td>'.$value['status'].'</td>
								<td class="btn">
									<form action="edit.php" method="POST">
										<button type="submit" name="vizualizar" value ="'.$id.'"><i class="fas fa-eye"></i> Vizualizar</button>
										<button type="submit" name="editar" value ="'.$id.'"><i class="fas fa-pencil-alt"></i> Editar</button>
										<button type="submit" name="excluir" value ="'.$id.'"><i class="far fa-trash-alt"></i> Excluir</button>
									</form>
								</td>
							</tr>
						';	
					}
					
				?>
					</tbody>
				</table>
			</article>
		</section><!--/section-->
<?php
	//-----INCLUINDO RODAPÉ------
	carregaIncludes("includes", array("footer"));
	//-----/INCLUINDO RODAPÉ-----
?>