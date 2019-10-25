<?php

if(!isset($_SESSION)){session_start();};


require_once("Head.php");
require_once("Repo.php");
$db = new Repo();


function loggedIn(){


    if (isset($_POST["logout"])){
        $_SESSION["LoggedIn"] = false;
        notLoggedIn();
    }
    else{
        require_once("VoorLedenLoggedIn.php");
    }

}

function notLoggedIn(){
    if (isset($_POST["Register"])) {
        register();
       }
    elseif (isset($_POST["Login"])){

       login();
    }
    else{
        loginForms();
    }

}

function register(){
    if( $GLOBALS["db"]->Register($_POST["Voornaam"],$_POST["Familienaam"],$_POST["Wachtwoord"], $_POST["UserName"])){
    
    echo("
                     
                     <div class='frame'>
                     <p>Je registratie word verwerkt, je krijgt een melding wanneer je kan inloggen. (Je kan ook aan Matthias vragen of hij het nu kan doen)</p>
                     
                    </div>
                     
                     ");

    }else{
        echo("
                     
        <div class='frame'>
        <p>Er is een fout opgetreden, contacteer Matthias AUB</p>
        
       </div>
        
        ");
    }


}

function loginForms(){
    echo('
     <form action="Voor_Leden.php" method="post" class="frame">
<h1>Inloggen</h1>
<div><label for="UserName">Gebruikersnaam</label><input type="text" placeholder="Je gebruikersnaam" name="UserName"></div>
<div> <label for="Wachtwoord">Wachtwoord</label><input type="password" name="Wachtwoord"></div>
<div> <input type="submit" value="Login"></div>
        <input type="hidden" name="Login" value="Login">
    </form>

    <form action="Voor_Leden.php" method="post" class="frame">
<h1>Registreren</h1>
<div><label for="Voornaam">Voornaam</label><input type="text" placeholder="Je voornaam"  name="Voornaam"></div>
<div><label for="Familienaam">Familienaam</label><input type="text" placeholder="Je familienaam" name="Familienaam"></div>
<div><label for="UserName">Gebruikersnaam</label><input type="text" placeholder="Je gebruikersnaam" name="UserName"></div>
<div> <label for="Wachtwoord">Wachtwoord</label><input type="password" name="Wachtwoord"></div>
<div> <input type="submit" value="Registreer"></div>
    <input type="hidden" name="Register" value="Register">
    </form>
    
   
    
    
    
    ');
}

function login(){

    if($GLOBALS["db"]->checkPasswordFor($_POST["UserName"], $_POST["Wachtwoord"])==true){

        $_SESSION["LoggedIn"]=true;
        require_once("VoorLedenLoggedIn.php");
    }
    else{

        echo ("<div class='frame'>
                     <p>Inloggen is mislukt</p>
                     
                    </div>");

    }

}
?>

<main class="col-md-10 offset-sm-1 ">
    <div class="row">
        <div class="col-md-12">
            <?php


            if (isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"]) {
               loggedIn();

            } else {

                notLoggedIn();


            }


            ?>
        </div>

    </div>
</main>


<?php

require_once("Tail.php");
?>
