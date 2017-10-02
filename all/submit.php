<?php

$method = $_SERVER['REQUEST_METHOD'];

//Script Foreach
$c = true;
if ( $method === 'POST' ) {

  $name = trim($_POST["name"]);
  $from_email  = trim($_POST["from_email"]);
  $project_name = trim($_POST["project_name"]);
  $user_email  = trim($_POST["user_email"]);
  $form_subject = trim($_POST["form_subject"]);

    foreach ( $_POST as $key => $value ) {
      if ( $value != "" && $key != "project_name" && $key != "user_email" && $key != "form_subject" ) {
        $message .= "
        " . ( ($c = !$c) ? '<tr>':'<tr style="background-color: #f8f8f8;">' ) . "
        <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>$key</b></td>
        <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
      </tr>
      ";
    }
  }
}

$message = "<table style='width: 100%;'>$message</table>";

function adopt($text) {
  return '=?UTF-8?B?'.base64_encode($text).'?=';
}

$headers = "MIME-Version: 1.0" . PHP_EOL .
"Content-Type: text/html; charset=utf-8" . PHP_EOL .
'From: '.adopt($project_name).' <'.$user_email.'>' . PHP_EOL .
'Reply-To: '.$user_email.'' . PHP_EOL;

mail($from_email, adopt($form_subject), $message, $headers );
