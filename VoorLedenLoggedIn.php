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
<h2> Aantal verkochte tickets</h2>
<h2 id="sold">356</h2>
<p>Bedankt dat je de pagina nog eens bekijkt. Binnenkort weten we het echte aantal verkochtte tickets. Kom binnenkort nog eens terug.</p>



</div>


        </div>

    </div>
</main>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="/assets/js/voor_leden.js"></script>



