<?php
function site(){
    $site=filter_input(INPUT_GET, "site", FILTER_SANITIZE_SPECIAL_CHARS);
                    switch ($site){
                        case'':
                            artikelstartseite();
                            Suchfunktionartikel();
                            loeschen();
                            break;
                        case'suchergebnisse':
                            Suchfunktion();
                            break;
                        case'Warenkorb':
                            warenkorb();
                            warenkorbanzeigen();
                            Suchfunktionartikel();
                            loeschenauswk();                            
                            break;
                        case'rechte':
                            Suchfunktionartikel();
                            echo "Diese Seite wird nur f&uuml;r Bildungszwecke verwendet.";
                            break;
                        case'Login':
                            Suchfunktionartikel();
                            Loginseite();

                            break;
                        case'register':
                            Suchfunktionartikel();
                            registerform();
                            break;
                        case'LEL':
                            Suchfunktionartikel();
                            echo "<img src=\"ostereier.gif\" height=\"auto\" width=\"90%\" alt=\"Du hast ein Easteregg gefunden\" />";
                            break;
                        case'Produkt':
                            Suchfunktionartikel();
                            Produktseite(); 
                            break;
                        case 'Bewertung':
                            Suchfunktionartikel();
                            if(isset($_SESSION['$username'])){
                                bewertungform();
                            }
                            else{
                                header('location: index.php?site=Login');
                            }
                            break;
                        case'Kasse':
                            Kasse();
                            break; 
                        case'Kontakt':
                            Kontakt();
                            break; 
                        default:
                            Suchfunktionartikel();
                            
                            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
                            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
                            $Kategorieabfrage = "SELECT * FROM kategorie WHERE Kategorie = '$site'";
                            $Kategorieresult = mysqli_query($verbindung, $Kategorieabfrage);
                            $Kategegoriemenge = mysqli_num_rows($Kategorieresult);
                            if($Kategegoriemenge > 0){
                                showfilter();
                                artikelkategorie();   
                            }
                            else{
                                echo "<h1>(/.__.)/ ERROR 404 \(.__.\) </h1><br /><br />Die Seite kann leider nicht aufgerufen werden.  <a href=\"index.php\">Home</a>";    
                            }
                            break;
                    }
}


/*----------------------------------------------MENU------------------------------------*/

function showmenu(){
    echo
    "<nav id=\"nav\">
        <ul>
            <li><a href=\"index.php?site=home\">Home</a></li>
            <li><a href=\"index.php?site=angebot\">Angebot</a></li>
            <li><a href=\"index.php?site=reservation\">Reservation</a></li>
            <li><a href=\"index.php?site=kontakt\">Kontakt</a></li>
            <li><a href=\"index.php?site=erfahrungen\">Erfahrungen</a></li>
            <li><a href=\"index.php?site=login\">Login</a></li>
            <li><a href=\"index.php?site=register\">Register</a></li>
        </ul>
    </nav>";

}

/*---------------------------------------------Login------------------------------------*/

function login($username, $password ){
    if($username == "LEL"){
        header("Location: index.php?site=LEL") ;
    }
    else{
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $abfrage = "SELECT Passwort FROM benutzer WHERE Username = '$username'";
        $ergebnis = mysqli_query($verbindung, $abfrage);        
        $row = mysqli_fetch_object($ergebnis);
        if($row) {
            if(password_verify ($password, $row->Passwort))
            {
                $_SESSION['$username'] = $username;
                $_SESSION['$benutzerid']= $id;
                return true;
            }    
        }        
    }
}


/*---------------------------------Register Formular------------------------------------*/

function registerform(){
?>
    <form action="index.php?site=register" method="post" id="loginform">
    <label for="username">Username: </label><input value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" type="text" name="username" id="username" class="login" placeholder="Username" required /><br /><br />
    <label for="password">Passwort: </label><input value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"  type="password" name="password" id="password" class="login" placeholder="Passwort" required />  <br /><br />
    <label for="anrede">Anrede: </label><input value="<?php if (isset($_POST['anrede'])) echo $_POST['anrede']; ?>"  type="text" name="anrede" id="anrede" class="login" placeholder="Anrede" required />  <br /><br />
    <label for="name">Name: </label><input value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"  type="text" name="name" id="name" class="login" placeholder="Name" required />  <br /><br />
    <label for="vorname">Vorname: </label><input value="<?php if (isset($_POST['vorname'])) echo $_POST['vorname']; ?>"  type="text" name="vorname" id="vorname" class="login" placeholder="Vorname" required />  <br /><br />
    <label for="Email">E-Mail: </label><input value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  type="email" name="email" id="email" class="login" placeholder="E-Mail" required />  <br /><br />
    <label for="adress">Adresse: </label><input value="<?php if (isset($_POST['adress'])) echo $_POST['adress']; ?>"  type="text" name="adress" id="adress" class="login" placeholder="Adresse" required />  <br /><br />
    <label for="plz">PLZ: </label><input value="<?php if (isset($_POST['plz'])) echo $_POST['plz']; ?>"  type="text" name="plz" id="plz" class="login" placeholder="PLZ" required />  <br /><br />
    <label for="ort">Ort: </label><input value="<?php if (isset($_POST['ort'])) echo $_POST['ort']; ?>"  type="text" name="ort" id="ort" class="login" placeholder="Ort" required />  <br /><br />
    <input type="submit" class="buttons" name="submitregister" class="login" value="Registrieren"/>
    </form>
<?php
}

