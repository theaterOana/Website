 <script type="text/javascript" src="sw.js"></script>
 <script type="text/javascript">
 	if (navigator.serviceWorker.controller) {
  
} else {

//Register the ServiceWorker
  navigator.serviceWorker.register('sw.js', {
    scope: './'
  }).then(function(reg) {
    
  });
}
 </script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script type="text/javascript" src="assets\js\bootstrap.min.js"></script>
 <script type="text/javascript" src="assets/js/main.js">
 </script>

</body>

</html>
