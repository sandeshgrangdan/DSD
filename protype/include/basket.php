<?php  session_start();
	$cs = 0.000;
	$ct = 0.000;
	foreach($_SESSION["shopping_cart"] as $keys => $values){
                $cs += $values["item_quantity"]*2.000;
                $ct  += $values["item_quantity"]*$values["item_price"];
        }
        $_SESSION["full_price"] = $cs + $ct;
        echo number_format($cs,3).",".number_format($_SESSION["full_price"],3);

?>
