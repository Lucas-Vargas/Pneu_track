<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- poppins font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleMainMenu.css">
    <title>Login Screen</title>
</head>

<body>

    <?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    include_once("./crud.php");
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    ?>


    <!--              Desktop HTML                 -->
    <div id="containerMain">
        <div id="mainPc">
            <!-- title div -->
            <div id="title">
                <img id="pneu_home" src="./img/pneu_homescreen.png" alt="">
                <nobr>
                    <h1 class="titleText" id="mainTitle">Pneu track</h1> </br>
                    <h2 class="titleText" id="subtitle">Gestão de Pneus</h2>
                </nobr>
            </div>
            <!--input div -->
            <div id="container">
                <div id="menu">

                    <a href="perfil.php"><button class="btnMenu">
                            <h1>Perfil</h1>
                        </button></a>

                    <a href="home.php"><button class="btnMenu">
                            <h1>Cadastrar manutenção</h1>
                        </button></a>

                    <a href="pneusCadastrados.php"><button class="btnMenu">
                            <h1>lista de manutenções</h1>
                        </button></a>

                    <a href="logout.php"><button class="btnMenu">
                            <h1>Sair</h1>
                        </button></a>


                </div>

            </div>

            <?php # php openning



            ?> <!-- php closing -->


        </div>
    </div>


    <!--
╭━━━━-╮
╰┃ ┣▇━▇
 ┃ ┃  ╰━▅╮ 
 ╰┳╯ ╰━━┳╯
  ╰╮ ┳━━╯      DEIXA YASUO OPEN
 ▕▔▋ ╰╮ ╭━╮ RAPAZIADA TMJ 
╱▔╲▋╰━┻┻╮╲╱▔▔▔▔▔╲
▏  ▔▔▔▔▔▔▔  O O┃ 
╲╱▔╲▂▂▂▂╱▔╲▂▂▂╱
 ▏╳▕▇▇▕ ▏╳▕▇▇▕
 ╲▂╱╲▂╱    ╲▂╱╲▂╱    
-->


    <!---              Mobile HTML-                -->


    <div id="containerMobile">

        <!-- title div -->
        <div id="title">
            <img id="pneu_home" src="./img/pneu_homescreen.png" alt="">
            <nobr>
                <h1 class="titleText" id="mainTitle">Pneu track</h1> </br>
                <h2 class="titleText" id="subtitle">Gestão de Pneus</h2>
            </nobr>
        </div>
        <!--input div -->
        <div id="container">
            <div id="menu">

                <a href="perfil.php"><button class="btnMenu">
                        <h1>Perfil</h1>
                    </button></a>

                <a href="home.php"><button class="btnMenu">
                        <h1>Cadastrar manutenção</h1>
                    </button></a>

                <a href="pneusCadastrados.php"><button class="btnMenu">
                        <h1>lista de manutenções</h1>
                    </button></a>

                <a href="logout.php"><button class="btnMenu">
                        <h1>Sair</h1>
                    </button></a>


            </div>

        </div>



</body>

</html>