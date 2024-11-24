<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- poppins font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style2.css">
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
    <form id="formMainPc" method="post">
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
            <div id="inputs">
                <div id="inputsSubdiv">

                <div id="inputTitle">
                    <h1>Cadastro de Pneu</h1>
                </div>
<!------------------------------------------------------------------------------------------------->
                <div id="input1">
                    <div class="input1div">
                        <label for="motoristaText">Motorista</label>
                        <input type="text" name="" id="motoristaText">
                    </div>

                    <div class="input1div">
                        <label for="motoristaText">Modelo</label>
                        <input type="text" name="" id="modeloText" >
                    </div>

                    <div class="input1div">
                        <label for="motoristaText">Placa</label>
                        <input type="text" name="" id="placatext" >
                    </div>
                </div>
<!------------------------------------------------------------------------------------------------->
                <div id="input2">
                    <div class="input2div">
                        <label for="motoristaText">Eixos</label>
                        <input type="text" name="" id="eixoText">
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Peso</label>
                        <input type="text" name="" id="pesoText">
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Técnico</label>
                        <input type="text" name="" id="tecnicoText">
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Data</label>
                        <input type="datetime" name="" id="data" >
                    </div>
                </div>
<!------------------------------------------------------------------------------------------------->
            <div id="eixo">
                <?php for ($i = 0; $i < 15; $i++) { ?>
                    <div class="eixoSubDiv" id='<?php echo $i ?>'>
                        <?php ?>

                        <label id="titleEixo">Pneu 1 Eixo 1</label>

                        <div id="kmTextDiv" class="eixoInputDiv">
                            <label for="kmText">Quilometragem</label>
                            <input type="number" name="" id="kmText">
                        </div>

                        <div id="recapTextDiv" class="eixoInputDiv">
                            <label for="recapText">Nº de recapagens</label>
                            <input type="number" name="" id="recapText">
                        </div>
                    </div>
                <?php } ?>
</div>
<!------------------------------------------------------------------------------------------------->
                    <div id="submitDiv">
                        <input type="submit" id="subButton" name="subButton">
                    </div>
                </div>

            </div>

            <?php # php openning
            
                

            ?> <!-- php closing -->


        </div>
    </form>


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
    <div id="mainMobile">
        <div id="mainText">
            <p>Welcome Mobile user!</p>
        </div>
    </div>
    
</body>
</html>