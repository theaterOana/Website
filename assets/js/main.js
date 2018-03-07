/**
 * Created by Matthias Bruynooghe on 14/11/2016.
 */



var init = function () {

pageLocationFunction();



};


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
