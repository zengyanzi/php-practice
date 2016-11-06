<?php 
include "head.php";
$cs = CategoryDao::getCategorys();
?>
<div>
	<?php
	$id2o = array();
	foreach ($cs as $c){
		$id2o[$c->category_id]=$c;
	}
	foreach ($cs as $c) {
		$text = "";
		if ($c->parent_id == 0){
		  	$text = $c->category_name;
		}else{
		  	$text = $id2o[$c->parent_id]->category_name." > ".$c->category_name;
		}
		$status = $c->category_status == 0 ? "active" : "disable";
		print("<ul class='category_ul'>");
		print("<li class='category_name'>".$text."</li>");
    	print("<li class='category_status'>".$status."</li>");
    	print("</ul>");
	}
	?>
		
</div>
<?php 
include "bottom.php";
 ?>