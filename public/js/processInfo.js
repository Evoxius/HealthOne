function process()
{
var url1="http://localhost/healthone/public/medicijn/" + document.getElementById("url1").value;
location.href=url1;
return false;
}

function process2()
{
var url2="http://localhost/healthone/public/arts/" + document.getElementById("url2").value;
location.href=url2;
return false;
}

function process3()
{
var url3="http://localhost/healthone/public/recept/" + document.getElementById("url3").value;
location.href=url3;
return false;
}

function process4()
{
var url4="http://localhost/healthone/public/patient/" + document.getElementById("url4").value;
location.href=url4;
return false;
}