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




function changeValue(){
	r = Number(document.getElementById("radius").value);
	r = isNaN(r) ? 1 : r + 0.5;
	if(r > 3){
		r = 1;
	}
	document.getElementById("radius").value = r;
	document.getElementById("r_val").value = r;
}
