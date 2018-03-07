/**
 * Created by Matthias Bruynooghe on 14/11/2016.
 */



var init = function () {
includeHTML();
pageLocationFunction();



};

function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /*loop through a collection of all HTML elements:*/
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("include-html");
    if (file) {
      /*make an HTTP request using the attribute value as the file name:*/
      xhttp = new XMLHttpRequest();
try {

} catch (e) {

} finally {
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      if (this.status == 200) {elmnt.innerHTML = this.responseText;}
      includeHTML();
      /*remove the attribute, and call this function once more:*/
      elmnt.removeAttribute("include-html");
      includeHTML();
    }
}

      }
      try {
        xhttp.open("GET", file, true);
        xhttp.send();

      } catch (e) {

      } finally {

      }

      /*exit the function:*/
      return;
    }
  }
}
includeHTML();



pageLocationFunction = function(){
  var path = window.location.pathname;
  path = path.split("/").pop().split('.')[0];
  console.log(path);
  if (path === "index") {
    $('#breadcrum').html('Home')
    $('#home').addClass('active')
  }
  else {
    $('#breadcrum').html(path)
    $('#'+path).addClass('active')
  }
}



$(document).ready(init);
