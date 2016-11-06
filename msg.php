
<?php



$fh=fopen('./msg.txt','r');

$i=1;
while ( ($row=fgetcsv($fh)) !=false) {
	// print_r($row);

		echo '<li><a href="readmsg.php?tid=',$i,'">',$row['0'],'</li>';

		$i=$i+1;


}
?>
