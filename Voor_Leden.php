
<?php

require_once("Head.php");
require_once("Repo.php");

 ?>

  <main class="col-md-10 offset-sm-1 ">
    <div class="row">
      <div class="col-md-12">
<?php
$db = new Repo();
$ledenlijst = $db->getAllLeden();

?>
      </div>

    </div>
  </main>






<?php

require_once("Tail.php");
 ?>
