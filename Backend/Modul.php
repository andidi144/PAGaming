<?php
/*-------------------Log In funktion--------------------------------*/

    function loginform(){
        ?>
        <body class="login">
            <div id="login" >
                <form action="index.php" method="post">
                    Benutzername: <input type="text" name="username" class="abstand"/><br /><br />
                    Passwort: <input type="password" name="password" class="abstand"/><br /><br />
                    <input type="submit" name="loginbutton" value="LogIn"/>  
                </form>
            </div>
        </body>    
        <?php 
        }
        
/*-------------------Hintergrund des Backends-----------------------*/
        
    function hintergrund_backend(){
        ?>
        <body class="bgbackend"></body>        
        <?php 
    }

/*-------------------Hintergrund des hinzufügen---------------------*/

    function hintergrund_hinzufügen(){
        ?>
        <body class="bghinzufuegen"></body>
        <?php    
    }

/*-------------------Hintergrund des herstellers--------------------*/

    function hintergrund_hersteller(){
        ?>
        <body class="bghersteller"></body>
        <?php    
        
    }    
/*-------------------Hintergrund des entfernen----------------------*/
    
    function hintergrund_entfernen(){
        ?>
        <body class="bgentfernen"></body>
        <?php    
    }
    
/*-------------------Hintergrund des bearbeiten---------------------*/
    
    function hintergrund_bearbeiten(){
        ?>
        <body class="bgbearbeiten"></body>
        <?php   
    }
    
/*-------------------Hintergrund des user---------------------------*/
    
    function hintergrund_user(){
        ?>
        <body class="bguser"></body>
        <?php   
    }
    
/*-------------------Hintergrund des user---------------------------*/

    function hintergrund_herstellerhinzufuegen(){
        ?>
        <body class="bgherstellerhinzufuegen"></body>
        <?php
    }
    
/*-------------------Hintergrund des user---------------------------*/

    function hintergrund_herstellerloeschen(){
        ?>
        <body class="bgherstellerentfernen"></body>
        <?php
    }
    
/*-------------------Hintergrund des user---------------------------*/

    function hintergrund_kategoriehinzufuegen(){
        ?>
        <body class="bgkategoriehinzufuegen"></body>
        <?php
    }
    
/*-------------------Hintergrund des user---------------------------*/

    function hintergrund_kategorieentfernen(){
        ?>
        <body class="bgkategorieentfernen"></body>
        <?php
    }
        
/*-------------------Menu (Navigation)------------------------------*/
    
    function menu(){
        ?>
        
        <nav class="navigation">            
            <ul  class="nav">
                <li><a>Produkteverwaltung</a>
                    <ul>
                        <li><a href="index.php?site=p-hinzufuegen">Produkt hinzuf&uuml;gen</a></li>
                        <li><a href="index.php?site=p-entfernen">Produkt entfernen</a></li>
                        <li><a href="index.php?site=p-bearbeiten">Produkt bearbeiten</a></li>
                    </ul>
                </li>
                    <li><a>Benutzerverwaltung</a>
                        <ul>
                            <li><a href="index.php?site=b-entfernen">Benutzer l&ouml;schen</a></li>
                        </ul>
                    </li>
                    <li><a>Herstellerverwaltung</a>    
                        <ul>
                            <li><a href="index.php?site=h-hinzufuegen">Hersteller hinzuf&uuml;gen</a></li>
                            <li><a href="index.php?site=h-entfernen">Hersteller entfernen</a></li>
                        </ul>
                    </li>
                    <li><a>Kategorieverwaltung</a>
                        <ul>
                            <li><a href="index.php?site=k-hinzufuegen">Kategorie hinzuf&uuml;gen</a></li>
                            <li><a href="index.php?site=k-entfernen">Kategorie entfernen</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?site=kom-entfernen">Kommentarverwaltung</a>
                    </li>
                    <li><a href="index.php?logoutsubmit=true">LogOut</a>
                    </li>                                                         
                     
                         
            </ul>
        </nav>    
        <?php  
    }        
    
