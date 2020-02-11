<?php
// Conexão com o Banco de Dados
include_once'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
//Message
include_once 'includes/mensagem.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light">Clientes</h3>
	 <table class="striped">
	 	<div class="col s12 m6 l5">
        <div class="card-panel green accent-3 z-depth-0">
          <span class="white-text  center">                
          <h6 class="light text-icons "><i class="material-icons small center">shopping_cart</i><br>Total de Vendas: <br></h6>
          </span>
         </div>
        </div>

	 	<div class="col s14 m6 l6">
        <div class="card-panel  light-blue accent-3 z-depth-0">
          <span class="white-text  center">                
          <h6 class="light text-icons "><i class="material-icons small center">sentiment_very_satisfied</i><br> Total de Clientes Cadastrados: 
          	<?php $consulta = "SELECT COUNT(id) AS TOTAL FROM clientes";
			$resultado = mysqli_query($connect, $consulta);
			$linhas = mysqli_fetch_assoc($resultado);
			echo $linhas['TOTAL']; ?> 
		<br></h6>
          </span>
         </div>
        </div>


		<thead>
			<tr>
				<th>Nome:</th>
				<th>Sobrenome:</th>
				<th>E-mail:</th>
				<th>Idade:</th>
				<th>Sexo:</th>
			</tr>
		</thead>
		
		<tbody>
			<?php
			$sql = "SELECT *FROM clientes";
			$resultado = mysqli_query($connect,$sql);
			while($dados=mysqli_fetch_array($resultado)):

			?>
			<tr>
				<td><?php echo $dados['nome']; ?></td>
				<td><?php echo $dados['sobrenome']; ?></td>
				<td><?php echo $dados['email']; ?></td>
				<td><?php echo $dados['idade']; ?></td>
				<td><?php echo $dados['sexo']; ?></td>
				<td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</a></td>
				<td><a href="" class="btn-floating red"><i class="material-icons">delete</a></td>
			</tr>
		<?php endwhile;?>
		</tbody>
	 </table>
	 <br>
	 <a href="adicionar.php" class="btn">Adicionar Cliente</a>
   </div>
</div>

<?php
//Footer
include_once 'includes/footer.php';

?>