/*------------------------------------------Register------------------------------------*/

function register($Benutzername, $password, $anrede, $name, $vorname, $email, $adresse, $plz, $ort){
     $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
     or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
     $password = password_hash($password, PASSWORD_DEFAULT);
     $eintrag = "INSERT INTO Benutzer (Username, Passwort, Anrede, Name, Vorname, Email, Adresse, PLZ, Ort) VALUES ('$Benutzername', '$password', '$anrede', '$name', '$vorname', '$email', '$adresse', '$plz', '$ort')";
     $eintragen = mysqli_query($verbindung, $eintrag);

     if($eintragen == true)
     {
        return true;
     }

}

/*---------------------------------Register überprüfung---------------------------------*/

function issetregister(){
    if(isset ($_POST['submitregister'])){
        $Benutzername = $_POST['username'];
        $password=$_POST['password'];
        $anrede=$_POST['anrede'];
        $name=$_POST['name'];
        $vorname=$_POST['vorname'];
        $email=$_POST['email'];
        $adresse=$_POST['adress'];
        $plz=$_POST['plz'];
        $ort=$_POST['ort'];
        if(register ($Benutzername, $password, $anrede, $name, $vorname, $email, $adresse, $plz, $ort) == true){
            echo "Sie sind nun Registriert";
        }
        else{
            ?>
            <div id="Mitteilungreg">Geben sie bitte einen anderen Username ein dieser ist schon vergeben.</div>
            <?php
        }
    }
}

/*-------------------------------------Filter Anzeige-----------------------------------*/

function showfilter(){
    ?>
    <p class ="Filterbeschreibung">Hier k&ouml;nnen Sie einen bestimmten Hersteller ausw&auml;hlen. Wenn Sie keinen Ausw&auml;hlen werden alle Produkte angezeigt.</p> 
    
    <?php
        $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
        or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $Seite = $_GET['site'];
        $Filterabfrage = "
                        SELECT h.Hersteller, h.HerstellerID FROM hersteller AS h
                        INNER JOIN produkt AS p
                        ON h.HerstellerID = p.HerstellerID
                        INNER JOIN kategorie AS k       
                        ON p.KategorieID = k.KategorieID
                        WHERE k.Kategorie = '$Seite'
                        GROUP BY h.Hersteller
                      ";
        $Filterresult = mysqli_query($verbindung, $Filterabfrage);

        echo"<div class=\"Filter\">";
        while($row = $Filterresult->fetch_object())
        {
            echo "
                    <a href='index.php?site=".$Seite."&filter=".$row->HerstellerID."'>
                    <div class=\"".$row->Hersteller."Filter\"></div>
                    </a>
                ";
            
            
        }

        echo "</div>";
}


/*------------------------------Suchfunktion bei den Artikel----------------------------*/

function Suchfunktionartikel(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");

    //* Datenbankverbindung aufbauen (ENDE)
    
    echo "
    <form class='p-suchen' action='index.php?site=suchergebnisse' method='post'>
        Suche: <input type= 'text' name='name' class='abstand2' required/><br /><br />
        <input type='submit' id='sucheartikel' class='buttons' name='button-suche' value='Suchen'/>
    </form> ";
    
    if(isset ($_POST['button-suche'])){
        $name = $_POST['name'];
        
        echo "<br /><br /><b>Du hast nach dem Namen: \"$name\" gesucht. Dadurch wurden folgende Einträge gefunden:</b><br /><br />";
        $result = mysqli_query($verbindung, "SELECT * FROM produkt WHERE Produktname LIKE '$name'");
        $menge = mysqli_num_rows($result);
        while($row = $result->fetch_object()){
            if($menge > 0)
            {
                echo "Beschreibung: " .$row->Beschreibung . "<br />";
                echo "Test1";

            }
            else
            {
                echo "Test2";
                echo "Es wurde kein Name unter den Namen \"<u>$name</u>\" gefunden.<br />
                Bitte versuche es mit einem anderen namen.<br />
                <a href='suchen.html'>Zur&uuml;ck!</a>";
            }

        }
    }
}


/*------------------------------Suchfunktion--------------------------------------------*/

