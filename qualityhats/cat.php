<?php
require_once "session.php";
$cid = $_GET["cid"];
if(isset($_GET['page_no'])){
	$page_no = $_GET['page_no'];
}else{
	$page_no = 0;
}
$items = ItemDao::getItemByCid($cid,$page_no);
$count = ItemDao::getCount($cid);
include "head.php";
include "category.php";
?>
<div class="c_item_list">
<div class="path"></div>
<div class="c_item_list">
<?php
foreach ($items as $item) {
	print("<div class='c_item'>");
	print("<a class='c_item_img' href='item.php?item_id=".$item->item_id."'><img src='".$item->img."' /></a>");
	print("<a class='c_item_link' href='item.php?item_id=".$item->item_id."'>".$item->item_name."</a>");
}
 ?>
</div>
</div>
<ul class="pager">
<?php 
for ($page=0; $page * 10 < $count; $page++){
  	print("<li><a href='cat.php?category_id=<%=".$cid."&page_no=".($page+1)."</a></li>");
}
?>
</ul>
</div>
<?php
	include "bottom.php";
?>