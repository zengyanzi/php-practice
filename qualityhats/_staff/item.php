<?php 
include "head.php";
if(isset($_GET['search'])){
	$search = $_GET['search'];
	$is = ItemDao::search($search);
}else{
	$is = ItemDao::getItem();
}
?>
<div class="condition">
    <input id="item_name" type="text" />
    <a class="btn btn-default" id="search_btn">search</a>
</div>
<script>
    $("#search_btn").click(function () {
        var search = $("#item_name").val();
        window.location.href = "item.php?search=" + search;
    });
</script>
<div>
	<?php 
	foreach ($is as $i) {
		print("<ul class='item_ul'>");
		print("<li class='li_img'><img src='../".$i->img."'/></li>");
		print("<li class='li_name'>".$i->item_name."</li>");
		print("<li class='li_color'>".$i->item_description."</li>");
		print("<li class='li_price'><span class='price'>$".$i->item_price."</span></li>");
		print("</ul>");
	}
	?>
</div>

<?php
include "bottom.php";
?>