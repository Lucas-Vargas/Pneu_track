<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- poppins font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Screen</title>
</head>
<body>

<?php
    include_once("./db/config.php");
    include_once("./db/setDb.php");
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
?>


<!--              Desktop HTML                 -->
    <form id="formMainPc" method="post">
        <div id="mainPc">
            <div id="mainText">
               <p>Welcome PC user!</p>
            </div>
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
                    <img src="./img/profileImg.png" alt="" id="inputImg">
                    <div class="textarea" id="textarea1">
                    <p id="login">Login</p>
                        <input type="text" name="loginText" id="login" class="inputText" placeholder="Insira seu E-mail">
                    </div>
                    <div class="textarea">
                        <p id="pass">Senha</p>
                        <input type="text" name="passwordText" id="password" class="inputText" placeholder="Insira sua Senha">
                    </div>
                    <div id="submitDiv">
                        <input type="submit" id="subButton" name="subButton">
                    </div>
                </div>

            </div>

            <?php # php openning
        
            if (isset($_POST['subButton'])){           #
                if($_POST['loginText'] != ""){         # Checking if the textboxes are filled
                    if($_POST['passwordText'] != ""){  #
                        #write the code here
                        



                    }else{                                                          #
                        echo '<script>alert("Favor inserir sua senha");</script>';  #
                    }                                                               # Popping a message if 
                }else{                                                              # the boxes aren't filled
                    echo '<script>alert("Favor inserir seu e-mail");</script>';     #
                }                                                                   #
            }
            

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