<?php

if (!isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"]){
    header('Location: Voor_Leden.php'); exit();
}

?>


<form action="Voor_Leden.php" method="post">
    <input type="submit" value="logout" name="logout">
</form>

<main class="col-md-10 offset-sm-1 ">
    <div class="row">
        <div class="col-md-12 " >
<div class="frame">

    <?php
    $amountSold = 0;
    $htmlSellPage = file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/641') . file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/642'). file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/643');



    $amountSold = $amountSold + substr_count("$htmlSellPage", "sofa_red") - 3 - 12*3;
    $maxSellAmount = 1089;

    echo "<p>".$amountSold." tickets verkocht</p>"









    ?>
<p>Op dit moment worden de laatste tickets geteld, kom later terug om te zien wat de uiteindelijke hoeveelheid is.</p>
    <p>500 tickets: filmnamiddag met hapje en drankje</p>
    <p>750 tickets:  terugkomdag in november in de Kegel of Yeti</p>
    <p>1000 tickets: groepsreis  naar Efteling</p>
</div>


        </div>

    </div>
</main>

