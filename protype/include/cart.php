<?php
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"],
				'image'	        	=>	$_POST["hidden_image"]

			);
			$_SESSION["shopping_cart"][$count] = $item_array;
			echo ' 	<style type="text/css">
			 		div.messages{
			 			background-color: #ff6b6b;
			 			color: #f7fff7;
			 			font-size: 20px;
			 		}
			 		ul.messages{
			 			list-style-type: none;
			 		}
			 	</style>

			   <div class="messages">

					    <ul class="messages">
					      <li style="text-align: center;">Item Added! '.$_POST["hidden_name"].' </li>
					    </ul>

			    </div>';
		}
		else
		{
			foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					if($values["item_id"] == $_GET["id"])
					{
						$_SESSION["shopping_cart"][$keys]['item_quantity'] = $values["item_quantity"] + 1;
						echo ' 	<style type="text/css">
			 		div.messages{
			 			background-color: #ff6b6b;
			 			color: #f7fff7;
			 			font-size: 20px;
			 		}
			 		ul.messages{
			 			list-style-type: none;
			 		}
			 	</style>

			    <div class="messages">

			    <ul class="messages">
			      <li style="text-align: center;">Iteam Increased by 1</li>
			    </ul>

			    </div>';
						
					}
				}
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"],
			'image'	        	=>	$_POST["hidden_image"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
		echo ' 	<style type="text/css">
			 		div.messages{
			 			background-color: #ff6b6b;
			 			color: #f7fff7;
			 			font-size: 20px;
			 		}
			 		ul.messages{
			 			list-style-type: none;
			 		}
			 	</style>

			    <div class="messages">

					    <ul class="messages">
					      <li style="text-align: center;">Item Added! '.$_POST["hidden_name"].' </li>
					    </ul>

			    </div>';
	}
}


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				include 'include/cartrmessage.php';
			}
		}
	}
}


