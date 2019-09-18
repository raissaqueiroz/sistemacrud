<?php
	//-----includes------
	require_once 'functions/functions.php';
	carregaIncludes("functions", array("config", "conexao", "database"));
	carregaIncludes("includes", array("header"));
	//-----/includes-----
?>
		<section class="main"><!--section-->
			<nav class="menu">
				<ul>
					<a href="cadastrar.php"><li><i class="fas fa-plus"></i>Novo Cliente</li></a>
					<a href="clientes.php"><li><i class="fas fa-user"></i>Clientes</li></a>
				</ul>
			</nav>
		</section><!--/section-->
<?php
	//-----includes------
	carregaIncludes("includes", array("footer"));
	//-----/includes-----
?>