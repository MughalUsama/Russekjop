<?php 
require_once("../../db.php");
session_start();
$reqdata = array();
$clubdata = array();
$productdata = array();
$additionaldata = array();
$businessdata = array();
if (array_key_exists( "adminloggedin",$_SESSION)) {
    $query = "Select * from club_requests where accepted_by is NULL;";
    $bresult = db::getInstance()->get_result($query);
    if ($bresult) {
        while($row = $bresult->fetch_assoc())
        {
            if($row["table_name"]!=null)
            {
                $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                $additionalresult = db::getInstance()->get_result($additionalQuery);
                if($additionalresult){
                    array_push($additionaldata,$additionalresult->fetch_assoc());
                }
                else{
                    array_push($additionaldata,array());
                }
            }            
            else{
                array_push($additionaldata,array());
            }
            array_push($reqdata,$row);
            $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
            $clubresult = db::getInstance()->get_result($query1);
            array_push($clubdata,$clubresult->fetch_assoc());
            $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
            $productresult = db::getInstance()->get_result($query2);
            array_push($productdata,$productresult->fetch_assoc());
        }
    }
    $data = array(
        "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
        "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
        "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
        "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
    );
	print_r(json_encode($data));

}
elseif(array_key_exists("businessloggedin",$_SESSION))
{
    if($_REQUEST["accepted"]=="1"){
        $query = "Select * from club_requests where status =\"1\" and accepted_by=\"{$_SESSION["userdata"]["business_id"]}\";";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult){
            while($row = $bresult->fetch_assoc())
            {
                if($row["table_name"]!=null)
                {
                    $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                    $additionalresult = db::getInstance()->get_result($additionalQuery);
                    if($additionalresult){
                        array_push($additionaldata,$additionalresult->fetch_assoc());
                    }
                    else{
                        array_push($additionaldata,array());
                    }
                }
                else{
                    array_push($additionaldata,array());
                }
                array_push($reqdata,$row);
                $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
                $clubresult = db::getInstance()->get_result($query1);
                array_push($clubdata,$clubresult->fetch_assoc());
                $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
                $productresult = db::getInstance()->get_result($query2);
                array_push($productdata,$productresult->fetch_assoc());
            }
            $data = array(
                "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
                "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
                "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
                "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
            );
            print_r(json_encode($data));        
        }

    }
    else{

        $query = "Select * from club_requests where  status =\"0\" and accepted_by is NULL and category_id in(Select category_id from business_categories where business_id = \"{$_SESSION["userdata"]["business_id"]}\") and product_id in(Select product_id from business_products where business_id = \"{$_SESSION["userdata"]["business_id"]}\");";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult){
            while($row = $bresult->fetch_assoc())
            {
                $isAdd = true;
                $queryA = "Select subproduct_id from business_subproducts where business_id = \"{$_SESSION["userdata"]["business_id"]}\"";
                $subproresult = db::getInstance()->get_result($queryA);
                
                if($row["table_name"]!=null)
                {
                    $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                    $additionalresult = db::getInstance()->get_result($additionalQuery);
                    $row1 = $additionalresult->fetch_assoc();
                    if($row["table_name"]=="detail3")
                    {
                        if ($subproresult) {
                            # code...
                            while ($sprow = $subproresult->fetch_assoc()) {
                            # code...
                                switch ($sprow["subproduct_id"]) {
                                    case 1:
                                        # code...
                                        if($row1["Toilet_Paper"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }
                                        break;
                                    case 2:
                                        # code...
                                        if($row1["Paper_Towels"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 3:
                                        # code...
                                        if($row1["Socks"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 4:
                                        # code...
                                        if($row1["Lighter_Briquettes"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 5:
                                        # code...
                                        if($row1["Cleaning_Products"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 6:
                                        # code...
                                        if($row1["Cookies_and_Goodies"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 7:
                                        # code...
                                        if($row1["Greeting_Card_Or_Christmas_Card"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                    case 8:
                                        # code...
                                        if($row1["Cured_Meat_and_Meat_Products"] == "Yes")
                                        {
                                            $isAdd = true;
                                        }
                                        else{
                                            $isAdd = false;
                                        }

                                        break;
                                            
                                    default:
                                        # code...
                                        break;
                                    }                            
                                }
                            }
                            else{
                                $isAdd = false;
                            }
                            if ($row1["Other"] == "Yes") { //showing in case of other option selected
                                $isAdd = true;
                        }        
                    }
                    if($additionalresult and $isAdd){
                        array_push($additionaldata,$row1);
                    }
                    elseif($isAdd==true){
                        array_push($additionaldata,array());
                    }
                }
                else if($isAdd==true){
                    array_push($additionaldata,array());
                }
                if($isAdd)
                {
                    array_push($reqdata,$row);
                    $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
                    $clubresult = db::getInstance()->get_result($query1);
                    array_push($clubdata,$clubresult->fetch_assoc());
                    $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
                    $productresult = db::getInstance()->get_result($query2);
                    array_push($productdata,$productresult->fetch_assoc());
                }
            }
            $data = array(
                "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
                "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
                "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
                "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
            );
            print_r(json_encode($data));        
        }

    }
}
elseif(array_key_exists("clubloggedin",$_SESSION))
{
    if($_REQUEST["accepted"]=="1")
    {
        $query = "Select * from club_requests where status =\"1\" and club_id=\"{$_SESSION["userdata"]["club_id"]}\" ;";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult){
            while($row = $bresult->fetch_assoc())
            {
                if($row["table_name"]!=null)
                {
                    $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                    $additionalresult = db::getInstance()->get_result($additionalQuery);
                    if($additionalresult){
                        array_push($additionaldata,$additionalresult->fetch_assoc());
                    }
                    else{
                        array_push($additionaldata,array());
                    }
                }
                else{
                    array_push($additionaldata,array());
                }
                array_push($reqdata,$row);
                $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
                $clubresult = db::getInstance()->get_result($query1);
                array_push($clubdata,$clubresult->fetch_assoc());

                $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
                $productresult = db::getInstance()->get_result($query2);
                array_push($productdata,$productresult->fetch_assoc());
                
                $query3 = "Select * from business_info where business_id = \"{$row["accepted_by"]}\";";
                $businessresult = db::getInstance()->get_result($query3);
                array_push($businessdata,$businessresult->fetch_assoc());

            }
            $data = array(
                "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
                "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
                "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
                "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8"),
                "business" => mb_convert_encoding($businessdata, "HTML-ENTITIES", "UTF-8")
            );
            print_r(json_encode($data));        
        }
    }
    else{
        $query = "Select * from club_requests where club_id=\"{$_SESSION["userdata"]["club_id"]}\" ;";
        $bresult = db::getInstance()->get_result($query);
        if ($bresult){
            while($row = $bresult->fetch_assoc())
            {
                if($row["table_name"]!=null)
                {
                    $additionalQuery = "Select * from {$row["table_name"]} where request_id = {$row["request_id"]};";
                    $additionalresult = db::getInstance()->get_result($additionalQuery);
                    if($additionalresult){
                        array_push($additionaldata,$additionalresult->fetch_assoc());
                    }
                    else{
                        array_push($additionaldata,array());
                    }
                }
                else{
                    array_push($additionaldata,array());
                }
                array_push($reqdata,$row);
                $query1 = "Select * from clubs where club_id = \"{$row["club_id"]}\";";
                $clubresult = db::getInstance()->get_result($query1);
                array_push($clubdata,$clubresult->fetch_assoc());
                $query2 = "Select * from products where product_id = \"{$row["product_id"]}\";";
                $productresult = db::getInstance()->get_result($query2);
                array_push($productdata,$productresult->fetch_assoc());
            }
            $data = array(
                "req" => mb_convert_encoding($reqdata, "HTML-ENTITIES", "UTF-8"),
                "user" => mb_convert_encoding($clubdata, "HTML-ENTITIES", "UTF-8"),
                "product" => mb_convert_encoding($productdata, "HTML-ENTITIES", "UTF-8"),
                "additionaldata" => mb_convert_encoding($additionaldata, "HTML-ENTITIES", "UTF-8")
            );
            print_r(json_encode($data));        
        }
    }
}
?>