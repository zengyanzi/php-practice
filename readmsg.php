<?php



$tid=$_GET['tid'];

$fh=fopen('./msg.txt', 'r');

$i=1;
while ( ($row=fgetcsv($fh)) !=false) {
	if ($i==$tid) {
		echo '<h1>',$row[0],'</h1>';
		echo '<p>',$row[1],'</p>';

	}	$i=$i+1;
		

}
?>
