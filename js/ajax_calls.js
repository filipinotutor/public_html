function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  document.getElementById("txtHint").disabled='disabled';
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
	document.getElementById("txtHint").disabled='';
    }
  }
xmlhttp.open("GET","ajax_calls.php?q="+str,true);
xmlhttp.send();
}


function showMonitoringID(str)
{
if (str=="")
  {
  document.getElementById("txtMon").innerHTML="";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtMon").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajax_calls.php?bis="+str,true);
xmlhttp.send();
}