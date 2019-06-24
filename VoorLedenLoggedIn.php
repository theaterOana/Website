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

<p>Binnenkort komt hier de info over verkochte tickets en beloningen</p>
</div>


        </div>

    </div>
</main>


