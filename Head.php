<?php
$_url = $_SERVER['REQUEST_URI'];
$_url = explode('.', $_url)[0];
$_url = explode('/', $_url);

$_url = $_url[1];
if($_url == "index" || $_url == "Index"|| $_url == "") {
$_breadcrum =  "Home";
} else{
$_breadcrum = str_replace("_", " ", $_url);
} ?>

<!DOCTYPE html>
<html>

<head>
 <title>Theater O'ana</title>
 <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
 <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
 <link rel="manifest" href="manifest.json">
 <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
 <meta name="msapplication-TileColor" content="#ffc40d">
 <meta name="theme-color" content="#ffffff">

 <link href="assets/css/reset.css" rel="stylesheet">
 <link href="assets\css\bootstrap.min.css" rel="stylesheet">
 <link href="assets/css/header.css" rel="stylesheet">
 <link href="assets/css/screen.css" rel="stylesheet">
 <meta name="author" content="Matthias Bruynooghe" />
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>


 <header>

   <nav class="navbar navbar-expand-lg navbar-light aria-controls col-md-10 ">
     <a class="navbar-brand offset-sm-1" href="#"><?php echo $_breadcrum; ?></a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNav">
       <ol class="navbar-nav ">
         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum =="Home") { echo "active"; }  ?>" id="home" href="index.php">Home <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum == "Over Ons") { echo "active"; }  ?>"  id="overOns" href="Over_Ons.php">Over Ons</a>
         </li>
         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum == "huidige productie") { echo "active"; }  ?>" id="productie" href="huidige_productie.php">Productie</a>
         </li>

         <li class="nav-item logo  col-md-2">
           <a href="index.php">    <img id="Logo" class="nav-link" src="images\Logo-Oana.png" alt="Logo Theater O'ana">
 </a>

         </li>



         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum =="contact"){echo "active";}  ?>" id="contact <?php if($_url == "contact" ) { echo "active"; }  ?>" href="contact.php">Contact</a>
         </li>
         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum== "geschiedenis") { echo "active"; }  ?>" id="geschiedenis" href="geschiedenis.php">Geschiedenis</a>
         </li>
         <li class="nav-item  col-md-2">
           <a class="nav-link <?php if($_breadcrum== "Voor Leden") { echo "active"; }  ?>" id="voorleden" href="Voor_Leden.php">Voor leden</a>
         </li>
       </ol>
     </div>
   </nav>

   <p id="breadcrum"><?php

  echo $_breadcrum;

      ?></p>
 </header>
