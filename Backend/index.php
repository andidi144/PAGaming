<?php
 session_start();

require_once("Modul.php");

isseteinfuegen();
issetersetzen();
issetentfernen();
issethersteller();
issetherstellerentfernen();
issetbenutzerentfernen();
issetkategorieentfernen();
issetkategorieeintrag();
issetkomiloeschform();


?>

<!DOCTYPE html>
<html>

<head>
    <title>PAGaming Backend</title>

    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>

    <link href="backend.css" type="text/css" rel="stylesheet"/>
</head>

    <?php
        
        $site=filter_input(INPUT_GET, "site", FILTER_SANITIZE_SPECIAL_CHARS);
        switch ($site){
            case'':
                
                issetlogin();
                loginform();
                loginpruefung();
                break;

            case'Backend':
                
                loginpruefung();               
                hintergrund_backend(); 
                session();
                Titel();
                menu();

                
                break;

            case'p-hinzufuegen':
                ?>
                <div id="begg">
                <a href="index.php?site=egg"><img  src="schwarz.jpg" alt="Selfhtml" width="1px" height="1px"></a>
                </div>
                <?php
                hintergrund_hinzufügen();
                session();
                Titel();
                menu();
                addform();

                break;

            case'egg':
                oschterei();
                session();
                break;

            case'p-entfernen':
                hintergrund_entfernen();
                session();
                Titel();
                menu();
                loeschform();
                break;

            case'p-bearbeiten':
                hintergrund_bearbeiten();
                session();
                Titel();
                menu();
                ersetzenform();
                break;
                
            case'h-hinzufuegen':
                hintergrund_herstellerhinzufuegen();
                session();
                Titel();
                menu();
                addformh();
                break;
                
            case'h-entfernen':
                hintergrund_herstellerloeschen();
                session();
                Titel();
                menu();
                herstellerloeschform();
                break;
                
            case'b-entfernen':
                hintergrund_user();
                session();
                Titel();
                menu();
                benutzerloeschform();
                break;
                
            case'k-hinzufuegen':
                hintergrund_kategoriehinzufuegen();
                session();
                Titel();
                menu();
                addformk();
                break;
                
            case'k-entfernen':
                hintergrund_kategorieentfernen();
                session();
                Titel();
                menu();
                kategorieloeschform();
                break;
            case'kom-entfernen':
                hintergrund_user();
                session();
                Titel();
                menu();
                kommentarloeschform(); 
       }

     ?>
</html>