/*-------------------Formular (hinzufuegen)-------------------------*/

    function addform(){
        ?>  
        <form class="hinzufuegen" action="index.php?site=p-hinzufuegen" method="post" enctype="multipart/form-data">
            Produktname: <input type= "text" name="p-name" class="abstand2" required/><br /><br />
            Preis: <input type= "text" name="p-preis" class="abstand2" required/><br /><br />
            Kategorie: <input type= "text" class="abstand2" name="p-kategorie" required/><br /><br />
            Hersteller: <input type= "text" class="abstand2" name="p-hersteller" required/><br /><br />    
            Beschreibung: <input type= "textarea" name="p-beschreibung" class="abstand2" required/><br /><br />
            Bild: <input type="file" name="bild" id="bild" class="abstand2" accept="image/*" /><br /><br />
            <input type="submit" name="button"/>  
        </form>
      <?php         
    } 
 
/*-----------------Formular (hinzufuegen hersteller)----------------*/

    function addformh(){
        ?>
        <form class="hinzufuegen" action="index.php?site=h-hinzufuegen" method="post">
            Namen eines neuen Herstellers: <input type= "text" name="h-hersteller" class="abstand2" required/><br /><br /> 
            <input type="submit" name="button-hersteller"/>
        </form>
      <?php
    }
  
  /*-----------------isset für einfügen von Hersteller--------------*/

    function issethersteller(){

            if(isset ($_POST['button-hersteller'])){
                $hersteller = $_POST['h-hersteller'];
                if(herstellereintragen ($hersteller) == true){
                    echo "Sie haben den Hersteller hinzugef&uuml;gt ";
                }
                else{
                    echo "Sie haben einen Fehler";
                }
            }
        }
    
    
/*------------------Hersteller eintragen----------------------------*/        
    
    function herstellereintragen($hersteller){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
                $result = mysqli_query($verbindung, "SELECT * FROM hersteller WHERE Hersteller LIKE '$hersteller'");
                $menge = mysqli_num_rows($result);
    
                if($menge == 0)
                {

                    $eintrag = "INSERT INTO hersteller (Hersteller) VALUES ('$hersteller')";
                    $eintragen = mysqli_query($verbindung, $eintrag);
    
                    if($eintragen == true)
                    {
                        return true;
                    }
                    else
                    {
                       echo "Fehler1";
    
                    }
                }
    
                else
                {
                  echo "Fehler2";
                }
    
            }
    
/*-------------------------------Titel------------------------------*/

    function Titel(){
        ?>
        <div class="header">
        Le Backend de la site
        </div>
        <?php 
    }    
      
     
/*-------------------------------Egg--------------------------------*/

    function Oschterei(){
        ?>
        <body id="egg">
        Du hesch es oschterei gfunde h&auml;rtzlichi gratulation!!!!!
        </body> 
        <?php  
    }
    
    
/*-------------------------Datenbank eintragen----------------------*/    

    function eintragen($productname, $preis, $kategorie, $hersteller, $beschreibung){
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $result = mysqli_query($verbindung, "SELECT * FROM produkt WHERE Produktname LIKE '$productname'");
            $menge = mysqli_num_rows($result);
            if($menge == 0)
            {
                $ergebniskategorie = mysqli_query($verbindung, "SELECT KategorieID FROM kategorie WHERE Kategorie LIKE '$kategorie' LIMIT 1");
                $arraykategorie=mysqli_fetch_array($ergebniskategorie, MYSQLI_NUM);
                $kategorieID=$arraykategorie[0];
                
                $ergebnishersteller = mysqli_query($verbindung, "SELECT HerstellerID FROM hersteller WHERE Hersteller LIKE '$hersteller' LIMIT 1");
                $arrayhersteller=mysqli_fetch_array($ergebnishersteller, MYSQLI_NUM);
                $herstellerID=$arrayhersteller[0];
                
                        $target_dir = "C:/xampp/htdocs/WebshopNF/Webshopnew/Produktbilder";
                        $target_file = $target_dir . $productname . ".jpg";
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        // Check if image file is a actual image or fake image
                        if(isset($_POST["submit"])) {
                            $check = getimagesize($_FILES["bild"]["tmp_name"]);
                            if($check !== false) {
                                echo "Datei ist ein Bild - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "Datei ist kein Bild.";
                                $uploadOk = 0;
                            }
                        }
                        // Check if file already exists
                        if (file_exists($target_file)) {
                            echo "Sorry, Datei existiert bereits.";
                            $uploadOk = 0;
                        }
                        // Check file size
                        if ($_FILES["bild"]["size"] > 500000) {
                            echo "Sorry, die Datei ist zu gross.";
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                            echo "Sorry, nur JPG, JPEG, PNG & GIF Dateien sind erlaubt.";
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "Sorry, wir konnten deine Datei nicht uploaden.";
                        // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["bild"]["tmp_name"], $target_file)) {
                                echo "The file ". basename( $_FILES["bild"]["name"]). " wurde hochgeladen.";
                            } else {
                                echo "Sorry, es gab einen Fehler beim upload deiner Datei.";
                            }
                        }
                
                $bild = $productname . ".jpg";
                $eintrag = "INSERT INTO produkt (Produktname, Preis, KategorieID, HerstellerID, Beschreibung, Bild ) VALUES ('$productname', '$preis', '$kategorieID', '$herstellerID', '$beschreibung', '$bild')";
                $eintragen = mysqli_query($verbindung, $eintrag);
    
                if($eintragen == true)
                {     
                    return true;
                }
                else
                {
                   echo "Fehler1";
                   
                } 
            }
            
            else
            {
              echo "Fehler2";
            }
            
        }

