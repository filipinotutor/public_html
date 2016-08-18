<?php

include('header-student.php');
//date("Y-m-d H:i:s", time());
// insert_student_credit($student_id, $credit_value, $expiration, $date_paid, $status)
?>
<div class="col-md-9">
<?php

if(isset($_GET['token']) && $_GET['PayerID']!='' && $_GET['success']=='true') //paypal
		{
			$paid = TRUE;//if true, remove right panel
			echo '<div class="alert alert-success">
			  <strong>Thank you!</strong> Your transaction was successfully processed.</a>.
			</div>';
			
		}
if(isset($_GET['token']) && $_GET['PayerID']=='' && $_GET['success']=='false') //paypal
		{
			$paid = TRUE;//if true, remove right panel
			echo '<div class="alert alert-danger">
			  <strong>Sorry!</strong> Transaction not successful.</a>
			</div>';
		}					
?>
<div class="row">
	<div class="col-md-12">
    	<h4><?php echo $pricing_package; ?></h4>
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<!--
        <table class="table table-striped table-bordered table-hover">
		<thead>
			<tr class="alert-success">
				<th>Price</th>
				<th>Time</th>
				<th>
				<span class="hidden-xs">Classes( Credits )
				<a title="" data-placement="bottom" data-toggle="tooltip" href="class-history.php" data-original-title="1 Credit Point is equal to 1 Class Session of 25 minutes.">?</a> 
				</span>
				<span class="visible-xs-block">
					Pnts.
				</span> 
				</th>
				<th>Duration</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php 
		/*
		$output =$page_protect->get_credit_list(NULL,NULL);
	for($x=0;$x!=$output['count'][0];$x++){
		echo'
			<div id="modalBuy'.$output[$x]['id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
				     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				     <h3 id="myModalLabel">登録 Credits</h3>
				    </div>
				    
				    <div class="modal-body">
				    	You are about to buy '.$output[$x]['credit_value'].' credits worth '.$output[$x]['price'].'JPY.
				    </div>
				    
				    <div class="modal-footer">
				    	<form action="../paypal/pay.php" method="post">
				         <input type="hidden" name="user_id" value="'.$page_protect->user_id.'" />
				        <input type="hidden" name="price" value="'.str_replace( ',', '', $output[$x]['price'] ).'" />
				        <input type="hidden" name="id" value="'.$output[$x]['id'].'" />
				        <button type="submit" name="submit_payment" class="btn btn-primary">Proceed</button>
				         <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
				    	</form>
				    </div>
				</div>
				</div>
			<div>
		';
		echo"
			<tr>
				<td>
					".$output[$x]['price']." JPY
				</td>
				<td>
					".$output[$x]['duration']."
				</td>
				<td>
					".$output[$x]['credit_value']."
				</td>
				<td>
					".$output[$x]['exp_date']." <span class='hidden-xs'>days</span>
				</td>
				<td>
					<a href='#modalBuy".$output[$x]['id']."' role='button' class='btn btn-success btn-xs' data-toggle='modal'>
						<i class='glyphicon-lock glyphicon'> </i> 登録
					</a>
				</td>
			</tr>
		";
		
	 }
	 */
	?>
	</tbody>
	</table>-->
    <table id="pricingtb" class="table table-condensed">
						<tr class="main-heading">
							<td></td>
							<td>クラスの数(クレジット)</td>
							<td>ご利用可能日数　　( 有効期限)</td>
							<td>価格</td>
							<td>&nbsp;</td>
						</tr>
						<tr class="heading">
							<td>ビジネス 英会話</td>
							<td></td>
							<td></td>
							<td></td>
							<td>&nbsp;</td>
						</tr>
                        <?php
						$filter="WHERE credit_type='business_english'";
						$output =  $page_protect->get_pricing_frontend($filter,NULL);
						for($x=0;$x!=$output['count'][0];$x++){
							//echo $output[$x]['id'];
							echo '<tr>';
							echo '<tr>';
								echo '<td><b>'.$output[$x]['name'].'</b></td>';
								echo '<td>'.$output[$x]['credit_value'].' クラス  '.$output[$x]['description'].'</td>';
								echo '<td>'.$output[$x]['exp_date'].' 日</td>';
								echo '<td><b>'. number_format($output[$x]['credit_price'], 0, '.', ',').'円/月</b><br /><small>'.$output[$x]['price_description'].'</small></td>';
								echo "<td><a href='#modalBuy".$output[$x]['id']."' role='button' class='btn btn-success btn-xs' data-toggle='modal'>クレジットを購入する</a></td>";
								echo '<div id="modalBuy'.$output[$x]['id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
				     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				     <h3 id="myModalLabel">クレジットを購入する</h3>
				    </div>
				    
				    <div class="modal-body">
				    	あなたはこれから '.$output[$x]['credit_price'].'円で'.$output[$x]['credit_value'].'クレジットを購入します。
				    </div>
				    
				    <div class="modal-footer">
				    	<form action="../paypal/pay.php" method="post">
				         <input type="hidden" name="user_id" value="'.$page_protect->user_id.'" />
				        <input type="hidden" name="price" value="'.str_replace( ',', '', $output[$x]['credit_price'] ).'" />
				        <input type="hidden" name="id" value="'.$output[$x]['id'].'" />
				        <button type="submit" name="submit_payment" class="btn btn-primary">続ける</button>
				         <button class="btn" data-dismiss="modal" aria-hidden="true">キャンセル</button>
				    	</form>
				    </div>
				</div>
				</div>
			<div>';
							echo '</tr>';
						}
                        ?>
						<tr class="heading">
							<td>ESL</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
                        <?php
						$filter="WHERE credit_type='esl'";
						$output =  $page_protect->get_pricing_frontend($filter,NULL);
						for($x=0;$x!=$output['count'][0];$x++){
							//echo $output[$x]['id'];
							echo '<tr>';
							echo '<tr>';
								echo '<td><b>'.$output[$x]['name'].'</b></td>';
								echo '<td>'.$output[$x]['credit_value'].' クラス  '.$output[$x]['description'].'</td>';
								echo '<td>'.$output[$x]['exp_date'].' 日</td>';
								echo '<td><b>'. number_format($output[$x]['credit_price'], 0, '.', ',').'円/月</b><br /><small>'.$output[$x]['price_description'].'</small></td>';
								echo "<td><a href='#modalBuy".$output[$x]['id']."' role='button' class='btn btn-success btn-xs' data-toggle='modal'>クレジットを購入する</a></td>";
								echo '<div id="modalBuy'.$output[$x]['id'].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
				     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				     <h3 id="myModalLabel">クレジットを購入する</h3>
				    </div>
				    
				    <div class="modal-body">
				    	あなたはこれから '.$output[$x]['credit_price'].'円で'.$output[$x]['credit_value'].'クレジットを購入します。
				    </div>
				    
				    <div class="modal-footer">
				    	<form action="../paypal/pay.php" method="post">
				         <input type="hidden" name="user_id" value="'.$page_protect->user_id.'" />
				        <input type="hidden" name="price" value="'.str_replace( ',', '', $output[$x]['credit_price'] ).'" />
				        <input type="hidden" name="id" value="'.$output[$x]['id'].'" />
				        <button type="submit" name="submit_payment" class="btn btn-primary">続ける</button>
				         <button class="btn" data-dismiss="modal" aria-hidden="true">キャンセル</button>
				    	</form>
				    </div>
				</div>
				</div>
			<div>';
							echo '</tr>';
						}
                        ?>
						</table>	
    </div>
    </div>            
  
       
</div><!--/col-md-9-->



 <?php
 include('footer-student.php');
 ?>   