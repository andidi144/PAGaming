<?php
require_once("modules.php");
/* PHP-File als Stylesheet */

header("Content-type: text/css");


?>

*{

    font-family: Arial;
    cursor: url("Cursor.png") , auto;
    text-decoration: none;
    color: white;
}

body{
    padding: 0;
    margin: 0;
    color: white;
    font-family: sans-serif;
}

.bodynormal{
    background: url(6.jpg) no-repeat center fixed;
}

<?php 
    bodybackground();
 ?>



header
{
    position: absolute;
    left: 10%;
    top: 10px;
    right: 10%;
    height: 180px;
    background:     rgba(0, 0, 0, 0.7);
    border-radius:  12px;
}



@media screen and (max-width: 767px){
    #log{
        display: none;
    }
}
#log {
    position: absolute;
    right: 20px;
    top: 5px;
}

#log:active {
	position:absolute;
	top:6px;
	right: 20px;
}



.footer {
    text-decoration: none;
    color: white;
}

#impressum{
    position: absolute;
    left: 10px;
}

#loginform{
    float: left;
}


main {
    position:       absolute;
    margin-top:     200px;
    padding-top:    0px;
    padding-bottom: 50px;
    padding-right:  50px;
    border-radius:  12px;
    background:     rgba(0, 0, 0, 0.7);
    left: 10%;
    right: 10%;
    overflow: initial;
    color: white;
}

label  {
    color: white;
}

footer {
    position:       absolute;
    width:          100%;
    bottom:         0;
    text-align:     center;
    padding:        10px 0 10px 0;
    border-top: solid white 1px;
}

section {
    margin-left: 2%;
    width:      100%;
    min-height: 50%;
    height:     150%;
    min-height: 700px;
    padding:    2%;
    overflow: initial;
}

.login{
 position: absolute;
 left: 35%;
}

form{
    color: black;
}

.form{
    position: absolute;
    left: 350px;
}

.form2{
    position: absolute;
    left: 650px;
}

.text2{
    position: absolute;
    left: 550px;
}


nav
{
    position: absolute;
    left: 0px;
    height: 50px;
    right: 0px;
    bottom: 0px;
}



.Kategorien
{

    position: absolute;
    width: 15%;
    top: 0px;
    bottom: 10px;

}

