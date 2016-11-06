<?php



// $fh=fopen('./msg.txt', 'a');//apend 
// //write into file according to fh
// fwrite($fh,'hello jenny');

// //close 
// fclose($fh);
// echo "ok";

$str=$_POST["title"] . $_POST["content"]."\n";

echo $str;
$fh=fopen('./msg.txt', 'a');

fwrite($fh, $str);
fclose($fh);
echo "ok";

?>