function Suchfunktion(){


    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    ?>
        <form class="p-entfernen" action="index.php?site=suchergebnisse" method="post">
        Suche: <input type= "text" name="name" class="abstand2" required/><br /><br />
        <input type="submit" class="buttons" name="button-suche" value="Suchen"/>
        </form>
    <?php

        if(isset ($_POST['button-suche'])){
            $name = $_POST['name'];
            $Suchinhalt = " SELECT * FROM produkt AS p
                            INNER JOIN hersteller AS h
                            ON p.HerstellerID = h.HerstellerID
                            where p.Produktname LIKE '%$name%'
                            OR h.Hersteller LIKE '%$name%'";
            $Suchinhalt1 = mysqli_query($verbindung, $Suchinhalt);

            if($Suchinhalt1){
              $menge = mysqli_num_rows($Suchinhalt1);

                if($menge > 0){
                    echo "<br /><br /><b>Du hast nach \"$name\" gesucht. Dadurch wurden folgende Einträge gefunden:</b><br /><br />";
                }
                else{
                    echo "<br /><br /><b>Du hast nach \"$name\" gesucht. Es wurde nichts gefunden.</b><br /><br />";
                }

                while($row = $Suchinhalt1->fetch_object())
                {
                    $row = get_object_vars($row);
                    $ProduktID =  $row['ProduktID'];
                    $ProduktName = $row['Produktname'];
                    $Preis = $row['Preis'];
                    $bild = $row['Bild'];
                    $Hersteller = $row['Hersteller'];
                 ?>




                <?php
                    echo "
                            <a href=\"index.php?site=Produkt&produktid=$ProduktID\"><div id='Produktwk'>
                            <div class='bilder'>
                                <img class='wkbilder' src='Produktbilder/$bild' />
                            </div>
                            <div id='Produktname'>
                            <span class='Produktnamewk'>$Hersteller $ProduktName</span></a>
                            <span class='Produktpreis'>Preis: $Preis.-</span>                                      ";
                            
                            if(isset($_SESSION['$username'])){
                                echo "
                                        <form action='index.php?site=Warenkorb' method='post'>
                                        <input type='hidden' name='ProduktID' value='$ProduktID'/>
                                        <input type='number' class='warenkorbsucheanzahl' name='Anzahl' value='1' id='number' min='1'/>   <br /><br />
                                        <input id='warenkorbbutton' class='buttons warenkorbsuchesubmit' class=\"suche\" type='submit' value='Dem Warenkorb Hinzuf&uuml;gen' name='warenkorbsubmit'  />
                                        </form>
                
                                ";
                            }
                            
                            echo "</div></div>
                    ";
                }
            } else{
                echo"Error with SQL";
                var_dump($Suchinhalt);
            }

}
}



/*------------------------------Artikel der Kategorien-----------------------------------*/

function artikelkategorie(){
    ?>
    <br />
    <br />
    <br />
    <br />
    <?php  
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $Seite = $_GET['site'];              
        if(isset($_GET['filter'])){
            $HerstellerID = $_GET['filter'];
            $Shopinhalt = "
                        SELECT * FROM produkt AS p
                        INNER JOIN hersteller AS h
                        ON p.HerstellerID = h.HerstellerID
                        where p.KategorieID = (SELECT k.KategorieID FROM kategorie AS k WHERE k.Kategorie = '$Seite') AND p.HerstellerID = '$HerstellerID'
                        ORDER BY p.Einkaeufe DESC;
                      ";                 
        }
        else{
            $Shopinhalt = "
                        SELECT * FROM produkt AS p
                        INNER JOIN hersteller AS h
                        ON p.HerstellerID = h.HerstellerID
                        where p.KategorieID = (SELECT k.KategorieID FROM kategorie AS k WHERE k.Kategorie = '$Seite')
                        ORDER BY p.Einkaeufe DESC;
                      ";    
        }
        
        $Shopinhalt1 = mysqli_query($verbindung, $Shopinhalt);


        echo"<div class=\"artikel\">";
        while($row = $Shopinhalt1->fetch_assoc())
        {
            $ProduktID =  $row['ProduktID'];
            $ProduktName = $row['Produktname'];
            $Hersteller =  $row['Hersteller'];
            $Preis = $row['Preis'];
            $bild = $row['Bild'];   

            echo "
                    <a href=\"index.php?site=Produkt&produktid=$ProduktID\"><div id='Produkt'>
                        <div class='bilder'>
                           <img id='Bilder' src='Produktbilder/$bild' />
                        </div>
                        <div id='Produktname'>
                        $Hersteller $ProduktName<br /> </div></a><br />
                ";
            echo "Preis: $Preis.-<br />";


            if(isset($_SESSION['$username'])){
                echo "
                        <form action='index.php?site=Warenkorb' method='post'>
                        <input type='hidden' name='ProduktID' value='$ProduktID'/>
                        <input type='number' name='Anzahl' value='1' id='number' min='1'/><br /> 
                        <input class=\"buttons\" id='warenkorbbutton' type='submit' value='Dem Warenkorb Hinzuf&uuml;gen' name='warenkorbsubmit'  />
                        </form>

                ";
            }
            echo "<br /></div>" ;

        }

        echo "</div>";

 }

