<?php
/**
 * LOGIC
 */


define('MAIL_DEST', 'commerciale.alessandro@susimoda.it');
define('MAIL_SUBJECT', 'Nuovo contatto dal sito');

 
// work flow
$showForm = true;
$showConfirmMsg = false;
$showMailErrorMsg = false;
$showFormErrorMsg = false;

// validation errors
$isFormValid = true;
$invalidEmail = false;
$invalidPrivacy = false;
$invalidMessage = false;

// form fields values
$nameField = '';
$farmField = '';
$emailField = '';
$telField = '';
$faxField = '';
$messageField = '';

$privacyField = 0;
if (isset($_POST['privacy'])) {
	$privacyField = $_POST['privacy'];	
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	
	// data persistancy
	$nameField = $_POST['name'];
	$farmField = $_POST['farm'];
	$emailField = $_POST['email'];
	$telField = $_POST['tel'];
	$faxField = $_POST['fax'];
	$messageField = $_POST['message'];
	
	
	// validate email
	if (!isValidEmail($emailField)) {
		$invalidEmail = true;
		$isFormValid = false;
	}
	
	// validate privacy
	if (!isValidPrivacy($privacyField)) {
		$invalidPrivacy = true;
		$isFormValid = false;
	}
	
	// validate message
	if (!isValidMessage($messageField)) {
		$invalidMessage = true;
		$isFormValid = false;
	}
	
	
	// i decide if to try to send the mail
	if ($isFormValid) {
		
		// horrible composition of the message!
		$ln = "\r\n";
		$emailBody = "Nominativo:" . $ln . $nameField . $ln . $ln;
		$emailBody.= "Azienda:" . $ln . $farmField . $ln . $ln;
		$emailBody.= "Mail:" . $ln . $emailField . $ln . $ln;
		$emailBody.= "Tel:" . $ln . $telField . $ln . $ln;
		$emailBody.= "Fax:" . $ln . $faxField . $ln . $ln;
		$emailBody.= $messageField;
		
		if (sendMail($emailField, MAIL_DEST, MAIL_SUBJECT, $emailBody)) {
			$showForm = false;
			$showConfirmMsg = true;
		} else {
			$showMailErrorMsg = true;
		}
	} else {
		$showFormErrorMsg = true;
	}
	
}





function sendMail($from, $to, $sub, $msg) {
	$headers = 	"From: $from" . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();
	return mail($to, $sub, $msg, $headers);
}

function isValidEmail($a) {
	return filter_var($a, FILTER_VALIDATE_EMAIL);
}


function isValidPrivacy($a) {
	return $a == 1;
}

function isValidMessage($a) {
	return !empty($a);
}
 
 
 
// temporary, to be deleted soon
function debug($var = false, $showHtml = false) {
    print "\n<pre class=\"cake_debug\">\n";
    
    ob_start();
    print_r($var);
    $var = ob_get_clean();

    if ($showHtml) {
        $var = str_replace('<', '&lt;', str_replace('>', '&gt;', $var));
    }
    
    print "{$var}\n</pre>\n";
};
 
 
 
 
 
 
 
 
 
 
 
 
/**
 * PRESENTATION
 */ 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Contatti | Calzaturificio Susimoda</title>
    <meta name="keywords" content="Coll. Primavera/Estate, Calzaturificio Susimoda | Scarpe Susimoda | Calzature susimoda" />
    <meta name="description" content="Coll. Primavera/Estate, Tel: 0444 874412 | Fax: 0444 874834 | E-mail: info@susimoda.it | Il Calzaturificio Susimoda è ad Orgiano in provincia di Vicenza. Il Calzaturificio propone collezioni pratiche, comode, salutari e alla moda. Susimoda ha una rete di agenti in tutta Italia.
      Le calzature susimoda sono una garanzia per i tuoi piedi., Coll. Primavera/Estate, Calzaturificio Susimoda | Scarpe Susimoda | Calzature susimoda" />
    <meta http-equiv="content-language" content="it" />
    <link rel="canonical" href="http://www.susimoda.it/it/p-34.coll.primavera/estate.html" />
    <link href="/img/artisteer/favicon.ico" type="image/x-icon" rel="icon" />
    <link href="/img/artisteer/favicon.ico" type="image/x-icon" rel="shortcut icon" />
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
    <!-- jQuery's core library with some CakePHP application's settings. -->
    <script type="text/javascript" src="./assets/js/jQuery.js"></script>
    <script type="text/javascript">
        /* <![CDATA[ */
        var __appPath__ = document.location.pathname;
        var __appBase__ = "/susimoda_it";
        if (__appPath__.substring(0, __appBase__.length) != __appBase__) __appBase__ = "";
        var __appPlugin__ = "";
        var __appController__ = "ppages";
        var __appAction__ = "read_page";
        var __appLang__ = "it";
        /* ]]> */
    </script>
    <!-- jQuery's CSS -->
    <!-- jQuery's Javascript -->
    <script type="text/javascript" src="./assets/js/jquery.caroufredsel.js"></script>
    <script type="text/javascript" src="./assets/js/prettyphoto.jquery.js"></script>
    <script type="text/javascript" src="./assets/js/project.js"></script>
