<?php
//from up to down
echo 'get up<br/>';
echo 'breacfast <br/>';
echo 'lunch <br/>';

$gender ='male';
if ($gender=='male') {
	echo'hello';
}else{
	echo 'nice to meet you';
}


$mood ='good';
if ($mood=='good') {
	echo'I am unhappy';
}else{
	echo 'I am happy';
}

$rice =1;
while($rice<=10){
	echo 'have',$rice,'rice,but not full<br/>';
	$rice=$rice+1;
} 
echo 'have',$rice,'final full';

$i=1;
while ( $i<= 100) {
	echo $i,'<br/>';
	if ($i %3==0) {

		echo 'Fizz <br/>';
	}
	if ($i%5==0) {
		echo 'Buzz <br/>';
	}
	if ($i%5==0 &$i%3==0) {
		echo 'abcde <br/>';
	}

	$i=$i+1;
}


?>