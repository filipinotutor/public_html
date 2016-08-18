<?php
if(isset($_POST['sub'])){
if (($_FILES["file"]["type"] == "application/pdf")
&& ($_FILES["file"]["size"] < 20000000)) {
    if ($_FILES["file"]["error"] > 0) {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } 
if (file_exists("../materials/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } 
else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../materials/" . $_FILES["file"]["name"]);
      echo "ok";
     }
  }
 else {
  echo "Invalid file";
}
echo "type:".$_FILES['file']['type'].'<br/>size:'.$_FILES['file']['size'];
}
?>
<html>
<body>
<form method="post" enctype="multipart/form-data">
<input type="file" name="file"/>
<input name="sub" type="submit"/>
</form>
</body>
</html>
