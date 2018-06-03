<?php

require_once("Head.php");


?>


<main class="col-md-10 offset-sm-1 ">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <article class="">
                <h1>Contact</h1>
                <p>Je kan ons altijd een mailtje sturen via <a
                            href="mailto:info@theater-oana.be">info@theater-oana.be</a>. </p>
                <p></p>


                <?php


                function sendmail()
                {

                }

                function echoForm()
                {
                    echo "<form action='contact.php' method='post' ><div><label for=\"naam\">Je naam:</label>" .
                        "<input type=\"text\" id=\"naam\" name=\"naam\" content='" . (isset($_POST["naam"]) ? $_POST["naam"] : "") . "'></div>" .

                        "<div><label for=\"email\">Je e-mail adres:</label>" .
                        "<input type=\"email\" name=\"email\" id=\"email\" content='" . (isset($_POST["email"]) ? $_POST["email"] : "") . "'></div>" .

                        "<div><label for=\"message\">Je bericht:</label>" .
                        "<textarea id=\"message\" name=\"message\" content=\"" . (isset($_POST["message"]) ? $_POST["message"] : "") . "\"></textarea></div> " .

                        "<input type=\"submit\" class=\"btn\">" .
                        "</form>";
                }

                if (isset($_POST["naam"]) && isset($_POST["message"])) {






                    if (empty($_POST["message"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                        echo "<p>Je moet nog de volgende velden invullen of verbeteren: ";
                        echo (isset($_POST["email"]) && $_POST["email"] != "" ? "e-mail " : "") . (isset($_POST["message"]) && $_POST["message"] != "" ? "bericht" : "") . "</p>";
                        echoForm();


                    } else {
                        $to = "info@theater-oana.be";
                        $subject = "Een mail van de pagina van " . $_POST["naam"];
                        $txt = $_POST["message"];
                        $headers = "From: " . $_POST["email"];


                        mail($to, $subject, $txt, $headers);

                        echo "<p>Je mail is verzonden!</p>";


                    }





                } else {


                    echo "<p>Of een berichtje sturen via het volgende formulier.</p>";


                    echoForm();


                }


                ?>


            </article>
        </div>




    </div>
</main>


<?php

require_once("Tail.php");

?>