@media screen and (min-width: 767px){

    .logo
    {
        position: absolute;
        left: 0px;
        width: 25%;
        top: 0px;
        bottom: 40px;
        background-image: url(Logo1.png);
        background-size:90% auto;
        background-repeat: no-repeat;
        background-position: center;
    }




    .Warenkorbbutton{
        background-image: url(Warenkorb.png);
        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        height: 50px;
        width: 50px;
        position: absolute;
        top: 5px;
        right: 500px;
    }


    .suche{
        display:none;
    }

    #sucheartikel{
        display: none;
    }

    #Produkt{
        width: 29%;
        height: auto;
        text-align: center;
        background: black;
        margin-right: 1%;
        margin-left: 1%;
        margin-top: 2%;
        margin-bottom: 2%;
        display: inline-block;
        border: 3px solid #2D2D2D;
        float: left;
        cursor: pointer;
        border-radius: 5px;
    }

    #Mause
    {
        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Mausweiss.png);
    }

    #Mause:hover, #Mause.active
    {
        background-image: url(Mausblau.png);
    }

    #Tastaturen
    {
        position: absolute;
        left: 14%;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Tastaturweiss.png);
    }

    #Tastaturen:hover, #Tastaturen.active
    {
        background-image: url(Tastaturblau.png);
    }

    #Mousepads
    {
        position: absolute;
        left: 28%;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Mousepadweiss.png);
    }

    #Mousepads:hover, #Mousepads.active
    {
        background-image: url(Mousepadblau.png);
    }

    #Headsets
    {
        position: absolute;
        left: 42%;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Headsetweiss.png);
    }

    #Headsets:hover, #Headsets.active
    {
        background-image: url(Headsetblau.png);
    }

    #Controller
    {
        position: absolute;
        left: 56%;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Controllerweiss.png);
    }

    #Controller:hover, #Controller.active
    {
        background-image: url(Controllerblau.png);
    }


    #Accesoires
    {
        position: absolute;
        left: 70%;
        right: 0px;

        background-size:auto 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Accesoires.png);
    }

    #Accesoires:hover, #Accesoires.active
    {
        background-image: url(accesoiresblue.png);
    }


    #Warenkorbbutton{
        position: absolute;
        left: 84%;

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



    .logo
    {
        position: absolute;
        left: 0px;
        height: 60%;
        top: 10%;
        width: 100%;
        background-image: url(Logo1.png);
        background-size:90% auto;
        background-repeat: no-repeat;
        background-position: center;
    }



    #Produkt{
    width: 90%;
    height: auto;
    text-align: center;
    background: black;
    margin-right: 1%;
    margin-left: 1%;
    margin-top: 2%;
    margin-bottom: 2%;
    display: inline-block;
    border: 3px solid #2D2D2D;
    float: left;
    cursor: pointer;
    border-radius: 5px;
    }


    #Mause
    {
        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Mausweiss.png);
    }

    #Mause:hover, #Mause.active
    {
        background-image: url(Mausblau.png);
    }

    #Tastaturen
    {
        position: absolute;
        left: 11%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Tastaturweiss.png);
    }

    #Tastaturen:hover, #Tastaturen.active
    {
        background-image: url(Tastaturblau.png);
    }

    #Mousepads
    {
        position: absolute;
        left: 22%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Mousepadweiss.png);
    }

    #Mousepads:hover, #Mousepads.active
    {
        background-image: url(Mousepadblau.png);
    }

    #Headsets
    {
        position: absolute;
        left: 33%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Headsetweiss.png);
    }

    #Headsets:hover, #Headsets.active
    {
        background-image: url(Headsetblau.png);
    }

    #Controller
    {
        position: absolute;
        left: 44%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Controllerweiss.png);
    }

    #Controller:hover, #Controller.active
    {
        background-image: url(Controllerblau.png);
    }


    #Accesoires
    {
        position: absolute;
        left: 55%;
        right: 0px;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(Accesoires.png);
    }

    #Accesoires:hover, #Accesoires.active
    {
        background-image: url(accesoiresblue.png);
    }

    #Suchens
    {
        position: absolute;
        left: 66%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(suchenweiss.png);
    }

    #Suchens:hover, #Suchens.active
    {
        background-image: url(suchenblau.png);
    }

    #Logins
    {
        position: absolute;
        left: 77%;

        background-size:auto 75%;
        background-repeat: no-repeat;
        background-position: center;
        background-image: url(loginweiss.png);
    }

    #Logins:hover, #Logins.active
    {
        background-image: url(loginblau.png);
    }

    #Warenkorbbutton{
        position: absolute;
        left: 88%;

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
}


.Filterbeschreibung
{
    margin: 40px;
    color: white;
    font-family: fantasy;
    top: 50px;
}

#LEL{
    background-image: url(mountains.gif);
}

.suchposition{
    position: absolute;
    right: 300px;
    top: 20px;
    color: #ffffff;
    }

#positionsuche{
    position: absolute;
    right: 300px;
    top: -180px;
    color: #ffffff;
    }

#Bilder{
    height: 94px;
    max-width: 40%;
}


.wkbilder{
    float: left;
    height: 130px;
    width: auto;
    margin: 10px;
}

.Produktesite{
    height: 30vh;

}

#link{
    position: absolute;
    top: 200px;
}

#mitteilungreg{
    position: absolute;
    top: 190px;
    left: 180px;
    color: #ffffff;
}
@media screen and (max-width: 767px){
    .p-suchen{
        display: none;
    }
}

.p-suchen{
        position: absolute;
        right: 230px;
        top: -170px;
        color: #ffffff;
}

#Produktwk{
    width: 90%;
    height: 150px;
    background: black;
    margin: 1%;
    display: inline-block;
    border: 3px solid #2D2D2D;
    cursor: pointer;
}

#kommentar{
    width: 60%;
    height: 300px;
    color: black;
}

