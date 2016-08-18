<html>
<head>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
function getdetails(){
var name = $('#name').val();
var rno = $('#rno').val();
$.ajax({
type: "POST",
url: "details.php",
data: {fname:name, id:rno}
}).done(function( result ) {
$("#msg").html( " Address of Roll no " +rno +" is "+result );
});
}


</script>

<!--      --------------------------------            -->
<script type="text/javascript">
$(document).ready(function() {  
    $("#villa_submit").click(function() {   
        var action = $("#villa_choose").attr('action');
//var form_data = { 'vid[]' : []};$("input:checked").each(function() {data['vid[]'].push($(this).val());});
var form_data = $('#villa_choose').serialize();  //suggested by Kev Price 
        $.ajax({
           type: "POST",
            url: "details.php",
            data: {chosen:form_data}
            beforeSend:function(){
                $('#villa_result').html('<center>loading</center>');
              },
            success: function(data){
                  $('#test_result').html(data);
            }
        });     
        return false;
    }); 
});
</script>
<!--      --------------------------------            -->
</head>
<body>
<form name="villa_choose" id="villa_choose" method="post" action="">
<input type="checkbox" name="vid[]" id="vid1" value="1" />
<input type="checkbox" name="vid[]" id="vid2" value="2" />
<input type="checkbox" name="vid[]" id="vid3" value="3" />
<input type="checkbox" name="vid[]" id="vid4" value="4" />
<input type="checkbox" name="vid[]" id="vid5" value="5" />
<input type="button" name="submit" id="villa_submit" value="submit" onClick = "getdetails()" />
</form>

<div id="test_result"></div>
<div id="villa_result"></div>



<table>
<tr>
<td>Your Name:</td>
<td><input type="text" name="name" id="name" /><td>
</tr>
<tr>
<td>Roll Number:</td>
<td><input type="text" name="rno" id="rno" /><td>
</tr>
<tr>
<td></td>
<td><input type="button" name="submit" id="submit" value="submit" onClick = "getdetails()" /></td>
</tr>
</table>
<div id="msg"></div>
</body>
</html>