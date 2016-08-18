<?php
include('header-admin.php');
$path = $page_protect->get_path();
if(IsSet($_POST['submit_report_filter'])){
	if($_POST['to'] !="" && $_POST['from'] !="" ){
	$r_from = $_POST['from'];
	$r_to = $_POST['to'];
		if($_POST['filter_by'] != ""){
		$f_by =$_POST['filter_by'];
		$filter = "WHERE `date` <='".$r_from."' AND `date` >='".$r_to."' AND `status` ='".$f_by."' ";
		$add = $filter;
		}
		else{
			$filter = "WHERE `date` <='".$r_from."' AND `date` >='".$r_to."' ";
			$add = $filter;
		}
	}
}
elseif($_POST['submit_filter_by']!=""){
		$f_by =$_POST['submit_filter_by'];
		$filter = "WHERE `status` = '".$f_by."' ";
		$add = $filter;
	}
?>
	    <div class="col-md-9">
       
          <div class="row">
            <div class="col-md-12">
				<form action="CSV.php" method="POST" class="pull-right">
					<input type="hidden" name="path" value="<?php echo $path;?>"/>
					<input type="hidden" name="filter" value="<?php echo $add;?>"/>
					<button type="submit" name="submit" class="btn btn-warning">
					<i class="glyphicon-circle-arrow-down glyphicon"> </i>
					</button>
				</form>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>?t=2C" method="POST" class="pull-right">
			<input name="filter_by" type="hidden" value="<?php echo (isset($_POST['submit_filter_by'])) ? $_POST['submit_filter_by'] : ''; ?>"/>
			<div class="form-group">
			<div class="input-group">
			<div class="input-group-addon">from</div>
				<input  type="text"  class=" form-control reportto" name="from" value="<?php echo (isset($_POST['from'])) ? $_POST['datefrom'] : ''; ?>" placeholder="Select a Date" >
			<div class="input-group-addon">to</div>
				<input  type="text" class=" form-control reportfrom" name="to" value="<?php echo (isset($_POST['to'])) ? $_POST['dateto'] : ''; ?>" placeholder="Select a Date" >
			<span class="input-group-btn">	
				<div class="btn-group">
					<button class="btn btn-primary" type="submit" name="submit_conversion_filter">Go</button>
				</div>
				<div class="btn-group">
				    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				      
				      <span class="caret"></span>
				    </button>
				    <ul class="dropdown-menu pull-right" role="menu">
				      
				      <li>
					      <button type="submit" class="form-control" name="submit_filter_by" value="">
					      	None
					      </button>
				      </li>
				      
				      <li>
					      <button type="submit" class="form-control" name="submit_filter_by" value="approved">
					      	Approved
					      </button>
				      </li>
				      
				      <li>
					      <button type="submit" class="form-control" name="submit_filter_by" value="disapproved">
					      	Disapproved
					      </button>
				      </li>

				      <li>
					      <button type="submit" class="form-control" name="submit_filter_by" value="new">
					      	Pending
					      </button>
				      </li>

				    </ul>
			  	</div>
			</span>

			</div>

			</div>
		</form>
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
	 	<table class="table table-striped table-bordered table-hover">
			<tr>
				<th>Tutor's Name</th>
				<th>Student</th>
			    <th>Attendance</th>
			    <th class="hidden-xs">Material</th>
			    <th>Date</th>
			    <th class="hidden-xs">Time</th>
			</tr>
			<?php if(isset($filter)){
				echo $page_protect->get_tutor_report_list($filter,NULL);
			}
			else{
				echo $page_protect->get_tutor_report_list(NULL,NULL);
			}
			?>
		</table>

          </div>
        </div>

</div>

 <?php
 include('footer-admin.php');
 ?>   