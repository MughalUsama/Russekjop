<?php
    header('charset=utf-8');

    require_once("../../db.php");
	session_start();
    
	$productsdata= array();	
    $category_id = mysqli_escape_string(db::getInstance(), $_REQUEST["category"]);
    $sql = "SELECT * from products where category_id = {$category_id};";
    $result = db::getInstance()->get_result($sql);
    if ($result) {
        while($row = $result->fetch_assoc())
        {
            $productsdata[]=array(
                'product_id' => mb_convert_encoding($row["product_id"], "HTML-ENTITIES", "UTF-8"),
                'product_name' => mb_convert_encoding($row["product_name"], "HTML-ENTITIES", "UTF-8"),
                'category_id' => mb_convert_encoding($row["category_id"], "HTML-ENTITIES", "UTF-8"),
            );
        }
    }
	print_r(json_encode($productsdata));
?>