/*---------------Formular (entfernen von Produkten)-----------------*/

    function loeschform(){
        ?>
        <form class="p-entfernen" action="index.php?site=p-entfernen" method="post">
            Produktname: <input type= "text" name="p-name" class="abstand2" required/><br /><br />
            <input type="submit" name="button-entfernen" value="Entfernen"/>
        </form>
      <?php
    }
    
/*----------------------Datensatz entfernern------------------------*/

    function loeschen($productname){
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $loeschen = "DELETE  FROM produkt WHERE Produktname = '$productname'";
        $loesch = mysqli_query($verbindung, $loeschen);
        
        if($loesch == true)
                {
                    return true;
                }
                else
                {
                   echo "Fehler";

                }
    }
    
/*-----------------isset für einfügen von datensätzen---------------*/
    
    function isseteinfuegen(){
     
        if(isset ($_POST['button'])){
            $productname = $_POST['p-name'];
            $preis =  $_POST['p-preis'];
            $kategorie = $_POST['p-kategorie'];
            $hersteller = $_POST['p-hersteller'];
            $beschreibung = $_POST['p-beschreibung'];
        
        
            if(eintragen ($productname, $preis, $kategorie, $hersteller, $beschreibung) == true){
                echo "Sie haben das Produkt hinzugef&uuml;gt ";
            }
            else{
                echo "Sie haben einen Fehler";
            }
        }
    }
    
/*-----------------isset für entfernen von datensätzen--------------*/        
 
    function issetentfernen(){

        if(isset ($_POST['button-entfernen'])){
            $productname = $_POST['p-name'];
            
            if(loeschen($productname) == true){
                echo "Sie haben das Produkt entfernt ";
            }
            else{
                echo "Sie haben einen Fehler";
            }
        }
    }


/*---------------------Benutzer lösch form--------------------------*/ 

    function benutzerloeschform(){
            ?>
            <form class="b-entfernen" action="index.php?site=b-entfernen" method="post">
                Benutzername: <input type= "text" name="b-name" class="abstand2" required/><br /><br />
                <input type="submit" name="button-b-entfernen" value="Entfernen"/>
            </form>
          <?php
        }        
        
/*---------------------Benutzer löschen-----------------------------*/

    function benutzerloeschen($username){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $benutzerloeschen = "DELETE FROM benutzer WHERE Username = '$username'";
            $benutzerloesch = mysqli_query($verbindung, $benutzerloeschen);
    
            if($benutzerloesch == true)
                    {
                        return true;
                    }
                    else
                    {
                       echo "Fehler";
    
                    }
        }

/*-----------------isset für entfernen von Benutzern----------------*/

    function issetbenutzerentfernen(){    
            if(isset ($_POST['button-b-entfernen'])){
                $username = $_POST['b-name'];
    
                if(benutzerloeschen($username) == true){
                    echo "Sie haben den User entfernt ";
                }
                else{
                    echo "Sie haben einen Fehler";
                }
            }
        } 
        
/*----------------------------Login---------------------------------*/ 

    function login($username, $password){
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $abfrage = "SELECT Username, Passwort FROM benutzer WHERE Username LIKE '$username' LIMIT 1";
        $ergebnis = mysqli_query($verbindung, $abfrage);
        if(mysqli_num_rows($ergebnis) != 0){
            $row = mysqli_fetch_object($ergebnis);
            if(password_verify ($password, $row->Passwort))
            {
                $_SESSION['$username'] = $username;
                return true;
    
            }
            else
            {
                 echo"NENENE";
            }
        }
    }

