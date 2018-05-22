<?php
require_once("Head.php");

$name= "";

$name = $_GET["name"]+ "\n";

if ($name != ""){
  $gdprfile = fopen("GDPR_accaptence", "w");
    $gdprreadfile = fopen("GDPR_accaptence", "r");
  fwrite($gdprfile, $name);
fclose($gdprfile);
echo fread($gdprreadfile, filesize("GDPR_accaptence"));


}









 ?>
<div class="row">

  <form class="POST" action="gdpr.php" method="get">
    <input type="text" name="name" value="">
  </form>

  <?php echo $name; ?>
  <p>hierboven komt het</p>
</div>


<?php   require_once("Tail.php"); ?>
