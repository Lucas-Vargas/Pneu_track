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
    <title>Cadastro</title>
</head>
<body>

<?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    include_once("./crud.php");
    if (session_status() != PHP_SESSION_ACTIVE) {
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
                    <h1>Cadastro</h1>
                </div>
<!------------------------------------------------------------------------------------------------->
                <div id="input1">
                    <div class="input1div">
                        <label for="motoristaText">Motorista</label>
                        <input type="text" name="driverText" id="motoristaText" required>
                    </div>

                    <div class="input1div">
                        <label for="motoristaText">Modelo</label>
                        <input type="text" name="modeloText" id="modeloText" required>
                    </div>

                    <div class="input1div">
                        <label for="motoristaText">Placa</label>
                        <input type="text" name="placaText" id="placatext" required>
                    </div>
                </div>
<!------------------------------------------------------------------------------------------------->
                <div id="input2">
                    <div class="input2div">
                            <label for="motoristaText">Eixos</label>
                            <input type="number" id="eixoText" name="eixoText" required>                            
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Peso</label>
                        <input type="text" name="pesoText" id="pesoText" required>
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Técnico</label>
                        <input type="text" name="tecnicoText" id="tecnicoText" required>
                    </div>

                    <div class="input2div">
                        <label for="motoristaText">Data</label>
                        <input type="date" name="dateText" id="data" required>
                    </div>
                </div>
<!------------------------------------------------------------------------------------------------->

<div id="eixo">
<script>
    var myTextbox = document.getElementById('eixoText');
    var numEixos = myTextbox.value;
    myTextbox.onchange = function() {
        numEixos = document.getElementById('eixoText').value;
        let eixoCount = 0;
        for (let i = 1; i < (numEixos * 2 + 1); i++) {
            const div = document.createElement("div");
            div.classList.add("eixoSubDiv");
            div.id = `segmento-${i}`;

            const label = document.createElement("label");
            label.id = "titleEixo";

            if (i % 2 != 0) {
                eixoCount++;
            }
            label.textContent = `Pneu ${(i + 1) % 2 + 1} Eixo ${eixoCount}`;

            div.appendChild(label);

            const kmDiv = document.createElement("div");
            kmDiv.classList.add("eixoInputDiv");
            const kmLabel = document.createElement("label");
            kmLabel.setAttribute("for", "kmText");
            kmLabel.textContent = "Quilometragem";
            const kmInput = document.createElement("input");
            kmInput.setAttribute('required','');
            kmInput.type = "number";
            kmInput.classList.add("kmText");
            kmInput.name = "kmText" + i;
            kmDiv.appendChild(kmLabel);
            kmDiv.appendChild(kmInput);

            const recapDiv = document.createElement("div");
            recapDiv.classList.add("eixoInputDiv");
            const recapLabel = document.createElement("label");
            recapLabel.setAttribute("for", "recapText" + i); 
            recapLabel.textContent = "Nº de recapagens";
            const recapInput = document.createElement("input");
            recapInput.setAttribute('required','')
            recapInput.type = "number";
            recapInput.id = "recapText" + i;  
            recapInput.name = "recapText" + i; 
            recapDiv.appendChild(recapLabel);
            recapDiv.appendChild(recapInput);

            div.appendChild(kmDiv);
            div.appendChild(recapDiv);

            document.getElementById("eixo").appendChild(div);
        }
    };
</script>

</div>

<!------------------------------------------------------------------------------------------------->
                    <div id="submitDiv">
                        <input type="submit" id="subButton" name="subButton">
                    </div>
                </div>

            </div>


        </div>
    </form> 
    <?php # php openning

if (isset($_POST['subButton'])){           
    include_once "./db/config.php";
    include_once "./db/setDb.php";
    include_once "./crud.php";
            
    $crud = new Crud($db);

    $driver = $_POST['driverText'];
    $model = $_POST['modeloText'];
    $plate = $_POST['placaText'];
    $axels = $_POST['eixoText'];
    $weight = $_POST['pesoText'];
    $tecnico = $_POST['tecnicoText'];
    $date = $_POST['dateText'];

    $crud->insertTruck($driver, $model, $plate, $axels, $weight, $tecnico);
    $crud->insertManutencao($plate, $tecnico, $date);
    echo'<script>alert("enviado para o banco de dados")</script>';
    $count = 1;
    while(True){
        try{
            $km = $_POST['kmText'. $count];
            $recap = $_POST['recapText'. $count];
            if($km == "" || $km == null || $recap == "" || $recap == null){
                echo '<script type="text/javascript"> window.location.href="mainMenu.php"; </script>';
                break;
            }else{
                $crud->insertTire($km, $recap, $plate);
                $count++;
            }

        }catch(Exception $e){
            break;
        }
    }
}
            ?> <!-- php closing -->


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
<form id="mainMobile" method="post">
        <div id="mainMob">
            <!-- title div -->
            <!--input div -->
            <div id="inputs">
                <div id="inputsSubdiv">

                <div id="inputTitle">
                    <h1>Cadastro de Pneu</h1>
                </div>
<!------------------------------------------------------------------------------------------------->       
                <div id="input4">
                    <div class="input4div">
                        <label for="motoristaText">Motorista</label>
                        <input type="text" name="" id="motoristaText">
                    </div>   
                    <div class="input5div">
                        <label for="motoristaText">Modelo</label>
                        <input type="text" name="" id="modeloText" >
                    </div>     
                    <div class="input6div">
                        <label for="motoristaText">Placa</label>
                        <input type="text" name="" id="placatext" >
                    </div>
                </div>
<!------------------------------------------------------------------------------------------------->
                <div id="input5">
                    <div class="input4div">
                        <label for="motoristaText">Eixos</label>
                        <input type="text" name="" id="eixoTextMob">
                    </div>        
                    <div class="input5div">
                        <label for="motoristaText">Peso</label>
                        <input type="text" name="" id="pesoText">
                    </div>    
                </div>
                <div id="input6">    
                    <div class="input4div">
                        <label for="motoristaText">Técnico</label>
                        <input type="text" name="" id="tecnicoText">
                    </div>        
                    <div class="input5div">
                        <label for="motoristaText">Data</label>
                        <input type="datetime" name="" id="data" >
                    </div>
                </div>  
<!------------------------------------------------------------------------------------------------->
<div id="eixoMobile">
<script>
    var myTextbox = document.getElementById('eixoTextMob');
    var numEixos = myTextbox.value;
    myTextbox.onchange = function() {
        numEixos = myTextbox.value;
        let eixoCount = 0;
        for (let i = 1; i < (numEixos * 2 + 1); i++) {
            const div = document.createElement("div");
            div.classList.add("eixoSubDiv");
            div.id = `segmento-${i}`;

            const label = document.createElement("label");
            label.id = "titleEixo";

            if (i % 2 != 0) {
                eixoCount++;
            }
            label.textContent = `Pneu ${(i + 1) % 2 + 1} Eixo ${eixoCount}`;

            div.appendChild(label);

            const kmDiv = document.createElement("div");
            kmDiv.classList.add("eixoInputDiv");
            const kmLabel = document.createElement("label");
            kmLabel.setAttribute("for", "kmText");
            kmLabel.textContent = "Quilometragem";
            const kmInput = document.createElement("input");
            kmInput.setAttribute('required','');
            kmInput.type = "number";
            kmInput.classList.add("kmText");
            kmInput.name = "kmText" + i;
            kmDiv.appendChild(kmLabel);
            kmDiv.appendChild(kmInput);

            const recapDiv = document.createElement("div");
            recapDiv.classList.add("eixoInputDiv");
            const recapLabel = document.createElement("label");
            recapLabel.setAttribute("for", "recapText" + i); 
            recapLabel.textContent = "Nº de recapagens";
            const recapInput = document.createElement("input");
            recapInput.setAttribute('required','')
            recapInput.type = "number";
            recapInput.id = "recapText" + i;  
            recapInput.name = "recapText" + i; 
            recapDiv.appendChild(recapLabel);
            recapDiv.appendChild(recapInput);

            div.appendChild(kmDiv);
            div.appendChild(recapDiv);

            document.getElementById("eixoMobile").appendChild(div);
        }
    };
</script>
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
</body>
</html>