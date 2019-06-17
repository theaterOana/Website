<?php
/**
 * Created by PhpStorm.
 * User: matth
 * Date: 8/15/2018
 * Time: 10:38 PM
 */


 $eventIdArray = ["2175", "2177", "2176"] ;
    $amountSold = 0;
    $baseURL = 'https://www.ticketwinkel.be/Event/OrderTickets/';
    $htmlSellPage = '';
    
    foreach( $eventIdArray as $eventId){
       $htmlSellPage  =$htmlSellPage . file_get_contents($baseURL . $eventId);
    };
    



// count the red seats, remove the legend and blocked seats
    $amountSold = $amountSold + substr_count("$htmlSellPage", "sofa_red") -3 - 16*3;
    $maxSellAmount = 1197;



    echo '{"sold":'.$amountSold.', "maxSeats": '.$maxSellAmount.'}';

