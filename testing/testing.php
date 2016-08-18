<?php



$database = 'filipino_tutor';
$mysql_connect = @mysql_pconnect ("localhost","root", "");
@mysql_select_db($database) or die( "Unable to select database");

// $user_id = 38;
// $p_name = 'new booking';
// $p_id = 951;
// $n_name = 'Newly Booked Student';

// $q = "SELECT * FROM notification WHERE user_id = '$user_id' AND process_name = '$p_name' AND process_id = '$p_id' AND title = '".$n_name."'";
// echo $q;
// $q = 'SELECT * FROM notification';

$body ="katawan";
$subject= "subject";
$mail_address = "jmvacarodev@gmail.com";
$asdf = "asdf";
$header ="ulonan";
$datetime = date("Y-m-d h:m:s");


$query = "INSERT INTO email_logs(e_message, e_subject, e_recipient, e_sender, e_header, timestamps) 
					  VALUES('".$body."', '".$subject."', '".$mail_address."', '".$asdf."', '".$header."', '".$datetime."')";

// echo $query;

$r = mysql_query($query) or die(mysql_error());

echo $r;



// echo mysql_num_rows($r);

// while($row = mysql_fetch_array($r)){
// 	echo $row['id'];
// 	echo "<br/>";
// }
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

<style type="text/css">
	.profile-photo {
	  clear: both;
	  display: block;
	  max-width: 100px;
	  margin: 0 auto 30px;
	  border-radius: 100%;
	}
</style>

<link rel="stylesheet" type="text/less" href="style.less">
<script type="text/javascript" src="less.min.js"></script>
</head>
<body>

<?php

echo date("Y-m-d h:m:s");

?>
</body>
</html>