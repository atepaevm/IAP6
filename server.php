<?php
$result = "true";
$begin = explode(' ',microtime());
$x =  isset($_POST['x_coord']) ? (is_numeric($_POST['x_coord'])? intval($_POST['x_coord']) : NULL) : NULL;
$x_values = array(-3, -2, -1, 0, 1, 2, 3, 4, 5);
$y =  isset($_POST['y_coord']) ? (is_numeric($_POST['y_coord'])? floatval($_POST['y_coord']) : NULL) : NULL;

$r = isset($_POST['radius']) ? (is_numeric($_POST['radius'])? floatval($_POST['radius']) : NULL) : NULL;
$r_values = array(1, 1.5, 2, 2.5, 3);

$ok_msg = "Попалa";
$error_msg = "Не попалa";

if(in_array($x, $x_values, TRUE) && in_array($r, $r_values) && $y <= 5 && $y >= -5 ){
	if($x >= 0 && $y >= 0){
		$result = ($x*$x + $y*$y <= $r*$r) ? $ok_msg : $error_msg;
	} else if($x < 0 && $y >= 0){
		$result = (abs($x) <= $r && $y <= $r - abs($x)) ? $ok_msg : $error_msg;
	} else if($x > 0 && $y < 0){
		$result = ($r >= abs($x) && $r/2 >= abs($y)) ? $ok_msg : $error_msg;
	} else {
		$result = $error_msg;
	}
} else {
	$result = "Параметры установлены неверно";
}


$end = explode(' ', microtime());
$time = number_format(($end[0] - $begin[0]) * 1000, 6, '.', '');
if($begin[1] !== $end[1]){
	$time += ($end[1] - $begin[1]) * 1000000;
}
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
