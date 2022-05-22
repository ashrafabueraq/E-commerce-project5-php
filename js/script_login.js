function validation(){
	var valid = true;
	
	formLabels = document.getElementsByTagName("label");
	
	
	
	var email = document.regForm.email.value;
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email==""){
		formLabels[0].innerHTML="Email: [Required]";
		formLabels[0].style="color: red";
		valid = false;
	}
	else if(!re.test(email)){
		formLabels[0].innerHTML="Email: [Incorrect Email]";
		formLabels[0].style="color: red";
		valid = false;
	}
	else {
		formLabels[0].innerHTML="Email:";
		formLabels[0].style="color: black";
		valid = (valid) ? true : false;
	}
	
	var password = document.regForm.password.value;
	if(password == ""){
		formLabels[1].innerHTML="Password: [Required]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else if(password.length < 8){
		formLabels[1].innerHTML="Password: [Must be > 8]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else {
		formLabels[1].innerHTML="Password:";
		formLabels[1].style="color: black";
		valid = (valid) ? true : false;
	}
	
	
	
	return valid;
}

function clear2(){
	var myArray = new Array();
	
	myArray[0] = "Email: *";
	myArray[2] = "Password: *";
	
	for(var i=0 ; i < myArray.length ; i++){
		formLabels[i].innerHTML = myArray[i];
		formLabels[i].style = "color: black";
	}
}