function validation(){
	var valid = true;
	
	formLabels = document.getElementsByTagName("label");
	
	var username = document.regForm.username.value;
	if(username==""){
		formLabels[0].innerHTML="username: [Required]";
		formLabels[0].style="color: red";
		valid = false;
	}
	else if( !isNaN(username)){
		formLabels[0].innerHTML="First Name: [Text Only]";
		formLabels[0].style="color: red";
		valid = false;
	}
	else {
		formLabels[0].innerHTML="username:";
		formLabels[0].style="color: black";
		valid = (valid) ? true : false;
	}
	
	// var email = document.regForm.email.value;
	// if(email==""){
	// 	formLabels[1].innerHTML="Last Name: [Required]";
	// 	formLabels[1].style="color: red";
	// 	valid = false;
	// }
	// else if( !isNaN(lastName)){
	// 	formLabels[1].innerHTML="Last Name: [Text Only]";
	// 	formLabels[1].style="color: red";
	// 	valid = false;
	// }
	// else {
	// 	formLabels[1].innerHTML="Last Name:";
	// 	formLabels[1].style="color: black";
	// 	valid = (valid) ? true : false;
	// }
	var email = document.regForm.email.value;
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var ph = /[07]{2,3}[7-9]{1,2}[0-9]{7,8}/;
	if(email==""){
		formLabels[1].innerHTML="Email: [Required]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else if(!re.test(email)){
		formLabels[1].innerHTML="Email: [Incorrect Email]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else {
		formLabels[1].innerHTML="Email:";
		formLabels[1].style="color: black";
		valid = (valid) ? true : false;
	}
	if(phone==""){
		formLabels[1].innerHTML="phone: [Required]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else if(!ph.test(phone)){
		formLabels[1].innerHTML="phone: [Incorrect phone]";
		formLabels[1].style="color: red";
		valid = false;
	}
	else {
		formLabels[1].innerHTML="phone:";
		formLabels[1].style="color: black";
		valid = (valid) ? true : false;
	}
	
	var password = document.regForm.password.value;
	if(password == ""){
		formLabels[2].innerHTML="Password: [Required]";
		formLabels[2].style="color: red";
		valid = false;
	}
	else if(password.length < 8){
		formLabels[2].innerHTML="Password: [Must be > 8]";
		formLabels[2].style="color: red";
		valid = false;
	}
	else {
		formLabels[2].innerHTML="Password:";
		formLabels[2].style="color: black";
		valid = (valid) ? true : false;
	}

	
	// var age = document.regForm.age.value;
	// if(age < 0 || age > 100){
	// 	formLabels[4].innerHTML="Age: [Must be between 0 and 100]";
	// 	formLabels[4].style="color: red";
	// 	valid = false;
	// }
	// else if( isNaN(age)){
	// 	formLabels[4].innerHTML="Age: [Age must be a number]";
	// 	formLabels[4].style="color: red";
	// 	valid = false;
	// }
	// else {
	// 	formLabels[4].innerHTML="Age:";
	// 	formLabels[4].style="color: black";
	// 	valid = (valid) ? true : false;
	// }
	
	var city = document.regForm.city.value;
	if(city==""){
		formLabels[3].innerHTML="city: [Required]";
		formLabels[3].style="color: red";
		valid = false;
	}
	else if( !isNaN(city)){
		formLabels[3].innerHTML="city: [Text Only]";
		formLabels[3].style="color: red";
		valid = false;
	}
	else {
		formLabels[3].innerHTML="city:";
		formLabels[3].style="color: black";
		valid = (valid) ? true : false;
	}

	var address = document.regForm.address.value;
	if(address==""){
		formLabels[4].innerHTML="Adress: [Required]";
		formLabels[4].style="color: red";
		valid = false;
	}
	else if( !isNaN(address)){
		formLabels[4].innerHTML="Address: [Text Only]";
		formLabels[4].style="color: red";
		valid = false;
	}
	else {
		formLabels[4].innerHTML="Address:";
		formLabels[4].style="color: black";
		valid = (valid) ? true : false;
	}

	var mobile = document.regForm.mobile.value;
	if( isNaN(mobile)){
		formLabels[5].innerHTML="Mobile: [Numbers Only]";
		formLabels[5].style="color: red";
		valid = false;
	}
	else {
		formLabels[5].innerHTML="Mobile:";
		formLabels[5].style="color: black";
		valid = (valid) ? true : false;
	}



	if(phone==""){
		formLabels[6].innerHTML="phone: [Required]";
		formLabels[6].style="color: red";
		valid = false;
	}
	else if(!ph.test(phone)){
		formLabels[6].innerHTML="phone: [Incorrect phone]";
		formLabels[6].style="color: red";
		valid = false;
	}
	else {
		formLabels[6].innerHTML="phone:";
		formLabels[6].style="color: black";
		valid = (valid) ? true : false;
	}
	
	return valid;
}

function clear2(){
	var myArray = new Array();
	myArray[0] = "First Name: *";
	myArray[1] = "Last Name: *";
	myArray[2] = "Email: *";
	myArray[3] = "Password: *";
	myArray[4] = "Age:";
	myArray[5] = "Mobile:";
	for(var i=0 ; i < myArray.length ; i++){
		formLabels[i].innerHTML = myArray[i];
		formLabels[i].style = "color: black";
	}
}