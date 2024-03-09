function loginValidation()
{
  var uname=document.myform.username.value;
  var atpos=uname.indexOf("@");
  var dotpos=uname.lastIndexOf(".");
  if(atpos<1||dotpos<atpos+5|| dotpos+2>=uname.length)
  {
    alert("PLEASE ENTER A VALID USERNAME");
    return false;
  }
}

function registerValidate()
{
    var email=document.myform.mailId.value;
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    var createpassword=document.myform.createpass.value;
    var confirmpassword=document.myform.confirmpass.value;
    var phone=document.myform.phno.value;

  if(atpos<1||dotpos<atpos+5|| dotpos+2>=email.length)
  {
    alert("PLEASE ENTER A VALID USERNAME");
    return false;
  }
  if(createpassword != confirmpassword)
  {
    alert("Password confirmation is wrong");
    return false;
  }
  if(phone.length<10)
  {
    alert("Phone number should be 10 digits long");
    return false;
  }
  alert("Thank you for registering...Your account will be created soon");
}