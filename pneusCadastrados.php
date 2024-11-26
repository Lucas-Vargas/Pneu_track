<?php
include_once("./db/config.php");
include_once("./db/setDb.php");
include_once("./crud.php");

if (session_status() != PHP_SESSION_ACTIVE) {
  session_start();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css\stylePneusCadastrados.css">
  <title>Caminhões
  </title>
</head>

<script>
  function myFunction() {
    let text;
    if (confirm("Você realmente deseja apagar este item? serão apagados todos os pneus relacionados!") == true) {

    } else {
      location.href = 'pneusCadastrados.php';
    }
    document.getElementById("demo").innerHTML = text;
  }
</script>


<body>

  <div class="mainPc">
    <header>
      <nav>
        <a href="mainMenu.php"><button class="botoes">
            <p>Menu</p>
          </button></a>
        <a href="logout.php"><button class="botoes">
            <p>Sair</p>
          </button></a>
      </nav>
    </header>


    <main id="container-truck">



      <?php
      if ($_SESSION['admin'] == 1) {
        //echo'<script>alert("'. $_SESSION['admin'] .'")</script>';
        $crud = new Crud($db);
        $result = $crud->readPneus();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='trucks'>";
          echo "<h1 class='titulo'>Placa<h2>" . $row['plate'] . "</h1></h2>";
          echo "<h1 class='titulo'> Modelo <h2>" . $row['model'] . "</h1></h2>";
          echo "<div class='btnsTruck'>";
          echo "<td><a href='editar.php?id=" . $row['plate'] . "'>Editar</a> |
          <td><a href='historico.php?plate=" . $row['plate'] . "'>Histórico</a> |
         <a  href='deletarTruck.php?plate=" . $row['plate'] . "' class='delete';>Deletar</a></td>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        $crud = new Crud($db);
        $result = $crud->readPneus();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

          echo "<div class='trucks'>";
          echo "<h1 class='titulo'>Placa<h2>" . $row['plate'] . "</h1></h2>";
          echo "<h1 class='titulo'> Modelo <h2>" . $row['model'] . "</h1></h2>";
          echo "<div class='btnsTruck'>";
          echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a></td>";
          echo "</div>";

          echo "</div>";
        }
      };


      function data($data)
      {
        $f = explode("-", $data); //Gera um array com 0 = ano, 1 = mês, 2 = dia
        $g = $f[2] . "/" . $f[1] . "/" . $f[0]; //Isso é uma string. Formate-a como quiser
        return $g;
      }
      ?>



    </main>

  </div>


  <div class="mainMobile">
    <header>
      <nav>
        <a href="mainMenu.php"><button class="botoes">
            <p>Menu</p>
          </button></a>
        <a href="logout.php"><button class="botoes">
            <p>Sair</p>
          </button></a>
      </nav>
    </header>


    <main id="container-truck">



      <?php
      if ($_SESSION['admin'] == 1) {
        $crud = new Crud($db);
        $result = $crud->readPneus();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "<div class='trucks'>";
          echo "<h1 class='titulo'>Placa<h2>" . $row['plate'] . "</h1></h2>";
          echo "<h1 class='titulo'> Modelo <h2>" . $row['model'] . "</h1></h2>";
          echo "<div class='btnsTruck'>";
          echo "<td><a href='editar.php?id=" . $row['plate'] . "'>Editar</a> |
          <td><a href='historico.php?id=" . $row['plate'] . "'>HIstórico</a> |
     <a  href='deletarTruck.php?plate=" . $row['plate'] . "' class='delete';>Deletar</a></td>";
          echo "</div>";

          echo "</div>";
        }
      } else {
        $crud = new Crud($db);
        $result = $crud->readPneus();


        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {


          echo "<div class='trucks'>";
          echo "<h1 class='titulo'>Placa<h2>" . $row['plate'] . "</h1></h2>";
          echo "<h1 class='titulo'> Modelo <h2>" . $row['model'] . "</h1></h2>";
          echo "<div class='btnsTruck'>";
          echo "<td><a href='editar.php?id=" . $row['id'] . "'>Editar</a></td> |
          <td><a href='historico.php?id=" . $row['plate'] . "'>HIstórico</a> |";
          echo "</div>";

          echo "</div>";
        }
      };
      ?>


    </main>

  </div>
</body>

</html>