#Sterneins{
    background:     rgba(0, 0, 0, 0.7);
}

.Warenkorbbutton{
    background-image: url(Warenkorb.png);
    background-size:auto 100%;
    background-repeat: no-repeat;
    background-position: center;
    height: 50px;
    width: 50px;
    position: absolute;
    top: 5px;
    right: 500px;
}

.artikel{
    float: left;
    width: 100%;
}

#Produktname{
    margin-top: 60px;
}

.Produktnamewk{
    position: absolute;
    left: 27%;
}

.Produktpreis{
    position: absolute;
    left: 52%;
}

.Produktanzahl{
    position: absolute;
    left: 70%;
}


form{
    color: white;
}

input{
    color: black;
}

.suche{
    float: right;
    margin: 10px;
}




.buttons {
	-moz-box-shadow:inset 0px -3px 7px 0px #29bbff;
	-webkit-box-shadow:inset 0px -3px 7px 0px #29bbff;
	box-shadow:inset 0px -3px 7px 0px #29bbff;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #2dabf9), color-stop(1, #0688fa));
	background:-moz-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
	background:-webkit-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
	background:-o-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
	background:-ms-linear-gradient(top, #2dabf9 5%, #0688fa 100%);
	background:linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#2dabf9', endColorstr='#0688fa',GradientType=0);
	background-color:#2dabf9;
	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;
	border:1px solid #0b0e07;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	padding:6px 40px;
	text-decoration:none;
	text-shadow:0px 1px 0px #263666;
	margin-top: 10px;
	max-width: 90%;
}
.buttons:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #0688fa), color-stop(1, #2dabf9));
	background:-moz-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
	background:-webkit-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
	background:-o-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
	background:-ms-linear-gradient(top, #0688fa 5%, #2dabf9 100%);
	background:linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#0688fa', endColorstr='#2dabf9',GradientType=0);
	background-color:#0688fa;
}
.buttons:active {
	position:relative;
	top:1px;
}

#sucheartikel{
    position: absolute;
    top:20px;
}

#number{
    margin-top: 15px;
}

.loeschbutton{
    position: absolute;
    right: 15%;
    background: url(papierkorbzu.png);
    width: 50px;
    height: 50px;
    background-size:100%;
    background-repeat: no-repeat;
    background-position: center;
    border: none;
}

.loeschbutton:hover{
    position: absolute;
    right: 15%;
    background: url(papierkorboffen.png);
    width: 50px;
    height: 50px;
    background-size:100%;
    background-repeat: no-repeat;
    background-position: center;
}



#sucheartikel{
    position: absolute;
    top:20px;
}


.Kontakt{
    position: absolute;
    left: 500px;
}

#eins {
    position: absolute;
}

#zwei{
    position: absolute;
    top: 310px;
}


.warenkorbsucheanzahl{
    float: right;
}

.warenkorbsuchesubmit{
    float: right;
}


@media screen and (max-width: 767px){
    #wafeld{
        position: absolute;
        right: 10px;
    }

    #instafeld{
        position: absolute;
        right: 30px;
    }

    #fbfeld{
        position: absolute;
        right: 50px;
    }

    #twfeld{
        position: absolute;
        right: 70px;
    }
}

@media screen and (min-width: 767px){
    #wafeld{
        display: none;
    }

    #instafeld{
        display: none;
    }

    #youfeld{
        display: none;
    }

    #fbfeld{
        position: absolute;
        right: 10px;   
    }

    #twfeld{
        position: absolute;
        right: 50px;
    }
}


.bewertungen{
    margin-top: 20px;
    width: 100%;
}

#bewertung{
    border: solid 3px green;
    width: 100%;
    height: auto;
    text-align: center;
    background: black;
    margin-right: 1%;
    margin-left: 1%;
    margin-top: 2%;
    margin-bottom: 2%;
    display: inline-block;
    border: 3px solid #2D2D2D;
    float: left;
    cursor: pointer;
    border-radius: 5px;
    overflow: hidden;
}

a{
    font-weight: bold;
}