/*----------------------------Session-------------------------------*/  

    function session(){
    ?>
    <div id="loginbutton">
    <?php
        if(isset($_SESSION['$username'])){
            }
            else{
                header("Location: index.php");
            }
            ?>
            </div>
            <?php
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   

/*-------------------------Isset Login------------------------------*/
        
    function issetlogin(){      
                if(isset($_GET['logoutsubmit'])){
                    unset($_SESSION['$username'] );
                    session_unset();
                    session_destroy();
                    header("Location: index.php");
                    }
    }
       
/*--------------------überprüfung login-----------------------------*/
    
    function loginpruefung(){    
        if(isset ($_POST['loginbutton'])){
            $user = $_POST['username'];
            $password =  $_POST['password'];

            if(login($user, $password) == true){
                echo "Sie sind eingeloggt als " . $user ;
                header("Location: index.php?site=Backend");
            }
            else{
                
                echo "Sie haben ein falsches Passwort oder einen falschen Username eingegeben </br></br>";
            }
        }
    }       
      
/*-------------------Produkt bearbeiten Formular--------------------*/

    function ersetzenform(){
        ?>
        <form class="hinzufuegen" action="index.php?site=p-hinzufuegen" method="post">
            Derzeitiger Produktname: <input type= "text" name="p-namenow" class="abstand2" required/><br /><br /><br /><br />
            Produktname: <input type= "text" name="p-nameersetzen" class="abstand2" required/><br /><br />
            Preis: <input type= "text" name="p-preisersetzen" class="abstand2" required/><br /><br />
            Kategorie:
            <select class="abstand2" name="p-kategorieersetzen">
                <option value="Maus">Maus</option>
                <option value="Headset">Headset</option>
                <option value="Tastaturen">Tastaturen</option>
                <option value="Mauspads">Mauspads</option>
                <option value="Controller">Controller</option>
                <option value="Accesoires">Accesoires</option>
            </select><br /><br />
            Hersteller: <input type= "text" name="p-herstellerersetzen" class="abstand2" required/><br /><br />
            Beschreibung: <input type= "textarea" name="p-beschreibungersetzen" class="abstand2" required/><br /><br />
            <input type="submit" name="ersetzenbutton" value="Ersetzen"/>
        </form>
        <?php
    } 

/*------------------bearbeiten isset--------------------------------*/
    
    function issetersetzen(){
        if(isset ($_POST['ersetzenbutton'])){
            $derzeitigerproductname = $_POST['p-namenow'];
            $newproductname= $_POST['p-nameersetzen'];
            $newpreis =  $_POST['p-preisersetzen'];
            $newbeschreibung = $_POST['p-beschreibungersetzen'];
            
            if(ersetzen ($derzeitigerproductname, $newproductname, $newpreis, $newbeschreibung) == true){
                echo "Sie haben das Produkt bearbeitet";
            }
            else{
                echo "Sie haben einen Fehler";
            }    
        }
    }
    
/*------------------Produkt bearbeiten------------------------------*/

    function ersetzen($derzeitigerproductname, $newproductname, $newpreis, $newbeschreibung){
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $result = mysqli_query($verbindung, "SELECT * FROM produkt WHERE Produktname LIKE '$derzeitigerproductname'");
            $menge = mysqli_num_rows($result);

            if($menge == 1){
                $eintrag = "UPDATE produkt Set Produktname='$newproductname', Preis='$newpreis', Beschreibung ='$newbeschreibung' Where Produktname='$derzeitigerproductname'";
                $eintragen = mysqli_query($verbindung, $eintrag);
    
                    if($eintragen == true)
                    {
                            echo "DINGDINGDING";
                            return true;
                    }
                    else
                    {
                        echo "Fehler1";    
                    }

            }
            else 
            {
                echo "Fehler2";    
            }
        }

/*----------------Hersteller löschform------------------------------*/

    function herstellerloeschform(){
    ?>
        <form class="p-entfernen" action="index.php?site=h-entfernen" method="post">
            Hersteller: <input type= "text" name="h-name" class="abstand2" required/><br /><br />
            <input type="submit" name="button-h-entfernen" value="Entfernen"/>
        </form>    
    <?php    
    }
            
/*-----------------Hersteller loeschen------------------------------*/ 

    function herstellerloeschen($hersteller){
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $loeschen = "DELETE FROM hersteller WHERE Hersteller = '$hersteller'";
        $loesch = mysqli_query($verbindung, $loeschen);

        if($loesch == true)
                {
                    return true;
                }
                else
                {
                   echo "Fehler";

                }
    } 
    
/*------------------Hersteller entfernen isset----------------------*/

    function issetherstellerentfernen(){

        if(isset ($_POST['button-h-entfernen'])){
            $hersteller = $_POST['h-name'];

            if(herstellerloeschen($hersteller) == true){
                echo "Sie haben den Hersteller entfernt";
            }
            else{
                echo "Sie haben einen Fehler";
            }
        }
    }  
    
/*--------------------Kategorie entfernen form----------------------*/
    
     function Kategorieloeschform(){
        ?>
            <form class="p-entfernen" action="index.php?site=k-entfernen" method="post">
                Kategorie: <input type= "text" name="k-name" class="abstand2" required/><br /><br />
                <input type="submit" name="button-k-entfernen" value="Entfernen"/>
            </form>
        <?php
        }

/*-------------------Kategorie entfernen----------------------------*/

    function kategorieloeschen($kategorie){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $loeschen = "DELETE FROM kategorie WHERE Kategorie = '$kategorie'";
            $loesch = mysqli_query($verbindung, $loeschen);
    
            if($loesch == true)
                    {
                        return true;
                    }
                    else
                    {
                       echo "Fehler";
                    }
                    }
    
/*-------------------Kategorie entfernen isset----------------------*/ 

     function issetkategorieentfernen(){
    
            if(isset ($_POST['button-k-entfernen'])){
                $kategorie = $_POST['k-name'];
    
                if(kategorieloeschen($kategorie) == true){
                    echo "Sie haben die Kategorie entfernt";
                }
                else
                {
                    echo "Sie haben einen Fehler";
                }
            }
        }

/*-----------------Formular (hinzufuegen Kategorie)----------------*/

    function addformk(){
        ?>
        <form class="hinzufuegen" action="index.php?site=k-hinzufuegen" method="post">
            Namen einer neuen Kategorie: <input type= "text" name="k-kategorieeintrag" class="abstand2" required/><br /><br />
            <input type="submit" name="button-kategorieeintrag"/>
        </form>
      <?php
    }

  /*-----------------isset für einfügen von Hersteller--------------*/

    function issetkategorieeintrag(){

            if(isset ($_POST['button-kategorieeintrag'])){
                $kategorieeintrag = $_POST['k-kategorieeintrag'];
                if(kategorieeintragen ($kategorieeintrag) == true){
                    echo "Sie haben eine Kategorie hinzugef&uuml;gt ";
                }
                else{
                    echo "Sie haben einen Fehler";
                }
            }
        }


/*------------------Hersteller eintragen----------------------------*/

    function kategorieeintragen($kategorieeintrag){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
                $result = mysqli_query($verbindung, "SELECT * FROM kategorie WHERE Kategorie LIKE '$kategorieeintrag'");
                $menge = mysqli_num_rows($result);

                if($menge == 0)
                {

                    $eintrag = "INSERT INTO kategorie (Kategorie) VALUES ('$kategorieeintrag')";
                    $eintragen = mysqli_query($verbindung, $eintrag);

                    if($eintragen == true)
                    {
                        return true;
                    }
                    else
                    {
                       echo "Fehler1";

                    }
                }

                else
                {
                  echo "Fehler2";
                }

            }
 
/*-------------------Kommentarloeschform----------------------------*/

    function kommentarloeschform(){
    ?>
    <form class="p-entfernen" action="index.php?site=kom-entfernen" method="post">
        BewertungsID: <input type= "number" name="kom-name" class="abstand2" required/><br /><br />
        <input type="submit" name="button-kom-entfernen" value="Entfernen"/>
    </form>    
    <?php   
    }        
/*-------------------Kommentarloeschen------------------------------*/

    function kommentarloeschen(){
         $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $bwid = $_POST['kom-name'];
            $loeschen = "DELETE FROM Bewertung WHERE BewertungsID = '$bwid'";
            $loesch = mysqli_query($verbindung, $loeschen);

            if($loesch == true)
                    {
                        return true;
                    }
                    else
                    {
                       echo "Fehler";
                    }
                    }
    
     
    
/*-----------------isset für löschen von Kommentaren----------------*/

    function issetkomiloeschform(){

        if(isset ($_POST['button-kom-entfernen'])){
            $bwid = $_POST['kom-name'];

            if(kommentarloeschen ($bwid) == true){
                echo "Sie haben den kommentar gel&ouml;scht ";
            }
            else{
                echo "Sie haben einen Fehler";
            }
        }
    }
                                   