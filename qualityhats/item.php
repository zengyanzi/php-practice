<?php
require_once "session.php";
$item = ItemDao::getItemById($_GET['item_id']);
include "head.php";
include "category.php";
?>
<div class="hat">
	<div class="path"></div>
	<div class="hat_info">
		<div class="hat_img">
			<?php 
			print("<img src='".$item->img."' title='".$item->item_name."' />");
			?>
		</div>
		<div class="hat_detail">
			<?php 
			print("<h4>".$item->item_name."</h4>");
			print("<h6>".$item->item_description."</h6>");
			print("<p>price : <span class='price'>$".$item->item_price."</span></p>");
			print("<p>Supplier : ".$item->supplier_id."</p>")
			?>
	        <div class="addcart">
	        <?php 
	        print("<a id='cart' class='btn btn-danger' href='cart.php?action=add&item_id=".$item->item_id."'>");
	        ?>
	        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>&nbsp;add to cart</a>
	        </div>
		</div>
	</div>
</div>
<?php
	include "bottom.php";
?>