<?php
$path = $page_protect->get_path();
switch($path){
	case 'students.php':
		$url = '?t=1A';
		$deact = 'user=student&t=1A';
	break;

	case 'tutors.php':
		$url = '?t=2A';
		$deact = 'user=tutor&t=2A';
	break;

	case 'supervisors.php':
		$url = '?t=7A';
		$deact = 'user=supervisor&t=7A';
	break;

}
?>
<form action="<?php echo $_SERVER['PHP_SELF'].''.$url;?>" method="POST">
	<div class="input-group pull-right">
		<!-- <span class="input-group-btn">
			<button class="btn btn-danger" onclick="document.getElementById('a').value='';">
			<i class="glyphicon glyphicon-remove-circle"></i>
			</button>
		</span>
		<input  id="a" name="filter" type="text" class="form-control" value="<?php // echo $_POST['filter'] != "" ? ''.$_POST['filter'].'' : ''?>"/>
		<span class="input-group-btn">
			<button type="submit" name="submit_filter" class="btn btn-primary">
				<i class="glyphicon-search glyphicon"></i>
			</button>
		</span> -->

		<span class="input-group-btn" style="padding-left:10px;">
			<?php if($path == "tutors.php") {
				?>
				<a href="deactivated_accounts.php?<?php echo $deact; ?>" class="btn btn-info">
			<?php 
			}
			elseif($path == "students.php") {
			?>
				<a href="deactivated_accounts.php?<?php echo $deact; ?>" class="btn btn-info" >
			<?php 
			}
			elseif($path == "supervisors.php") {
			?>
				<a href="deactivated_accounts.php?<?php echo $deact; ?>" class="btn btn-info">
			<?php 
			}
			?>	
			<span class="hidden-xs">
			<i class="glyphicon-search glyphicon"></i>&nbsp;View Deactivated Accounts
			</span>
			<span class="visible-xs-block" style="font-size:14px;">
			<i class="glyphicon-trash glyphicon"></i>
			</span>
			</button>
			</a>	
		</span>

	</div>		
</form>
							
