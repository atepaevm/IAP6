<?php

class Point {
	public $x;
	public $y;
	static $x_values = array(-3, -2, -1, 0, 1, 2, 3, 4, 5);
	static $r_values = array(1.0, 1.5, 2.0, 2.5, 3.0);
	static $ok_msg = "Попалa";
	static $error_msg = "Не попалa";
	static $failure = "Параметры установлены неверно";

	function __construct($x, $y){
		$this->x = $x;
		$this->y = $y;
	}

	function check($r = 1){
		if(in_array($this->x, Point::$x_values, TRUE) && in_array($r, Point::$r_values, TRUE) && $this->y <= 5 && $this->y >= -5){
			if($this->x >= 0 && $this->y >= 0){
				$result = ($this->x*$this->x + $this->y*$this->y <= $r*$r) ? Point::$ok_msg : Point::$error_msg;
			} else if($this->x < 0 && $this->y >= 0){
				$result = (abs($this->x) <= $r && $this->y <= $r - abs($this->x)) ? Point::$ok_msg : Point::$error_msg;
			} else if($this->x > 0 && $this->y < 0){
				$result = ($r >= abs($this->x) && $r/2 >= abs($this->y)) ? Point::$ok_msg : Point::$error_msg;
			} else {
				$result = Point::$error_msg;
			}
		} else {
			$result = Point::$failure;
		}
		return $result;	
	}
}
$begin = explode(' ',microtime());
$x =  isset($_POST['x_coord']) ? (is_numeric($_POST['x_coord'])? intval($_POST['x_coord']) : NULL) : NULL;

$y =  isset($_POST['y_coord']) ? (is_numeric($_POST['y_coord'])? floatval($_POST['y_coord']) : NULL) : NULL;

$r = isset($_POST['radius']) ? (is_numeric($_POST['radius'])? floatval($_POST['radius']) : NULL) : NULL;

$point = new Point($x, $y);
$result = $point->check($r);

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
	<style>
	tr > td{
	color: blue;
	}
	table {
	background: #F9F9F9;
	border: 2px solid red;
	}
	tr:hover{
	background: #000000;
	}
	td:hover ul li {
	background: #FFFFFF;	
	}
	</style>
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
	</tr>
</table>
	Result: <?php echo $result?>
	<br>
	Время работы: 
	<?php echo $time?>
	микросекунд
	<br>
	Текущее время:
	<?php echo date("G:i:s");?>		
</body>
