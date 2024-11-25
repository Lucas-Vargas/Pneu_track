<?php
include_once("./db/config.php");
include_once("./db/setDb.php");
include_once("./crud.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $plate = $_POST['plate'];
    $crud = new Crud($db);
    $result = $crud->removerTruck($plate);


    echo "<script> alert('Caminhão excluído com sucesso.'); </script>";
    echo "<script> location.href='pneusCadastrados.php'; </script>";
    
      
} 
  
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css\deletarTruck.css">
	<title>Excluir</title>
</head>

<body>

	<div id="conteudo">

		<form id="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<h1>Excluir Caminhão</h1>
			<p>Tem certeza que deseja excluir esse caminhão do programa?</p>
			<input id="id" type="hidden" name="plate" value="<?php echo $_GET['plate']  ?>">

			<input class="botoes" id="btn-excluir" type="submit" name="submit" value="Excluir">
			<input class="botoes" sid="Menu" type="button" onclick="location.href='pneusCadastrados.php'" Value="Cancelar">
		</form>

	</div>
</body>
