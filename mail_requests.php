<?php
require_once("/home/pxx2xninpimm/cron/db.php");

$get_requests_query = "Select * from club_requests where mail_sent = \"0\";";
$unsent_requests = db::getInstance()->get_result($get_requests_query);
$to = null;
$message = "";
$temp_message = "Hei,\n   Du har fått en forespørsel fra %s for %s på Russekjøp. Logg deg inn på www.russekjøp.no for å besvare forespørselen. 
    \nMed vennlig hilsen
    Russekjøp";
    
$subject = 'Russekjøp-forespørsel';


$headers = 'From: ikkesvar@russekjøp.no' . "\r\n" .

'Reply-To: ikkesvar@russekjøp.no' . "\r\n" .

'X-Mailer: PHP/' . phpversion();
    
while ($row = $unsent_requests->fetch_assoc()) {
    if ($row["product_id"] != "136") {
        $get_business_query = "Select bi.contact_email from business_info bi join business_products bp on bi.business_id=bp.business_id where bp.product_id =\"{$row["product_id"]}\";";
        $b_email = db::getInstance()->get_result($get_business_query);
        if(!$b_email)
        {
            continue;
        }
        while ($business = $b_email->fetch_assoc()) {
            $to =($business["contact_email"]);
            $club_query = "Select club_name from clubs where club_id = \"{$row["club_id"]}\"";
            $cname = db::getInstance()->get_result($club_query);
            $cname = $cname->fetch_assoc();
            $pro_query = "Select * from products where product_id = \"{$row["product_id"]}\"";
            $pname = db::getInstance()->get_result($pro_query);
            $pname = $pname->fetch_assoc();
            $message = sprintf($temp_message,$cname["club_name"],$pname["product_name"]);
            mail($to, $subject, $message, $headers);

        }
    } else {
        $get_subpro_query = "Select * from detail3 where request_id = \"{$row["request_id"]}\";";
    
        $subproducts = db::getInstance()->get_result($get_subpro_query);
        if($subproducts)
        {
            while ($sProduct = $subproducts->fetch_assoc()) {
                $sProduct_id = 0;
                if($sProduct["Toilet_Paper"]=="Yes")
                {
                    $sProduct_id = 1;
                }
                elseif($sProduct["Paper_Towels"]=="Yes")
                {
                    $sProduct_id = 2;
                }
                elseif($sProduct["Socks"]=="Yes")
                {
                    $sProduct_id = 3;
                }
                elseif($sProduct["Lighter_Briquettes"]=="Yes")
                {
                    $sProduct_id = 4;
                }
                elseif($sProduct["Cleaning_Products"]=="Yes")
                {
                    $sProduct_id = 5;   
                }
                elseif($sProduct["Cookies_and_Goodies"]=="Yes")
                {
                    $sProduct_id = 6;   
                }
                elseif($sProduct["Greeting_Card_Or_Christmas_Card"]=="Yes")
                {
                    $sProduct_id = 7;
                }
                elseif($sProduct["Cured_Meat_and_Meat_Products	"]=="Yes")
                {
                    $sProduct_id = 8;   
                }
                else{
                    $sProduct_id = 9;
                }
                $get_business_query = null;
                if($sProduct_id==9)
                {
                    $get_business_query = "Select bi.contact_email from business_info bi join business_products bp on bi.business_id=bp.business_id where bp.product_id =\"{$row["product_id"]}\";";
                }
                else{
                    $get_business_query ="Select bi.contact_email from business_info bi join business_subproducts bp on bi.business_id=bp.business_id where bp.subproduct_id =\"{$sProduct_id}\";";
                }
                $b_email = db::getInstance()->get_result($get_business_query);
                if(!$b_email)
                {
                    continue;
                }
                while ($business = $b_email->fetch_assoc()) {
                    $to =($business["contact_email"]);
                    $club_query = "Select club_name from clubs where club_id = \"{$row["club_id"]}\"";
                    $cname = db::getInstance()->get_result($club_query);
                    $cname = $cname->fetch_assoc();
                    $pro_query = "Select * from products where product_id = \"{$row["product_id"]}\"";
                    $pname = db::getInstance()->get_result($pro_query);
                    $pname = $pname->fetch_assoc();
                    $message = sprintf($temp_message,$cname["club_name"],$pname["product_name"]);
                    mail($to, $subject, $message, $headers);
                }

            }
        }
        else{
            $b_email = null;
        }

    }
// sending mail

}
$update_sent = "Update club_requests SET mail_sent = \"1\";";
db::getInstance()->dbquery($update_sent);


?>