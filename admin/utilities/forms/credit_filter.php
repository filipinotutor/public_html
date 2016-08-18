<?php
	$url = "?t=1C";
	$submit_name = "credit_filter";
?>
<form action="<?php echo $_SERVER['PHP_SELF'].''.$url; ?>" method="post" role="form" class="pull-right form-inline">
	<div class="form-group">
	  	<!--<div class="btn-group">-->
       <div class="form-group">
    <label for="exampleInputEmail1">Date Range</label>
    <input type="text" name="from" id="from2" class="form-control daterangefrom"  value="<?php echo $_POST['from'] ?>" readonly="readonly" style="cursor:default;" /> <input type="text" name="to" id="to2" class="form-control daterangeto" value="<?php echo $_POST['to'] ?>" readonly="readonly"  style="cursor:default;"/>&nbsp;<button type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary pull-right">
		  	 Go
		  	</button>
  </div>
  
        <!--<input type="text" name="from" id="from2" class="form-control reportfrom"  value="<?php echo $_POST['from'] ?>" />-->
		  	<!--<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropfrom" data-toggle="dropdown" style="min-width:100px;">
			  	<span id="from_sel2"><?php echo $from_m != '' ? $from_m:"Select Date"; ?></span>
			  	 <i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropfrom">
			  		<?php
			  		for($x=1;$x!=13;$x++){
			  		$month = date("M", strtotime("2014-".$x."-15"));	
		  			echo'
		  			<li>
		  			<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'from2\').value=\''.$month.'\';document.getElementById(\'from_sel2\').innerHTML=\''.$month.'\';">'.$month.'</a>
		  			</li>
		  			';
			  		}
			  		?>
			  	</ul>
		  	</span>-->
            <!--<input type="text" name="to" id="to2" class="form-control reportfrom" value="<?php echo $_POST['to'] ?>" />-->
		  	<!--<span class="dropdown">
		  	  	<button class="btn btn-default dropdown-toggle" type="button" id="dropto" data-toggle="dropdown" style="min-width:100px;">
			  	 <span id="to_sel2"><?php echo $to_m != '' ? $to_m:"Select Date"; ?></span>
			  	<i class="caret"></i>
			  	</button>
		  	  	<ul class="dropdown-menu"role="menu" aria-labelledby="dropto">
			  		<?php
			  		for($x=1;$x!=13;$x++){
			  		$month = date("M", strtotime("2014-".$x."-15"));	
		  			echo'
		  			<li>
		  			<a href="#" data-toggle="dropdown-toggle" onclick="document.getElementById(\'to2\').value=\''.$month.'\';document.getElementById(\'to_sel2\').innerHTML=\''.$month.'\';">'.$month.'</a>
		  			</li>
		  			';
			  		}
			  		?>
			  	</ul>
		  	</span>-->
		  	<!--<button type="submit" name="<?php echo $submit_name;?>" class="btn btn-primary pull-right">
		  	 Go
		  	</button>-->
		  	<!--</div>-->
		</div>
		  	<!--<input type="hidden" name="from" id="from2" value="<?php echo $from_m != '' ? $from_m : ''; ?>" />-->
		  	<!--<input type="hidden" name="to" id="to2" value="<?php echo $to_m != '' ? $to_m : ''; ?>" />-->