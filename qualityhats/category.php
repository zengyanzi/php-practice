<div id="middle" class="container">
	<div id="categorys">
		<dl>
		<?php
		$cts = CategoryDao::getCategoryByParentId(0);
		foreach ($cts as $ct) {
			print("<dt><a href='cat.php?cid=".$ct->category_id."'>".$ct->category_name."</a></dt>");
			$cid = $ct->category_id;
			$subs = CategoryDao::getCategoryByParentId($cid);
			foreach ($subs as $sub) {
				print("<dd><a href='cat.php?cid=".$sub->category_id."'>".$sub->category_name."</a></dd>");
			}
		}
		?>
		</dl>
	</div>