/*------------------------------Warenkorb Funktion--------------------------------------*/

 function warenkorb(){
 if(isset($_POST['warenkorbsubmit'])){
     if(isset($_SESSION['$username'])){
        if(isset ($_POST['ProduktID'])){
             $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
             or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
             $name = $_SESSION['$username'];
             $abfrageid=("SELECT BenutzerID from Benutzer where Username = '$name'");
             $abfrage=("Select * From Warenkorb where BenutzerID = $abfrageid AND Status = 1");
             $abfrage1 = mysqli_query($verbindung, $abfrage);
             if($abfrage1){
                $row = $abfrage1 ->fetch_object();
             }
             if(isset ($row)){
                echo "hello";
             }else{
                $name = $_SESSION['$username'];
                $abfrage=mysqli_query($verbindung,"SELECT BenutzerID FROM benutzer where Username='$name'");
                $row=$abfrage->fetch_object();
                $userid=$row->BenutzerID;
                $AbfrageWarenkorb ="SELECT * FROM warenkorb
                                    WHERE BenutzerID = $userid AND status = 1";
                $resultwarenkorb = mysqli_query($verbindung, $AbfrageWarenkorb);
                $mengewarenkorb = mysqli_num_rows($resultwarenkorb);
                if($mengewarenkorb == 0){
                    $abfrageinsert=("Insert INTO warenkorb(BenutzerID, Status)values(($abfrageid),1)");
                    $abfrageinsert1 = mysqli_query($verbindung, $abfrageinsert);
                    if($abfrageinsert1){
        
                        }else{
                        echo"fehler";
                    }   
                }
                else{
                    
                }
                
             }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
                $name = $_SESSION['$username'];
                $abfrage=mysqli_query($verbindung,"SELECT BenutzerID FROM benutzer where Username='$name'");
                $row=$abfrage->fetch_object();
                $userid=$row->BenutzerID;
                $abfrage=mysqli_query($verbindung,"SELECT * from warenkorb where BenutzerID = $userid AND status=1");
                $row= $abfrage ->fetch_object();
                $Warenkorbid=$row->WarenkorbID;
                $ProduktID = $_POST['ProduktID'];
                $Anzahl = $_POST['Anzahl'];    
                
        
                $AbfrageProdukt = " SELECT * FROM warenkorbprodukte AS wp
                                    INNER JOIN warenkorb AS w
                                    ON wp.WarenkorbID = w.WarenkorbID
                                    WHERE BenutzerID = $userid
                                    AND ProduktID = $ProduktID";
                $result = mysqli_query($verbindung, $AbfrageProdukt);  
                $menge = mysqli_num_rows($result);
    
                    if($menge > 0){
                        mysqli_query($verbindung,"UPDATE warenkorbprodukte AS wp INNER JOIN warenkorb AS w ON wp.WarenkorbID = w.WarenkorbID SET wp.Anzahl = wp.Anzahl + '$Anzahl' WHERE wp.ProduktID = '$ProduktID' AND w.BenutzerID = $userid " ); 
                    }
                    else{
                        $insertpruef=mysqli_query($verbindung,"Insert into warenkorbprodukte (WarenkorbID, ProduktID, Anzahl) values ($Warenkorbid, $ProduktID, $Anzahl)" );
                        mysqli_query($verbindung,"UPDATE produkt SET einkaeufe = einkaeufe+'1' WHERE ProduktID = '$ProduktID'" );       
                    }
            }
        }
        else{
            header('location:index.php?site=Login');
        } 
    }   
}


/*------------------------------Warenkorb anzeigen--------------------------------------*/

  function warenkorbanzeigen(){
  if(isset($_SESSION['$username'])){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $name = $_SESSION['$username'];
        $warenkorbinhalt = "SELECT * FROM warenkorbprodukte AS wp
                            INNER JOIN produkt AS p
                            ON wp.ProduktID = p.ProduktID
                            INNER JOIN warenkorb AS w
                            ON w.WarenkorbID=wp.WarenkorbID
							INNER JOIN benutzer AS b                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
							ON b.BenutzerID = w.BenutzerID
							INNER JOIN hersteller AS h
							ON p.herstellerID = h.herstellerID
                            where b.Username = '$name'";

        $warenkorbinhalt1 = mysqli_query($verbindung, $warenkorbinhalt);

        if($warenkorbinhalt1){
            
            $Summe = 0;
            
            while($row = $warenkorbinhalt1->fetch_object())
            {
                $row = get_object_vars($row);
                $ProduktID =  $row['ProduktID'];
                $ProduktName = $row['Produktname'];
                $Preis = $row['Preis'];
                $Anzahl = $row['Anzahl'];
                $bild = $row['Bild'];
                $Hersteller = $row['Hersteller'];
                $Summe = $Summe + $Preis * $Anzahl;
             
                echo "
                        <a href=\"index.php?site=Produkt&produktid=$ProduktID\"><div id='Produktwk'>
                            <div class='bilder'>
                                <img class='wkbilder' src='Produktbilder/$bild' />
                            </div>
                            <div id='Produktname'>
                            <span class='Produktnamewk'>$Hersteller $ProduktName</span></a>
                            <span class='Produktpreis'>Preis: $Preis.-</span>
                            <span class='Produktanzahl'>Anzahl: $Anzahl</span>
                            <form action=\"index.php?site=Warenkorb\" method=\"post\">
                                <input type='hidden' name='Anzahl' value='$Anzahl'/>
                                <input type='hidden' value='$ProduktID' name='ProduktID'/>
                                <input type='submit' value=' ' class='loeschbutton' name='loeschbutton'/>
                            </form> 
                            </div></div>
                    ";
            }
            echo "<br />Summe: $Summe.-";
        } else{
            echo"Error with SQL";
            var_dump($warenkorbinhalt);
        }
    }
    else{
        header('location:index.php?site=Login');
    } 
    //echo "<input type='hidden' name='WarenkorbID' value='$WarenkorbID' />";
            ?>
        <form action="index.php?site=Kasse" method="post">
            <input type="submit" name="Kasse" value="Zur Kasse!" />
        </form>
    <?php      
}

/*---------------------------------Bewertung--------------------------------------------*/

