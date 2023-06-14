const switchers = [...document.querySelectorAll('.switcher')]

// alert("hello");

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
});
function check(){
if(document.getElementById("signup-password").value !=
document.getElementById("signup-password-confirm").value)
{
	      document.getElementById("message2").innerHTML = "**Passwords are not same";
	      return false;
	    }
	else{
		document.getElementById("message2").innerHTML = " ";
		document.getElementById("submit").disabled=false;
	}
}
function change(){
	document.getElementById("message3").innerHTML = "Enter the OTP sent to you E-mail";
	document.getElementById("login-password").disabled=false;
}
