<?php
/**
 * Created by PhpStorm.
 * User: matth
 * Date: 8/15/2018
 * Time: 10:38 PM
 */

if (apcu_exists("OanaTicketsSold")){
  echo apcu_fetch("OanaTicketsSold");
}
else{
   $eventIdArray = ["2175", "2177", "2176"] ;
    $baseURL = 'https://www.ticketwinkel.be/Event/OrderTickets/';
    $clickableSeats = array();
    $seatsCounted = array();
    
    foreach( $eventIdArray as $eventId){
       $htmlSellPage = file_get_contents($baseURL . $eventId);
      array_push($clickableSeats, substr_count($htmlSellPage, "toggleReservationItem"));
      array_push($seatsCounted, substr_count($htmlSellPage, "CCDeBrouckère"));
    };
    



// count the red seats, remove the legend and blocked seats
    $blockedSeats =  4;
    $amountSold = array_sum($seatsCounted) - array_sum($clickableSeats) - ($blockedSeats * (count($eventIdArray)));
   $maxSellAmount = array_sum($seatsCounted) - ($blockedSeats * (count($eventIdArray)));

   //get sold per day
   $soldPerDay = array();
   foreach (array_keys($seatsCounted + $clickableSeats ) as $key) {
       $soldPerDay[$key] = $seatsCounted[$key] - $clickableSeats[$key] - $blockedSeats;
   }


 $response = '{"sold":'.$amountSold.', "maxSeats": '.$maxSellAmount.', "blockedSeats": '.$blockedSeats.', "soldPerDay":'. json_encode($soldPerDay) . ' }';
 apcu_add ( "OanaTicketsSold" , $response, 3600 );


    echo $response;
  }

