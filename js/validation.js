function validationform()
{
 email= document.getElementById('emailID').value;
 password= document.getElementById('passwordID').value;
 if(email=="" || password=="")
{
if(email=="")
{
    document.getElementById('emailerror').innerHTML="Email is required";
}
else{
    document.getElementById('emailerror').innerHTML="";
}

if(password=="")
{
    document.getElementById('passworderror').innerHTML="Password is required";
}
else{
    document.getElementById('passworderror').innerHTML="Password is required";
}

return false;
}


else
{
return true;
}
}