</head>
</head>

<body>
    <!-- StartBlock: #page-wrapper -->
    <div id="page-wrapper">
        <!-- StartBlock: #logo-wrapper -->
        <div id="logo-wrapper" class="lrow">
            <div class="lbox">
                <div id="logo">
                    <a href="/" title="Calzaturificio Susimoda">
                        <img src="./assets/img/Susimoda-logo.jpg" alt="Susimoda + Calzaturificio RIDOTTA.jpg" width="972" height="183" />
                    </a>
                    <span class="clr"></span>
                </div>
                <span class="clr"></span>	
            </div>
        </div>
        <hr class="str" />
        <!-- CloseBlock: #logo-wrapper -->
        <!-- StartBlock: #header-wrapper -->
        <div id="header-wrapper" class="lrow">
            <div class="lbox">
                <!-- StartBlock: #mm -->
                <div id="mm">
                    <ul>
                        <li class=" "><a href="/" title="Calzaturificio Susimoda">Home</a>
                        </li>
                        <li><a href="./azienda.html" title="Azienda">Azienda</a>
                        </li>
                        <li><a href="./primavera-estate.html" title="Coll. Primavera/Estate">Coll. Primavera/Estate</a>
                        </li>
                        <li><a href="./autunno-inverno.html" title="prodotti susimoda 2013">Coll. Autunno/Inverno</a>
                        </li>
                        <li><a href="./agenti.html" title="Agenti">Agenti</a>
                        </li>
                        <li><a href="./contatti.php" class=" selected" title="Contatti">Contatti</a>
                        </li>
                        <li><a href="./dove-siamo.html" title="Dove Siamo">Dove Siamo</a>
                        </li>
                        <li><a href="./advertising.html" title="advertising susimoda 2011">Advertising</a>
                        </li>
                    </ul>
                </div>
                <!-- CloseBlock: #mm -->
                <span class="clr"></span>
            </div>
            <span class="clr"></span>
        </div>
        <hr class="str" />
        <!-- CloseBlock: #header-wrapper -->


        <!-- StartBlock: #content-wrapper -->
        <div id="content-wrapper" class="lrow">
            <div class="lbox">
                <div class="col col-double">
                
                
                
                <?php if ($showMailErrorMsg): ?>
				<h1>Mi spiace si sono verificati dei problemi tecnici. Riprova!</h1>
				<hr>
				<?php endif; ?>
                
                
                
                <?php if ($showForm): ?>
                <div class="Post article">
                    <h1 class="title">Contattaci</h1>
                    <p>Compilando questo form sarà contattato da un nostro responsabile e potrà ricevere maggiori informazioni sui nostri prodotti</p>
                </div>

                <form action="contatti.php" method="post" enctype="multipart/form-data" id="" class="cvform " style="">
                
                	<?php if ($showFormErrorMsg): ?>
                	<h1 style="color:#900">Attenzione: si sono verificati degli errori!</h1>
                	<?php endif; ?>

                    <div class="cvform_field cvform_name">
                        <label for="FormMailName">Nominativo:</label>
                        <input name="name" class="cvform_string" size="41" value="<?= $nameField ?>" type="text" id="FormMailName" /><span class="clr clearfix"></span>
                    </div>
                    <div class="cvform_field cvform_farm">
                        <label for="FormMailFarm">Azienda:</label>
                        <input name="farm" class="cvform_string" size="41" value="<?= $farmField ?>" type="text" id="FormMailFarm" /><span class="clr clearfix"></span>
                    </div>
                    <div class="cvform_field cvform_mail">
                        <label for="FormMailMail">E-Mail:</label>
                        <input name="email" class="cvform_string" size="41" value="<?= $emailField ?>" type="text" id="FormMailMail" /><span class="clr clearfix"></span>
                        <?php if ($invalidEmail): ?>
                        <div class="cvform_errors"><div class="error_message">per favore inserisci una mail valida</div></div>
                        <?php endif; ?>
                    </div>
                    <div class="cvform_field cvform_phone1">
                        <label for="FormMailPhone1">Tel:</label>
                        <input name="tel" class="cvform_string" size="41" value="<?= $telField ?>" type="text" id="FormMailPhone1" /><span class="clr clearfix"></span>
                    </div>
                    <div class="cvform_field cvform_phone2">
                        <label for="FormMailPhone2">Fax:</label>
                        <input name="fax" class="cvform_string" size="41" value="<?= $faxField ?>" type="text" id="FormMailPhone2" /><span class="clr clearfix"></span>
                    </div>
                    <div class="cvform_field cvform_msg">
                        <label for="FormMailMsg">Messaggio:</label>
                        <textarea name="message" class="cvform_text" cols="41" rows="5" id="FormMailMsg"><?= $messageField ?></textarea><span class="clr clearfix"></span>
                        <?php if ($invalidMessage): ?>
                        <div class="cvform_errors"><div class="error_message">per favore inserisci un messaggio</div></div>
                        <?php endif; ?>
                    </div>
                    <div class="cvform_field cvform_checkbox  cvform_privacy">
	                    <?php if ($invalidPrivacy): ?>
                        <div class="cvform_errors"><div class="error_message">per favore accetta le nostre condizioni sul trattamento dei dati</div></div>
                        <br>
                        <?php endif; ?>
                        <input type="checkbox" name="privacy" class="cvform_check" value="1" id="FormMailPrivacy" />
                        <label for="FormMailPrivacy">Si autorizza il trattamento dei dati personali ai sensi del D. Lgs. n°196 del 30.06.03 come indicato nel
                            <a target="_blank" title="informativa privacy e gestione dati personali" href="./privacy.html">documento di informativa sulla privacy e gestione dati personali</a>
                            in questo sito web.</label><span class="clr clearfix"></span>
                    </div>

                    <div class="cvform_submit">
                        <input type="submit" value="Invia!" />
                    </div>



                </form>
                <?php endif; // $showForm ?>
                
				
				<?php if ($showConfirmMsg): ?>
				<h1>La tua richiesta è stata correttamente inviata!</h1>
				<?php endif; ?>
				
            </div>
        </div>
        <span class="clr "></span>
    </div>
        <!-- CloseBlock: #content-wrapper -->
        <!-- StartBlock: #footer-wrapper -->
        <div id="footer-wrapper">
            <div id="footer" class="lbox">
                <p>Calzaturificio Susimoda Srl - Via dell'Industria, 1 - 36040 Orgiano (VI) Italy - Tel. 0444 874412 - Fax 0444 874834 - E-mail: info@susimoda.it
                    <br />P.I. 01574680243 - Cap. Soc. € 115.000 i.v. - Reg. Imp. VI 14822 - R.E.A. VI 171153</p>
                <p> <a href="./privacy.html" title="Testo completo informativa sulla privacy e tutela dati personali">Privacy</a>
                </p>
            </div>
            <span class="clr"></span>
        </div>
        <!-- CloseBlock: #footer-wrapper -->
        <!-- StartBlock: #credits-wrapper -->
        <div id="credits-wrapper">
            <div id="credits" class="lbox">
                <!-- StartBlock: credits_xhtml -->
                <div class="page-footer jcms-credits">
                    <p class="jcms-credits-row1">
                        sito web professionale realizzato da <a href="http://www.adessoweb.biz" title="realizzazione siti web economici a partire da 159Euro!" style="text-decoration:none;">AdessoWEB.biz</a>
                    </p>
                </div>
            </div>
            <!-- CloseBlock: credits_xhtml -->
        </div>
        <!-- CloseBlock: #credits-wrapper --
        </div>
        <!-- CloseBlock: #page-wrapper -->
        <script type="text/javascript" src="./assets/js/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="./assets/js/nivoslider.v1.js"></script>
</body>

</html>
