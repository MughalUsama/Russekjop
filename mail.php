<? 

$to      = 'mughalusama1133@gmail.com'; 

$subject = 'The test for php mail function'; 

$message = 'Hello'; 

$headers = 'From: russekjop@xn--russekjp-c5a.no' . "\r\n" . 

    'Reply-To: test@test.com' . "\r\n" . 

    'X-Mailer: PHP/' . phpversion(); 

mail($to, $subject, $message, $headers); 

?>