 <?php
session_start();
/**
 *
 * User: betschaa
 * Date: 06.07.2015
 * Time: 08:47
 */

require_once("modules.php");
$site=filter_input(INPUT_GET, "site", FILTER_SANITIZE_SPECIAL_CHARS);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
        <meta charset="utf-8" />
        <title>Modul 307</title>
        <link rel="stylesheet" href="responsive.css" />
    </head>
    <body <?php if($site == "LEL"){echo"id = \"LEL\" ";} ?>>
    <header>
        <a href="index.php"> <div class="logo"></div> </a>
        <?php
            if(isset($_SESSION['$username'])){
                echo /*"<form action=\"index.php?site=Login\" method=\"post\" id=\"logindiv\">
                <input type=\"submit\" name=\"logoutsubmit\" value=\"Ausloggen\" class=\"myButton\" />
                </form>";*/
                "<a href=\"index.php?site=Login&logoutsubmit=Asloggen\" class=\"myButton\">Ausloggen</a>";
            }
            else{
                echo /*"<form action=\"index.php?site=Login\" method=\"post\" id=\"logindiv\"  class=\"myButton\"  />
                <input type=\"submit\" name=\"loginsubmit\" value=\"Einloggen\"/>
                </form>";*/
                "<a href=\"index.php?site=Login&loginsubmit=Einloggen\" class=\"myButton\">Einloggen</a>";
            }

        ?>

        <nav>
            <a href="index.php?site=Maus"><div id="Mause" class="Kategorien <?php if($site == "Maus"){echo"active";} ?> " ></div> </a>
            <a href="index.php?site=Tastatur"><div id="Tastaturen" class="Kategorien <?php if($site == "Tastatur"){echo"active";}?>" ></div></a>
            <a href="index.php?site=Mousepad"><div id="Mousepads" class="Kategorien <?php if($site == "Mousepad"){echo"active";}?>" ></div></a>
            <a href="index.php?site=Headset"><div id="Headsets" class="Kategorien <?php if($site == "Headset"){echo"active";} ?>" ></div></a>
            <a href="index.php?site=Controller"><div id="Controller" class="Kategorien <?php if($site == "Controller"){echo"active";} ?>" ></div></a>
            <a href="index.php?site=Accesoires"><div id="Accesoires" class="Kategorien <?php if($site == "Accesoires"){echo"active";} ?>" ></div></a>
        </nav>
    </header>
            <main>
                <section>
                    <?php
                        site();
                   ?>
                </section>
            <footer><a href="index.php?site=rechte" class="footer">&copy; 2015 PAGaming</a></footer>
            </main>

    </body>
</html>