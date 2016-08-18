<?php
if(isset($_POST['submit'])){
	$FirstName = $_POST['fname'];
	$LastName = $_POST['lname'];
	$UserName = $_POST['username'];
	$NickName = $_POST['nickname'];
	$Gender = $_POST['gender'];
	$Password = md5($_POST['password']);
	$Email = $_POST['email'];
	$phone = $_POST['phone'];
	$Skype = $_POST['skypeid'];
	$Bdate = $_POST['bday'];
	echo $page_protect->create_supervisor($FirstName,$LastName,$UserName,$NickName,$Gender,$Password,$Email,$Skype,$Bdate,$phone);
}
?>

			<div class=" col-md-12">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=7B" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
    <label for="fname" class="col-sm-2 control-label">First Name:</label>
    <div class="col-sm-10"><input name="fname" id="fname" type="text" class="form-control" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] :"" ?>" />
                    </div></div> 
             <div class="form-group">
    <label for="lanme" class="col-sm-2 control-label">Last Name:</label>
    <div class="col-sm-10"><input name="lname" id="lname" type="text" class="form-control" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] :"" ?>"/>
                    </div></div> 
             <div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10"><input name="username" id="username" type="text" class="form-control" value="<?php echo isset($_POST['username']) ? $_POST['username'] :"" ?>"/></td>
                    </div></div> 
             <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10"><input name="password" id="password" class="form-control" type="password"/></td>
                    </div></div> 
             <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10"><input name="email" id="email" ype="text" class="form-control"  value="<?php echo isset($_POST['email']) ? $_POST['email'] :"" ?>" /></td>
                    </div></div> 
             <div class="form-group">
    <label for="phone" class="col-sm-2 control-label">Phone</label>
    <div class="col-sm-10"><input name="phone" id="phone" type="text" class="form-control" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] :"" ?>" /></td>
                    </div></div> 
             <div class="form-group">
    <label for="skypeid" class="col-sm-2 control-label">Skype Id:</label>
    <div class="col-sm-10"><input name="skypeid" id="skypeid" type="text" class="form-control" value="<?php echo isset($_POST['skypeid']) ? $_POST['skypeid'] :"" ?>"/></td>
                    </div></div> 
             <div class="form-group">
    <label for="nickname" class="col-sm-2 control-label">Nick Name:</label>
    <div class="col-sm-10"><input name="nickname" id="nickname" type="text" class="form-control" value="<?php echo isset($_POST['nickname']) ? $_POST['nickname'] :"" ?>"/></td>
                    </div></div> 
             <div class="form-group">
    <label for="gender" class="col-sm-2 control-label">Gender</label>
    <div class="col-sm-10">
                        <select id="gender" name="gender" class="form-control" >
	                        <option value="Male">Male</option>
	                        <option value="Female">female</option>
                        </select>
                        </td>
                     </div></div> 
        <div class="form-group">
                <label for="bdate" class="col-sm-2 control-label">Birthday</label>
                <div class="col-sm-10">
                <input name="bday" id="bdate"  type="text" class="form-control" value="<?php echo isset($_POST['bday']) ? $_POST['bday'] :"" ?>"/></td>
                </div>
        </div>
		<div class="row">
			<div class="col-sm-2">
			</div>
			 <div class="col-sm-10">
			   <button type="submit" name="submit" class="btn btn-primary form-control-button" ><i class="icon-ok icon-white"></i>&nbsp;Create</button></td>
			</div>                   	 
		</div>                   	 
                       	 
              
			</form>
			</div>

