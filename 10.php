<?php


$tid=$_GET['tid'];

echo "you want to check",$tid,"comment";

$fh=fopen('./msg.txt','r');
$i=1;

while ( ($row=fgetcsv($fh)) !=false) {
	// print_r($row);
	if ($tid==$i) {
		print_r($row);
	}
	$i=$i+1;
}
?>
