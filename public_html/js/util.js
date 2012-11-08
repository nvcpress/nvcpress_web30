// JavaScript Document

function verifyNotEmpty(fieldValue, fieldID) {
	if(fieldValue == ""){
		alert(fieldID + " is required, please enter your " + fieldID);
	}
}

function verifyContactEmail(){
	
}

function verifyUserIniput(){
	verifyNotEmpty(document.getElementById('contactSubmit').value, "contactName");	
}