function bewertungform(){
    ?>
    <form action="index.php" method="post">
        <textarea id="kommentar" name="kommentar" rows="4" cols="50" placeholder="Geben Sie hier Ihren Kommentar ein:"></textarea>
        <img id="sterneins" class="stern" src="Joystickleer.png" alt="Joystick" height="42" width="42" onmouseover= 'Sterne(1)' />
        <img id="sternzwei" class="stern" src="Joystickleer.png" alt="Joystick" height="42" width="42" onmouseover= 'Sterne(2)'/>
        <img id="sterndrei" class="stern" src="Joystickleer.png" alt="Joystick" height="42" width="42" onmouseover= 'Sterne(3)'/>
        <img id="sternvier" class="stern" src="Joystickleer.png" alt="Joystick" height="42" width="42" onmouseover= 'Sterne(4)'/>
        <img id="sternfuenf" class="stern" src="Joystickleer.png" alt="Joystick" height="42" width="42" onmouseover= 'Sterne(5)'/>
        <input type="hidden" id="hidden" name="bewerten" value="leer"/>
        <input type="hidden" name="ProduktID" value="<?php echo $_POST['ProduktID']; ?>"/>
        <input type="submit" class="buttons" name="bewertung" value="Bewerten!"/>
    </form>
    <?php
    }
/*---------------------------------Bewertung pruefung--------------------------------------------*/
    function issetbewertungeintrag(){

            if(isset ($_POST['bewertung'])){
                $Kommentareintrag = $_POST['kommentar'];
                if(bewertungeintragen ($Kommentareintrag) == true){
                }
                else{
                    echo "Sie haben einen Fehler";
                }
            }
        }

