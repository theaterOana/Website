<?php
/**
 * Created by PhpStorm.
 * User: matth
 * Date: 8/15/2018
 * Time: 10:38 PM
 */

    $amountSold = 0;
    $baseURL = 'https://www.ticketwinkel.be/Event/OrderTickets/';
    $htmlSellPage = file_get_contents($baseURL . '2175') . file_get_contents($baseURL . '2177') . file_get_contents($baseURL . '2176');


// count the red seats, remove the legend and blocked seats
    $amountSold = $amountSold + substr_count("$htmlSellPage", "sofa_red") -3 - 16*3;
    $maxSellAmount = 1197;



    echo '{"sold":'.$amountSold.'}';

