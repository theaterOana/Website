<?php

require_once($_SERVER['DOCUMENT_ROOT']."/Head.php");
 ?>




<main class="col-md-10 offset-md-1 ">

<div class='row'>

<div class="col-sm-12">
      <article>
        <h1 id="Countdown" style="text-align: center">Aftelklok Laden
</h1>
        <script>
// Set the date we're counting down to
var countDownDate = new Date("Jan 1, 2022 0:0:0:0").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("Countdown").innerHTML = days + "d " + hours + "u "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("Countdown").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
       
      </article>
    </div>
</div>


        
    </div>








  </div>
  </div>

</main>


<section class="sponsors">

</section>
<script type="text/javascript">
  if (navigator.serviceWorker.controller) {

  } else {

    //Register the ServiceWorker
    navigator.serviceWorker.register('sw.js', {
      scope: './'
    })
  }
</script>

<?php

 require_once($_SERVER['DOCUMENT_ROOT']."/Tail.php");
  ?>