/*------------------Bewertung eintragen----------------------------*/

    function bewertungeintragen($bewertungeintrag){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $Kommentareintrag = $_POST['kommentar'];
            $result = mysqli_query($verbindung, "SELECT * FROM bewertung WHERE kommentar LIKE '$Kommentareintrag'");
            $name = $_SESSION['$username'];
            $abfrageid=("SELECT BenutzerID from Benutzer where Username = '$name'");
            $ProduktID = $_POST['ProduktID'];
            $timestamp = time();
            $datum = date("Y-m-d H:i:s", $timestamp);
            $menge = mysqli_num_rows($result);
            $Bewertung = $_POST['bewerten'];
                if($menge < 3)
                {

                    $eintrag = "INSERT INTO bewertung (BenutzerID, ProduktID, Bewertung, Kommentar, Datum) VALUES (($abfrageid), '$ProduktID', '$Bewertung', '$Kommentareintrag', '$datum')";
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
    ?>

<?php

/*------------------------------Artikel der Startseite-----------------------------------*/

function artikelstartseite(){
    ?>
    <br />
    <br />
    <br />
    <br />
    <?php
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        // session_start();
        $Shopinhalt = "
                        SELECT * FROM produkt AS p
                        INNER JOIN hersteller AS h
                        ON p.HerstellerID = h.HerstellerID
                        ORDER BY p.Einkaeufe DESC
                        LIMIT 12                        
                      ";
        $Shopinhalt1 = mysqli_query($verbindung, $Shopinhalt);


        echo"<div class=\"artikel\">";
        while($row = $Shopinhalt1->fetch_assoc())
        {
            $ProduktID =  $row['ProduktID'];
            $ProduktName = $row['Produktname'];
            $Hersteller =  $row['Hersteller'];
            $Preis = $row['Preis'];
            $bild = $row['Bild'];

            echo "
                    <a href=\"index.php?site=Produkt&produktid=$ProduktID\"><div id='Produkt'>
                        <div class='bilder'>
                           <img id='Bilder' src='Produktbilder/$bild' />
                        </div>
                        <div id='Produktname'>
                        $Hersteller $ProduktName<br /> </div></a><br />
                ";
            echo "Preis: $Preis.-<br />";

            if(isset($_SESSION['$username'])){
                echo "
                        <form action='index.php?site=Warenkorb' method='post'>
                        <input type='hidden' name='ProduktID' value='$ProduktID'/>
                        <input type='number' name='Anzahl' value='1' id='number' min='1'/><br />
                        <input class=\"buttons\" id='warenkorbbutton' type='submit' value='Dem Warenkorb Hinzuf&uuml;gen' name='warenkorbsubmit' />
                        </form>
                        
                ";    
            }
            echo "<br /></div>" ;
                
        }

        echo "</div>";

 }
 
 /* --------------------- Kasse ---------------------------------- */
 
 function Kasse(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    if(isset($_POST['Kasse'])){
    $Summe=0;
    $name = $_SESSION['$username'];     
    $abfrage = "            SELECT * FROM warenkorbprodukte AS wp
                            INNER JOIN produkt AS p
                            ON wp.ProduktID = p.ProduktID
                            INNER JOIN warenkorb AS w
                            ON w.WarenkorbID=wp.WarenkorbID
							INNER JOIN benutzer AS b
							ON b.BenutzerID = w.BenutzerID
							INNER JOIN hersteller AS h
							ON p.herstellerID = h.herstellerID
                            where b.Username = '$name'";
    $abfragek = mysqli_query($verbindung, $abfrage);
    if($abfragek){
    while($row = $abfragek->fetch_assoc())
        {
            $ProduktName = $row['Produktname'];
            $Preis = $row['Preis'];
            $anzahl = $row['Anzahl'];
            $Summe = $Summe + $Preis * $anzahl;
            echo "          -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                            <div id='Produktname'>
                            <span class='Produktnamewk'>$ProduktName</span>
                            <span class='Produktanzahl'>Anzahl:$anzahl </span>
                            <span class='Produktpreis'>Preis: $Preis.-</span><br />
                            </div></div>
                    "; }
            echo"
                            -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  <br /><br />
                            <span class='Produktpreis'>Total: $Summe.-</span><br />

                            ";
                            
           ?>
                <form action="index.php" method="post">
                    <input type="submit" name="loeschen" value="Bestellung abschicken" />
                </form>
                <?php
                       }
       }
}

/* ------------------------- Warenkorb löschen ---------------------*/

           
function loeschen(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    if(isset($_SESSION['$username'])){
        $name = $_SESSION['$username'];
        if(isset($_POST['loeschen'])){
            $abfrage=mysqli_query($verbindung,"SELECT BenutzerID FROM benutzer where Username='$name'");
            $row=$abfrage->fetch_object();
            $userid=$row->BenutzerID;
            $abfrage=mysqli_query($verbindung, "SELECT * FROM Warenkorb");
            $delete2= ("DELETE wp FROM warenkorbprodukte AS wp
                        INNER JOIN warenkorb as w
                        ON wp.WarenkorbID = w.WarenkorbID
                        INNER JOIN benutzer AS b
                        ON w.BenutzerID = b.BenutzerID
                        where b.Username = '$name'");
            $delete=("DELETE FROM warenkorb where BenutzerID='$userid'");
            $loeschen2 = mysqli_query($verbindung, $delete2);
            $loeschen = mysqli_query($verbindung, $delete);
            if($loeschen2 == true && $loeschen == true)
            {
                return true;
    
            }
            else
            {
                echo "Fehler555";
            }
        }   
    }                      
}
 

/* ---------------- Artikel aus Warenkorb löschen ------------------*/

function loeschenauswk(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    if(isset($_SESSION['$username'])){
        $name = $_SESSION['$username'];
        if(isset($_POST['loeschbutton'])){
            $produktIDwk = $_POST['ProduktID'];
            $abfrage=mysqli_query($verbindung,"SELECT BenutzerID FROM benutzer where Username='$name'");
            $row=$abfrage->fetch_object();
            $userid=$row->BenutzerID;
            $abfrage=mysqli_query($verbindung, "SELECT * FROM Warenkorb");
            $delete2= ("DELETE wp FROM warenkorbprodukte AS wp
                        INNER JOIN warenkorb as w
                        ON wp.WarenkorbID = w.WarenkorbID
                        INNER JOIN benutzer AS b
                        ON w.BenutzerID = b.BenutzerID
                        where b.Username = '$name'
                        AND wp.ProduktID = $produktIDwk");
            $loeschen2 = mysqli_query($verbindung, $delete2);
            if($loeschen2 == true)
            {
                echo "<script language='JavaScript'>window.location = 'http:index.php?site=Warenkorb';</script>"; 
            }
            else
            {
                echo "Fehler1234";
                var_dump($_POST['ProduktID']);
                var_dump($produktIDwk)  ;
            }
        }
    }
}


/* ----------------- Kontakt --------------------------------------*/


    function Kontakt(){
        ?>
        <div class="kontakt" id="ein">
        <img id="Patrick" class="pb" src="Patrick.jpg" height="166" width="166" onmouseover= 'Sterne(1)' /><br />
        <?php
        echo"
            Patrick Sch&ouml;pfer<br />
            Wylen-Bantlipark 11<br />
            6440 Brunnen<br />
            patrick.schoepfer@hotmail.ch
        "
        ?>
       </div>

       <div class="kontakt" id="zwei">
        <img id="adrian" class="pb" src="Adrian.jpg" height="166" width="166" onmouseover= 'Sterne(1)' /><br />
        <?php
        echo"
            Adrian Betschart<br />
            Chaletweg 1<br />
            6403 K&uuml;ssnacht am Rigi<br />
            adrianbetschart@hotmail.ch
          "
        ?>
       </div>
       <?php
    }
    
    
    
/* -------------------------- Produktseite ----------------------- */

function Produktseite(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $id=$_GET['produktid'];
    $aufruf="select * from Produkt AS p INNER JOIN Hersteller AS h ON p.HerstellerID = h.HerstellerID where p.ProduktID=$id";
    $Produktinhalt = mysqli_query($verbindung, $aufruf);
    $row = $Produktinhalt ->fetch_object();
    $ProduktName=$row->Produktname;
    $Preis=$row->Preis;
    $bild = $row->Bild;
    $beschreibung = $row->Beschreibung;
    $Hersteller = $row->Hersteller;
    echo "
        <div class='Produktesite'>
            <img class='Produktesite' src='Produktbilder/$bild' />
        </div>
        <div id='Produktname'>
            $Hersteller $ProduktName<br /> </div>
            Preis: $Preis.-<br />
            Beschreibung: $beschreibung - Das Alles und mehr bei PAGaming - Love it or Leave it!<br /><br />";
            bewertunganzeigen();
            if(isset($_SESSION['$username'])){
                echo "  <form action='index.php?site=Warenkorb' method='post'>
                        <input type='hidden' name='ProduktID' value='$id'/>
                        <input type='number' name='Anzahl' value='1' id='number' min='1'/><br />
                        <input class=\"buttons\" id='warenkorbbutton' type='submit' value='Dem Warenkorb Hinzuf&uuml;gen' name='warenkorbsubmit'  />
                        </form>";
            
            echo "  <form action='index.php?site=Bewertung' method='post'>
                        <input type='hidden' name='ProduktID' value='$id'  />
                        <input class=\"buttons\" type='submit' name='kommentarbutton' value='Bewertung'/>
                    </form>";
            }
            else{
                echo "Um Bewertungen zu schreiben m&uuml;ssen sie sich <a href='index.php?site=Login'>hier</a> einloggen."  ;
            }       
        $Bewertungeninhalt = "
                        SELECT * FROM bewertung AS bew
                        INNER JOIN benutzer AS ben
                        ON bew.BenutzerID = ben.BenutzerID
                        WHERE bew.ProduktID = $id
                        ORDER BY bew.Datum DESC
                      ";
        $Bewertungeninhalt1 = mysqli_query($verbindung, $Bewertungeninhalt);


        echo"<div class=\"bewertungen\">";
        while($row = $Bewertungeninhalt1->fetch_assoc())
        {
            $Username = $row['Username'];
            $Datum =  $row['Datum'];
            $Bewertung = $row['Bewertung'];
            $Kommentar = $row['Kommentar'];

            echo "
                    <div id='bewertung'>
                        $Username $Bewertung / 5 $Datum<br /><br />
                ";
            echo "$Kommentar<br />";
            echo "<br /></div>" ;

        }

        echo "</div>";

}    
    
    
/* -------------------------- Loginseite ----------------------- */

function Loginseite(){    
    if(isset($_GET['logoutsubmit'])){
        unset($_SESSION['$username'] );
        session_unset();
        session_destroy();
        header("Location: index.php"); 
    }
    else{
        if(isset ($_POST['submitlogin'])){
            $user = $_POST['username'];
            $password =  $_POST['password'];
                if(login($user, $password)){
                    header("Location: index.php");
                }
                else{
                    echo "Sie haben ein falsches Passwort oder einen falschen Username eingegeben </br></br>";
                }
        }
        echo "  <form action=\"index.php?site=Login\" method=\"post\" id=\"loginform\">
                    <label for=\"username\">Username: </label><input type=\"text\" name=\"username\" id=\"username\" class=\"login\" placeholder=\"Username\"  required/><br /><br />
                    <label for=\"password\">Passwort: </label><input type=\"password\" name=\"password\" id=\"password\" class=\"login\" placeholder=\"Passwort\" required />  <br /><br />
                    <input class=\"buttons\" type=\"submit\" name=\"submitlogin\" class=\"login\" value=\"Einloggen\"/>
                </form>";
                ?>
        <div id="link">Haben sie noch keinen Account? Registrieren Sie sich <a href="?site=register">hier </a>und werden Sie zum PA-Member</div>
        <?php
    }
}   
    
/* ------------------- Bewertung anzeigen ----------------------- */   
    

function bewertunganzeigen(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $AbfrageProdukt=("SELECT * From produkt");
    $id = $_GET['produktid'];
    $abfrage=("Select AVG(Bewertung) as avg FROM Bewertung  where ProduktID = $id");
    $ergebnis = mysqli_query($verbindung, $abfrage);
    $row = mysqli_fetch_object($ergebnis);
    $durchschnitt = $row->avg;
    $durchschnitt=round($durchschnitt, 0);
    echo"Die Bewertung betr&auml;gt: $durchschnitt/5 m&ouml;glichen Joysticks ";

}


/*--------------------- CSS bodybackground -----------------------*/

function bodybackground(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $result = mysqli_query($verbindung, "SELECT * FROM hersteller");
    $menge = mysqli_num_rows($result);
    while($row = mysqli_fetch_assoc($result)){
        $Hersteller = $row['Hersteller'];
        echo ".body".$Hersteller."{
        background: url(".$Hersteller."body.jpg) no-repeat center fixed;
        }
        .".$Hersteller."Filter{
        background: url(".$Hersteller."filter.jpg);
        width: 25%;
        background-color: #000000;
        height: 200px ;
        background-size:100%;
        background-repeat: no-repeat;
        background-position: center;
        border: solid gray 3px;
        border-radius: 5px;
        float: left;
        margin-right: 20px;
        margin-bottom: 100px;
        margin-left: 7px;

        }";
    }    
}


/*------------------ Filter Cases -----------------------------*/


function filtercases(){
    if(isset($_GET['filter'])){
            $HerstellerID = $_GET['filter'];
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $resultbody = mysqli_query($verbindung, "SELECT * FROM hersteller WHERE HerstellerID = '$HerstellerID' LIMIT 1");
            $rowbody = $resultbody ->fetch_object();
            $Hersteller=$rowbody->Hersteller;
            echo"class = \"body".$Hersteller."\" ";       
    }
    else{
        if(isset($_GET['produktid'])){
            $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
            or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
            $produktid = $_GET['produktid'];
            $resultbody = mysqli_query($verbindung, "SELECT h.Hersteller FROM hersteller AS h INNER JOIN Produkt AS p on p.HerstellerID = h.HerstellerID WHERE ProduktID = '$produktid' LIMIT 1");
            $rowbody = $resultbody ->fetch_object();
            $Hersteller=$rowbody->Hersteller;
            echo"class = \"body".$Hersteller."\" ";
        }
        else{
            echo"class = \"bodynormal\" ";
        }
    }    
}


/*---------------------------- Nav -------------------------------*/
    
function nav(){
    
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $Kategorieabfrage = "
                    SELECT * FROM kategorie";
    $Kategorieresult = mysqli_query($verbindung, $Kategorieabfrage);
    $site=filter_input(INPUT_GET, "site", FILTER_SANITIZE_SPECIAL_CHARS);
    echo"<nav>";
    while($Kategorierow = $Kategorieresult->fetch_object())
    {
        $Kategorie = $Kategorierow->Kategorie;
        
                echo "<a href=\"index.php?site=";
                echo $Kategorie;
                echo " \"><div id=\"";
                echo $Kategorie ;
                echo "\" class=\"Kategorien";
                if($site == $Kategorie){ echo " active"; }
                echo "\"></div></a>";
    } 
    ?>
    <a href="index.php?site=suchergebnisse"><div id="Suchens" class="Kategorien"
    <?php  
    if($site == "suchergebnisse"){echo"active";}  ?>
    > </div></a>
    <?php 
           
    if(isset($_SESSION['$username'])){ ?>
        <a href="index.php?site=Login&logoutsubmit=Ausloggen"><div id="Logins" class="Kategorien <?php if($site == "Einloggen"){echo"active";} ?>" ></div></a>
        <a href="index.php?site=Warenkorb"><div id="Warenkorbbutton" class="Kategorien <?php if($site == "Warenkorb"){echo"active";} ?>"></div></a>
    <?php
    }
    else{   ?>
        <a href="index.php?site=Login&loginsubmit=Einloggen"><div id="Logins" class="Kategorien <?php if($site == "Einloggen"){echo"active";} ?>" ></div></a>
        <?php
    }
    ?>
    </nav>
    <?php 
}


/*------------------------ CSS für Kategorien ---------------------*/

function kategorienstyle(){
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $Kategoriestyleabfrage = "SELECT * FROM kategorie";
    $Kategoriestyleresult = mysqli_query($verbindung, $Kategoriestyleabfrage); 
    $Kategegoriestylemenge = mysqli_num_rows($Kategoriestyleresult);
    $Abstand = 0; 
    $Mobileabstand = 0;
    if(isset($_SESSION['$username'])){
        $Breite = 100 / ($Kategegoriestylemenge + 1);
        $Mobilebreite = 100 / ($Kategegoriestylemenge + 3);
        echo "/* Hallo */"   ;
    }
    else{
        $Breite = 100 / $Kategegoriestylemenge;
        $Mobilebreite = 100 / ($Kategegoriestylemenge + 2);  
        echo "/* Japundso */"   ;
    } 
    echo " 
    @media screen and (min-width: 767px){
        .Kategorien
        {
            width:".$Breite."%;  
            position: absolute;
            top: 0px;
            bottom: 10px;
        }  
    ";
    while($Kategoriestylerow = $Kategoriestyleresult->fetch_object())
    {
        $Kategorie = $Kategoriestylerow->Kategorie;
        echo" 
        #".$Kategorie."
        {
            position: absolute;
            left: ".$Abstand."%;
            
            background-size:auto 100%; 
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(".$Kategorie."weiss.png);
        }
    
        #".$Kategorie.":hover, #".$Kategorie.".active
        {
            background-image: url(".$Kategorie."blau.png);
        } " ;  
         $Abstand += $Breite; 
    }
    echo "
        #Warenkorbbutton{
        position: absolute;
        right: 0;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Warenkorbweiss.png);
        }
        #Warenkorbbutton:hover, #Warenkorbbutton.active
        {
            background-image: url(Warenkorbblau.png);
        }

        #Suchens
        {
            display:none;
        }


        #Logins
        {
            display:none;
        }
    }
    
    @media screen and (max-width: 767px){
        .Kategorien
        {
            width:".$Mobilebreite."%;      
            position: absolute;
            top: 0px;
            bottom: 10px;
        }   
    ";
    $verbindung = mysqli_connect("localhost", "root" , "", "webshop")
    or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
    $Kategoriestyleabfrage = "SELECT * FROM kategorie";
    $Kategoriestyleresult = mysqli_query($verbindung, $Kategoriestyleabfrage);
    $Kategegoriestylemenge = mysqli_num_rows($Kategoriestyleresult);
    while($Kategoriestylerow = $Kategoriestyleresult->fetch_object())
    {
        $Kategorie = $Kategoriestylerow->Kategorie;
        echo"
        #".$Kategorie."
        {
            position: absolute;
            left: ".$Mobileabstand."%;
        
            background-size:auto 75%;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(".$Kategorie."weiss.png);
        }

        #".$Kategorie.":hover, #".$Kategorie.".active
        {
            background-image: url(".$Kategorie."blau.png);
        } " ;
        $Mobileabstand += $Mobilebreite;
    }
        
        
    echo "
        #Suchens
        {
            position: absolute;
            left: ".$Mobileabstand."%;
    
            background-size:auto 75%;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(suchenweiss.png);
        }
    
        #Suchens:hover, #Suchens.active
        {
            background-image: url(suchenblau.png);
        }";
        $Mobileabstand += $Mobilebreite;
    
    echo "
        #Logins
        {
            position: absolute;
            left: ".$Mobileabstand."%;
    
            background-size:auto 75%;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(loginweiss.png);
        }
    
        #Logins:hover, #Logins.active
        {
            background-image: url(loginblau.png);
        }
        }";
        $Mobileabstand += $Mobilebreite;

    echo "
        #Warenkorbbutton{
            position: absolute;
            right: 0;
    
            background-size:auto 75%;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(Warenkorbweiss.png);
        }
        #Warenkorbbutton:hover, #Warenkorbbutton.active
        {
            background-size:auto 75%;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url(Warenkorbblau.png);
        }
     
    "; 
 }
   
   

    
    
    