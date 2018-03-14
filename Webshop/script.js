function Sterne(zahl){
    var stern1=document.getElementById("sterneins");
    var stern2=document.getElementById("sternzwei");
    var stern3=document.getElementById("sterndrei");
    var stern4=document.getElementById("sternvier");
    var stern5=document.getElementById("sternfuenf");
    var bewertung=document.getElementById("hidden");
    switch (zahl){
    case 5:
        stern1.src="Joystick.png"
        stern2.src="Joystick.png"
        stern3.src="Joystick.png"
        stern4.src="Joystick.png"
        stern5.src="Joystick.png"
        bewertung.value="5";
    break;
    case 4:
        stern1.src="Joystick.png"
        stern2.src="Joystick.png"
        stern3.src="Joystick.png"
        stern4.src="Joystick.png"
        stern5.src="Joystickleer.png"
        bewertung.value="4";
    break;
    case 3:
        stern1.src="Joystick.png"
        stern2.src="Joystick.png"
        stern3.src="Joystick.png"
        stern4.src="Joystickleer.png"
        stern5.src="Joystickleer.png"
        bewertung.value="3";
    break;
    case 2:
        stern1.src="Joystick.png"
        stern2.src="Joystick.png"
        stern3.src="Joystickleer.png"
        stern4.src="Joystickleer.png"
        stern5.src="Joystickleer.png"
        bewertung.value="2";
    break;
    case 1:
        stern1.src="Joystick.png"
        stern2.src="Joystickleer.png"
        stern3.src="Joystickleer.png"
        stern4.src="Joystickleer.png"
        stern5.src="Joystickleer.png"
        bewertung.value="1";
    break;


    }

}
