<?php
require_once("modules.php");
session_start();
issetregister();
issetbewertungeintrag();
date_default_timezone_set("Europe/Berlin");
/**********************
 * User: betschaa     *
 * Date: 06.07.2015   *
 * Time: 08:47        *
 **********************/

require_once("modules.php");
$site=filter_input(INPUT_GET, "site", FILTER_SANITIZE_SPECIAL_CHARS);
 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
        <meta charset="UTF-8"" />
        <title>PAGaming</title>
        <link rel="stylesheet" href="responsive.php" />
        <script src="script.js"></script>
    </head>
    <body <?php if($site == "LEL"){echo"id = \"LEL\" ";} 
    
    filtercases();
    
    ?>> 
        <header>
            <a href="index.php"> <div class="logo"></div> </a>
                <div class="suchposition">
                </div>
                <?php 
                if(isset($_SESSION['$username'])){
                    echo 
                    "   <a href=\"index.php?site=Login&logoutsubmit=Ausloggen\" id=\"log\" class=\"buttons\">Ausloggen</a><br />
                        <a href=\"index.php?site=Warenkorb\"><div class=\"Warenkorbbutton\"></div></a>";
                }
                else{
                    echo 
                    "   <a href=\"index.php?site=Login&loginsubmit=Einloggen\" id=\"log\" class=\"buttons\">Einloggen</a>";  
                }
            nav();
            ?>
                
            
        </header>
        <main>
            <section>
                <?php 
                    site();  
                ?>
                       
            </section>
            <footer>
                <a href="?site=Kontakt" id="impressum">Kontakt</a>
                <a href="index.php?site=rechte" class="footer">&copy; 2015 PAGaming</a>
                <?php
                if(isset($_SESSION['$username'])){ ?>
                    <img id="fbfeld" src="facebook-grau.png" height="auto" width="2%" />
                    <img id="twfeld" src="twitter_grau.png" height="auto" width="2%" />
                    <img id="wafeld" src="Whatsapp-grau.png" height="auto" width="2%" />
                    <img id="instafeld" src="Instagrau.png" height="auto" width="2%" />
                <?php
                }
                ?>
            </footer>
        </main>    
    </body>        
</html>