<?php
session_start();

$resetcode = mt_rand(100000,999999);
$_SESSION["resetcode"] = $resetcode;

$to_email = $_REQUEST["email"];
$_SESSION["resetmail"] = $to_email;
$subject = "Reset SportsReg password";
$body = "Hi, your reset code for SportsReg account is $resetcode";
$headers = "From: SportsReg";
$mailsent[] = [];
if (mail($to_email, $subject, $body, $headers)) {
    $mailsent[]=array(
        'sent' => "1"
    );
}
 else 
{
    $mailsent[]=array(
        'sent' => "0"
    );
}

print_r(json_encode($mailsent));
?>