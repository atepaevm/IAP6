<?php

$begin = microtime();

$x =  isset($_POST['x_coord']) ? $_POST['x_coord'] : NULL;

$y =  isset($_POST['y_coord']) ? $_POST['y_coord'] : NULL;

$r=1;

if($x > 0 && $y > 0){


} else if($x < 0 && $y > 0){


} else if($x > 0 && $y < 0){
	$result = ((y <= R/2 && ))
} else {
	$result = "Не попал";
}




$end = microtime();
$time = $end - $begin;
?>


<!DOCTYPE html>
<head>
	<title>Answer</title>
	<meta charset="UTF-8">
</head>
<body>
<table>
	<tr>
		<td>
		X: <?php echo $x?>
		</td>
		<td>
		Y: <?php echo $y?>
		</td>
		<td>
		R: <?php echo $r?>
		</td>
		<td>
		Result: <?php echo $result?>
		</td>
	</tr>
	<tr>
		<td>
		<? echo $time ?>
		</td>
	</tr>
</table>
</body>
