<?php
require_once("Head.php");

 ?>
<div class="row">

<?php


if(isset($_GET["naam"])){
        $to = "gdpr@theater-oana.be";
        $subject =  $_GET["naam"] . "aanvaarde de GDPR privacyverklaring";
        $txt = $_GET["naam"]." aanvaarde de GDPR privacyverklaring";
        $headers = "From: " . "gdpr@theater-oana.be";


        mail($to, $subject, $txt, $headers);

        echo "<div class='col-md-12'><article><p>Bedankt om onze privacyverklaring te aanvaarden.</p></article></div>";
}else {
  echo "<p>Er zit ergens een foutje, gelieve ons te contacteren op matthias.bruynooghe@theater-oana.be</p>";



  echo "<form action='gdpr.php' method='get' ><div><label for=\"naam\">Je naam:</label>" .
      "<input type=\"text\" id=\"naam\" name=\"naam\" content='" . (isset($_GET["naam"]) ? $_GET["naam"] : "") . "'></div>" .

      "<div><label for=\"email\">Je e-mail adres:</label>" .
      "<input type=\"email\" name=\"email\" id=\"email\" content='" . (isset($_GET["email"]) ? $_GET["email"] : "") . "'></div>" .


      "<input type=\"submit\">" .
      "</form>";
}





 ?>


<?php   require_once("Tail.php"); ?>
