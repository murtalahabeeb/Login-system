
function validate() {
var fname=document.getElementById('fname').value;
var lname=document.getElementById('lname').value;
var email=document.getElementById('email').value;
var age=Number(document.getElementById('age').value);
var contact =document.getElementById('contact').value;
var emailreg=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,6}$/;
if(fname!=""&& email!="" && age!="" && contact!=""){
	if(email.match(emailreg)){
		if(age>=12 && age<=50 ){
			if(contact.length==11){
				if(document.getElementById("male").check||document.getElementById("female").check){
						alert("submision successfull");
						return true;
				}else{
					alert("invalid gender");
					return false
				}
			}else{
				alert("invalid contact");
				return false;
			}
		}else{
			alert("invalid age");
			return false;
		}
	}else{
		alert("invalid mail");
		return false;
	}
}
else{
	alert("fill the fields");
	return false;
}
}