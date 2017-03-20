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

session_start();
if(!isset($_SESSION['x_vals'])){
$_SESSION['x_vals'] = array();
}
if(!isset($_SESSION['y_vals'])){
$_SESSION['y_vals'] = array();
}
if(!isset($_SESSION['r_vals'])){
$_SESSION['r_vals'] = array();
}
if(!isset($_SESSION['results'])){
$_SESSION['results'] = array();
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
array_push($_SESSION['x_vals'], $x);
array_push($_SESSION['y_vals'], $y);
array_push($_SESSION['r_vals'], $r);
array_push($_SESSION['results'], $result);
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
		X:
		</td>
		<?php foreach($_SESSION['x_vals'] as $x_val){?>
		<td>
		<?php echo $x_val?>
		</td>
		<?php } ?>
	</tr>
	<tr>
		<td>
		Y:
		</td>
		<?php foreach($_SESSION['y_vals'] as $y_val){?>
		<td>
		<?php echo $y_val?>
		</td>
		<?php } ?>
	</tr>
	<tr>
		<td>
		R:
		</td>
		<?php foreach($_SESSION['r_vals'] as $r_val){?>
		<td>
		<?php echo $r_val?>
		</td>
		<?php } ?>
	</tr>
	<tr>
		<td>
			Result:
		</td>
		<?php foreach($_SESSION['results'] as $result_val){?>
		<td>
		<?php echo $result_val?>
		</td>
		<?php } ?>
	</tr>
</table>
	Время работы: 
	<?php echo $time?>
	микросекунд
	<br>
	Текущее время:
	<?php echo date("G:i:s");?>		
</body>
