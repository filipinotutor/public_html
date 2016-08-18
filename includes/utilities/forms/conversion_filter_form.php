<?php
$path= $page_protect->get_path();
if($path == "tutors.php"){
	$url = "?t=2D";
	$submit_name = "conversion_submit_filter";
	?>
    <form action="<?php echo $_SERVER['PHP_SELF'].''.$url; ?>" method="post" role="form" class="pull-right">
	<div class="form-group">
	  	<div class="btn-group">
		  	<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropfrom" data-toggle="dropdown" style="min-width:100px;">
			  	<span id="from_sel"><?php echo $_POST['from'] != '' ? date("M", strtotime("2014-".$_POST['from']."-15")) : "Select Month"; ?></span>
			  	 <i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropfrom">
			  		<?php
			  		for($x=1;$x!=13;$x++){
			  		$month = date("M", strtotime("2014-".$x."-15"));	
					if($_POST['from'] == $x)
						{
							echo'
							<li class="active">
							<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'from\').value=\''.$x.'\';document.getElementById(\'from_sel\').innerHTML=\''.$month.'\';">'.$month.'</a>
							</li>
							';
						}
					else 
					{
							echo'
							<li>
							<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'from\').value=\''.$x.'\';document.getElementById(\'from_sel\').innerHTML=\''.$month.'\';">'.$month.'</a>
							</li>
							';
						}	
			  		}
			  		?>
			  	</ul>
		  	</span>
		  	<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropto" data-toggle="dropdown" style="min-width:100px;">
			  	 <span id="to_sel"><?php echo $_POST['to'] != '' ? $_POST['to']:"Select Year"; ?></span>
			  	<i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropto">
			  		<?php
			  		for($x=1;$x<=10;$x++){
			  		$year = date("Y", strtotime('Y +1 year -'.$x.' year'));	
					if($_POST['to'] == $year)
					{
						echo'
						<li class="active">
						<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'to\').value=\''.$year.'\';document.getElementById(\'to_sel\').innerHTML=\''.$year.'\';">'.$year.'</a>
						</li>
						';
					}
					else {
						echo'
						<li>
						<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'to\').value=\''.$year.'\';document.getElementById(\'to_sel\').innerHTML=\''.$year.'\';">'.$year.'</a>
						</li>
						';
						}
			  		}
			  		?>
			  	</ul>
		  	</span>
		  	<button type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary pull-right">
		  	 Go
		  	</button>
		  	</div>
		</div>
		  	<input type="hidden" name="from" id="from" value="<?php echo $from_m != '' ? $from_m : ''; ?>" />
		  	<input type="hidden" name="to" id="to" value="<?php echo $year != '' ? $year : ''; ?>" />
</form>
    <?php
	
}
if($path == "students.php"){
	switch($_GET['t']){
		case '1B':
		$url = "?t=1B";
		$submit_name = "student_filter";
		break;
	}
	?>
    <form action="<?php echo $_SERVER['PHP_SELF'].''.$url; ?>" method="post" role="form" class="pull-right">
	<div class="form-group">
	  	<div class="btn-group">
		  	<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropfrom" data-toggle="dropdown" style="min-width:100px;">
			  	<span id="from_sel"><?php echo $from_m != '' ? $from_m:"Select Date"; ?></span>
			  	 <i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropfrom">
			  		<?php
			  		for($x=1;$x!=13;$x++){
			  		$month = date("M", strtotime("2014-".$x."-15"));	
		  			echo'
		  			<li>
		  			<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'from\').value=\''.$month.'\';document.getElementById(\'from_sel\').innerHTML=\''.$month.'\';">'.$month.'</a>
		  			</li>
		  			';
			  		}
			  		?>
			  	</ul>
		  	</span>
		  	<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropto" data-toggle="dropdown" style="min-width:100px;">
			  	 <span id="to_sel"><?php echo $to_m != '' ? $to_m:"Select Date"; ?></span>
			  	<i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropto">
			  		<?php
			  		for($x=1;$x!=13;$x++){
			  		$month = date("M", strtotime("2014-".$x."-15"));	
		  			echo'
		  			<li>
		  			<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'to\').value=\''.$month.'\';document.getElementById(\'to_sel\').innerHTML=\''.$month.'\';">'.$month.'</a>
		  			</li>
		  			';
			  		}
			  		?>
			  	</ul>
		  	</span>
		  	<button type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary pull-right">
		  	 Go
		  	</button>
		  	</div>
		</div>
		  	<input type="hidden" name="from" id="from" value="<?php echo $from_m != '' ? $from_m : ''; ?>" />
		  	<input type="hidden" name="to" id="to" value="<?php echo $to_m != '' ? $to_m : ''; ?>" />
</form>
    <?php
}
?>
