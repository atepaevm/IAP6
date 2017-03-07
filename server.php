<?php
$result = "true";
$begin = microtime();

$x =  isset($_POST['x_coord']) ? $_POST['x_coord'] : NULL;

$y =  isset($_POST['y_coord']) ? $_POST['y_coord'] : NULL;

$r = isset($_POST['radius']) ? $_POST['radius'] : NULL;

$ok_msg = "Попал";
$error_msg = "Не попал";


if($x >= 0 && $y >= 0){
	$result = (x*x + y*y <= r*r) ? $ok_msg : $error_msg;

} else if($x < 0 && $y >= 0){
	$result = (abs(x) <= r && y <= r - abs(x)) ? $ok_msg : $error_msg;

} else if($x > 0 && $y < 0){
	$result = (r >= abs(x) && r/2 >= abs(y)) ? $ok_msg : $error_msg;
} else {
	$result = $error_msg;
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
	</tr>
	</tr>
		<td>
		Y: <?php echo $y?>
		</td>
	</tr>
	</tr>
		<td>
		R: <?php echo $r?>
		</td>
		<td>
		</td>
	</tr>
</table>
	Result: <?php echo $result?>
	<br>
	Время работы: 
	<?php echo $time ?>
	микросекунд
</body>
