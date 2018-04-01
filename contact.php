<?php

require_once("Head.php");


?>


<main class="col-md-10 offset-sm-1 ">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <article class="">
                <h1>E-mail</h1>
                <p>Je kan ons altijd een mailtje sturen via <a
                            href="mailto:info@theater-oana.be">info@theater-oana.be</a>. </p>


                <?php


                function echoForm()
                {
                    echo "   <form class=\"\" action=\"contact.php\" method=\"post\">" .

                        "<label for=\"naam\">Je naam</label>" .
                        "<input type=\"text\" id=\"naam\" name=\"naam\" content='" . (isset($_POST["naam"]) ? $_POST["naam"] : "") . "'>" .

                        "<label for=\"email\">Je e-mail adres</label>" .
                        "<input type=\"email\" name=\"email\" id=\"email\" content='" . (isset($_POST["email"]) ? $_POST["email"] : "") . "'>" .

                        "<label for=\"message\">Je bericht:</label>" .
                        "<input type=\"text\" id=\"message\" name=\"message\" content='" . (isset($_POST["message"]) ? $_POST["message"] : "") . "'>" .

                        "<input type=\"submit\">" .
                        "</form>";
                }

                if (isset($_POST["email"]) && isset($_POST["message"])) {


                    $to = "matthias.bruynooghe@gmail.com";
                    $subject = "Een mail van de pagina van " . $_POST["naam"];
                    $txt = $_POST["message"];
                    $headers = "From: " . $_POST["email"];


                    $email = test_input($_POST["email"]);
                    $emailErr = false;
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = true;
                    }


//                    if ($txt == "" || $emailErr) {
//                        echo "<p>Je moet nog de volgende velden invullen of verbeteren: ";
//                        echo (isset($_POST["email"]) && $_POST["email"] != "" ? "e-mail " : "") . (isset($_POST["message"]) && $_POST["message"] != "" ? "bericht" : "")."</p>";
//                        echoForm();
//
//
//                    } else {

                        echo "<p>Je mail is verzonden!</p>";

                        mail($to, $subject, $txt, $headers);


                   // }


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
