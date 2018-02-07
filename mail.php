<?
/* 	
	mail.php - versie 1.3 (20051010)
	Jimmy Cappaert <jimmy@priorweb.be>
	http://www.priorweb.be

	Wijziging versie 1.3
	- veldcontrole is nu configureerbaar per veld ($BODY_FIELDS_CHECK)
	- veldspecifi ring is aangepast ($BODY_FIELDS)
		-Cedric Dubois <cedric.dubois@priorweb.be>

	Wijzigingen versie 1.2
	- mogelijkheid om veldcontrole uit te schakelen
	- na het versturen de pagina forwarden naar een andere pagina ipv een melding te geven
		-Jimmy Cappaert <jimmy.cappaert@priorweb.be>

	Deze code heeft als doel te fungeren als een mailer voor een HTML-formulier.
	U kan deze file specifi ren in de ACTION van uw HTML-formulier. 
*/

ob_start();

//	INVULSECTIE 
//	GELIEVE DIT EERST IN TE VULLEN ALVORENS HET FORMULIER IN GEBRUIK TE NEMEN

//	Het adres naar waar de e-mail moet afgeleverd worden (verplicht)
//	Dit kan in 2 vormen: Uw naam <uw@adres.be> of gewoon uw@adres.be.
$HEADER_TO = "Toneelkring De vondeling <info@devondeling.net >";
//	Het adres waar een CC van de e-mail moet afgeleverd worden (niet verplicht)
$HEADER_CC = "";
//	Het adres waar een BCC van de e-mail moet afgeleverd worden (niet verplicht)
$HEADER_BCC = "";
//	De afzender van de e-mail
$HEADER_FROM = "Webformulier toneelkring De Vondeling <info@devondeling.net>";
//	Het onderwerp van de e-mail
$HEADER_SUBJECT = "Ingevuld formulier website De Vondeling";

//	Tip: je kan hier altijd een file includen om eventuele tekstopmaak in te plaatsen.
//	Includen kan op volgende manier: include("bestandsnaam.php");
//	Je kan ook HTML code in de variablen zetten. (bv linebreaks, fonts, ...)

//	Naam en beschrijving van de velden die verstuurd moeten worden	
//	Bv array('naam'=>'Naam', 'voornaam'=>'Voornaam');
$BODY_FIELDS = array('name'=>'Naam',  'email'=>'Emailadres', 'subject' =>'Onderwerp', 'message'=>'Boodschap');
//	Tekst die bovenaan (boven de velden) van de e-mail moet staan. Gebruik \n voor een nieuwe lijn.
$BODY_HEADER = "Dit is het restultaat van het formulier dat verstuurd via het contactformulier van www.toneelkringdevondeling.be:";
//	Tekst die onderaan (onderaan de velden) van de e-mail moet staan. Gebruik \n voor een nieuwe lijn.
$BODY_FOOTER = "Einde van het bericht.";
//	Moet het IP-adres van de verzender van het formulier mee verzonden worden? (1 = ja / 0 = neen)
$BODY_SHOWIP = 1;

//      Controle of de velden allemaal werden ingevuld? (1 = ja / 0 = neen)
$RESULT_DOCHECK = 1;
//	Indien u enkel bepaalde velden wenst te controleren, geef deze hier op en vul
//	hierboven 0 in ($RESULT_DOCHECK = 0;)
$BODY_FIELDS_CHECK = array('naam', 'voornaam');
//	Welke boodschap moet er weergegeven worden wanneer een veld niet werd ingevuld?
//	Na de boodschap volgt de betreffende veldnaam.
$RESULT_FIELDMISSING = "Volgend veld werd niet ingevuld:";




//	EINDE INVULSECTIE
//	U BENT VRIJ DE CODE DIE HIERONDER STAAT AAN TE PASSEN, MAAR BEDENK DAT U DAN HIEROP
//	GEEN SUPPORT MEER ZAL KRIJGEN




 $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $email=$_POST['comment'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }

if(!$captcha){
          echo '<h2 style="text-align: center; color: red; font-family: arial, sans-serif"><br/><br/>Om uw privacy te beschermen, verzoeken wij u te klikken op het vierkantje in de captcha.
		  </h2>';
          exit;
        } 
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeGcQUTAAAAANgi3wyfxOsgPKqt33eeVQ-_8rbx&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>Bericht kan niet verstuurd worden!</h2>';
        }else
        {
          echo '<h2 style="text-align: center"><br/><br/><br/>Bedankt voor uw boodschap.<br/>Wij behandelen uw bericht zo vlug mogelijk.</h2>';
        }



if (count($BODY_FIELDS) < 1) {
	echo "Sorry, er moet minstens 1 veld zijn om te verzenden!\n";
	return 0;
}

if($RESULT_DOCHECK == 1) {
	foreach($BODY_FIELDS as $key=>$value) {
		if(!$_POST[$key]) {
			$STOP_SCRIPT = 1;
			echo $RESULT_FIELDMISSING." ".$BODY_FIELDS[$key]."<br>\n";
		}
	}
} elseif(count($BODY_FIELDS_CHECK) > 0) {
	foreach($BODY_FIELDS_CHECK as $value) {
		if(!$_POST[$value]) {
			$STOP_SCRIPT = 1;
			echo $RESULT_FIELDMISSING." ".$BODY_FIELDS[$value]."<br>\n";
		}
	}
}

if($STOP_SCRIPT == 1) {
        return 0;
}

$BODY_MESSAGE_FIELDS = "";
foreach($BODY_FIELDS as $key=>$value) {
	$BODY_MESSAGE_FIELDS .= stripslashes($value.": ".$_POST[$key]."\n");
}

$BODY_HEADERS  = "From: $HEADER_FROM\n";
$BODY_HEADERS .= "Cc: $HEADER_CC\n";
$BODY_HEADERS .= "Bcc: $HEADER_BCC";
$BODY_MESSAGE  = $BODY_HEADER."\n\n";
$BODY_MESSAGE .= $BODY_MESSAGE_FIELDS."\n";
$BODY_MESSAGE .= $BODY_FOOTER."\n";

if($BODY_SHOWIP == 1) {
	$IP = (getenv(HTTP_X_FORWARDED_FOR))
	    ?  getenv(HTTP_X_FORWARDED_FOR)
            :  getenv(REMOTE_ADDR);
	$BODY_MESSAGE .= "IP-adres verzender: $IP";
}

mail($HEADER_TO, $HEADER_SUBJECT, wordwrap($BODY_MESSAGE), $BODY_HEADERS) or die($RESULT_FAIL);

if($RESULT_SUCCESS_TYPE == 1) {
	echo $RESULT_SUCCESS_MSG;
} else {
	header("Location: $RESULT_SUCCESS_URL");
}
?>
