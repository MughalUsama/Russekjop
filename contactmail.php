<?php
ob_start();
require_once("./db.php");
$query = "Select * from contact_us where sent='0';";
$data = db::getInstance()->get_result($query);
$to      = 'russekjop@xn--russekjp-c5a.no'; 
$subject = 'RussekJop - Contact us'; 




if($data){
    while($brow = mysqli_fetch_assoc($data)){

    $Name = $brow["Name"];
    $Email = $brow["Email"];
    $Telephone = $brow["Telephone"];
    $CMessage = $brow["Message"];
    $mail_msg = "Hi, this is $Name here. I contacted you through Russekjop.
    Name: $Name
    Email : $Email
    Telephone : $Telephone
    Message: $CMessage
    ";
    $message = $mail_msg;
    $headers = 'From: $Email' . "\r\n" . 

    'Reply-To: $Email' . "\r\n" . 

    'X-Mailer: PHP/' . phpversion(); 
    // mail here
    mail($to, $subject, $message, $headers); 


}
$updatequery = "UPDATE contact_us SET sent = '1' where sent = '0';";
db::getInstance()->dbquery($updatequery);
}
?>
