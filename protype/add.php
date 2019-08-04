<?php
session_start();
        $service = 0.00;
        $total_product = 0.000;

        if(isset($_POST["add"])){
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                                if($values["item_id"] == $_POST["add"])
                                {
                                        $_SESSION["shopping_cart"][$keys]['item_quantity'] = $values["item_quantity"] + 1;
                                        $q = $values["item_quantity"] + 1;
                                        $p = number_format($q*$values["item_price"],2);
                                        echo $q.","."$".$p;;
                                }else{
                                        
                                }
                        }
        }
        if(isset($_POST["sub"])){
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                                if($values["item_id"] == $_POST["sub"])
                                {   
                                        if($values["item_quantity"] > 1){
                                                $_SESSION["shopping_cart"][$keys]['item_quantity'] = $values["item_quantity"] - 1;
                                                $q = $values["item_quantity"] - 1;
                                                $p = number_format($q*$values["item_price"],2);
                                                echo $q.","."$".$p;
                                        }else{
                                                echo "1";
                                        }
                                }else{
                                        echo '';
                                       
                                }
                        }
        }

        foreach($_SESSION["shopping_cart"] as $keys => $values){
                $service += $values["item_quantity"]*2.000;
                $total_product  += $values["item_quantity"]*$values["item_price"];
        }

        $_SESSION["full_price"] = $service + $total_product;

?>
