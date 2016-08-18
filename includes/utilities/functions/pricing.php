<?php
$path = $page_protect->get_path();
if(isset($_POST['submit_filter'])){
	$filter = $_POST['filter'];	
	$r_from = $_POST['from'];
	$r_to = $_POST['to'];
	$filter = "WHERE `date` <='".$r_from."' AND `date` >='".$r_to."' ";
	
}
if(isset($_POST['create_credit'])){
	if( $_POST['value'] != "" && $_POST['price'] != "" && $_POST['time'] != ""){
	$val= $_POST['value'];
	$output[$x]['price']= $_POST['price'];
	$time= $_POST['time'];
	$date = date("Y-m-d");
	$res = $page_protect->create_credit($val,$output[$x]['price'],$time,$date, $_POST['name'], $_POST['description'], $_POST['price_description'], $_POST['credit_type']);
		if($res){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Credit has been succcessfully created.</div>';
		}	
		else{
				echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
		}
	}
	else{
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>All fields are required.</div>';
	}
}
if(isset($_POST['delete_credit'])){
	$id = $_POST[id];
	$res = $page_protect->delete_credit($id);
	if($res){
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Credit has been succcessfully deleted.</div>';
	}	
	else{
			echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
	}										

}
?>