//feedback3.js

function validateContactForm()
{
    var form1OBJ = document.getElementById("form1");
    var fname = form1.firstName.value;
    var lname = form1.lastName.value;
    var phone = form1.phone.value;
    var email = form1.email.value;
    var everythingOK = true;

if (!validateName(firstName))
{
    alert("Error: Invalid First Name.");
    everythingOK = false;
}
if (!validateName(lastName))
{
    alert("Error: Invalid Last Name.");
    everythingOK = false;
}
if (!validatePhone(phone))
{
    alert("Error: Invalid Phone Number.");
    everythingOK = false;
}
if (!validateEmail(email))
{
    alert("error: Invalid Email Address.")
    everythingOK = false;
}
else
    return false;
}

function validateName(name)
{
    var p = name.search(/^[-'\w\s]+$/)
    if (p = = 0)
        return true;
    else
        return false;
}
function validatePhone(phone)
{
    var p1 = phone.search(/^\d{3}[-\s]{0,1}\d{3}[-\s]{0,1}\d{4}$/);
    var p2 = phone.search(/^\d{3}[-\s]{0,1}\d{4}$/);
    if (p1 == 0 || p2 == 0)
        return true;
    else
        return false;
}

function validateEmail(address)
{
    var p = address.search(/^\w+([\.-]?w+)*@\w+([\.-]?\w+)*(\.\w{2,3})$/);
    if (p == 0)
        return true;
    else
        return false;
}
