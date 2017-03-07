function checkValues(){

	x = document.getElementById("x_coord").value;
	if(isNaN(x) || x > 5 || x < -3){
		return false;
	}
	y = document.getElementById("y_coord").value;
	if(isNaN(y) || y < -5 || y > 5){
		return false;
	}
	return true;
}
