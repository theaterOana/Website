<?php
/**
 * Created by PhpStorm.
 * User: matth
 * Date: 8/15/2018
 * Time: 10:38 PM
 */

    $amountSold = 0;
    $htmlSellPage = file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/641') . file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/642'). file_get_contents('https://www.ticketwinkel.be/Event/OrderTickets/643');



    $amountSold = $amountSold + substr_count("$htmlSellPage", "sofa_red") - 3 - 12*3;
    $maxSellAmount = 1089;



    echo '{"sold":'.$amountSold.'}';

