
<?php

$method = $_SERVER['REQUEST_METHOD'];
//Script Foreach
$c = true;
if ( $method === 'POST' ) {

	// $admin_email  = trim($_POST["admin_email"]);
	
	$form_subject = trim($_POST["form_subject"]);
	
	foreach ( $_POST as $key => $value ) {
		if ( $value != "" && $key != "admin_email" && $key != "form_subject" ) {
			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}


} else if ( $method === 'GET' ) {

	// $admin_email  = trim($_GET["admin_email"]);
	$form_subject = trim($_GET["form_subject"]);

	foreach ( $_GET as $key => $value ) {
		if ( $value != "" && $key != "admin_email" && $key != "form_subject" ) {

			$message .= "
			" . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
			<td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
			<td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
		</tr>
		";
	}
}
}
//$mailfrom = 'myto.lviv@gmail.com';
//$admin_email  = 'myto.lviv@gmail.com';
$mailfrom = ''; #todo
$admin_email  = ''; #todo
$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
	return '=?UTF-8?B?'.Base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From:  <'.$mailfrom.'>' . PHP_EOL .
'Reply-To: '.$mailfrom.'' . PHP_EOL;

mail($admin_email, adopt($form_subject), $message, $headers );

echo "Thanks";
