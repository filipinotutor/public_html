<?php

include('header-student.php');
?>
        <div class="col-md-9">
        <div class="row">
	        <div class="col-md-12">
				<h4>クレジット</h4>
			</div>
		</div>
              <?php
			  /////////////// add days to date
			  
			 	/*$date = "04/28/2013 07:30:00";
				$dates = explode(" ",$date);
				$date = strtotime($dates[0]);
				$date = strtotime("+6 days", $date);
				echo date('Y-m-d', $date)." ".$dates[1];
				echo date("Y-m-d H:i:s", time());
			  */
			  $credits=0;
			  //echo $currdate = strtotime(date("Y-m-d H:i:s", time()));
			  $currdate = date("Y-m-d H:i:s", time());
			  //echo '<br/>';
			  //echo strtotime('2013-06-16 07:30:00');
			  $sql = 'SELECT credit_value, expiration, date_paid FROM studentcredits WHERE student_id='.$page_protect->user_id.' AND expiration > "'.$currdate.'" AND status=1 AND credit_value >0 ORDER BY expiration ASC';
			  $rsd = mysql_query($sql) or die(mysql_error());
			  $rowsresult=array();
						while($row = mysql_fetch_array($rsd,MYSQL_NUM))
						{
						//print_r($row);
						
						$credits=$credits+$row[0];
						$rowsresult[]=$row;
						}
				echo '
					<div class="row">
						<div class="col-md-12">
							トータル クレジット: <span class="label label-success">'.$credits.'</span> Points
						</div>
					</div><br clear="all" />
				';
				//print_r($rowsresult);
				echo '
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Date Paid</th>
										<th>クレジット ポイント</th>
										<th>有効期限</th>
									</tr>
								</thead>
							<tbody>
					';
				foreach($rowsresult as $val)
				{
				
					//echo $val[0];
					echo '
						<tr>
							<td>
								<span class="hidden-xs">'.date('F d, Y g:i:s A',strtotime($val[2])).'</span>
								<span class="visible-xs-block label label-warning">'.date('m/d/Y',strtotime($val[2])).'<br/>'.date('h:i:s',strtotime($val[1])).'</span>
							</td>
							<td>
								<span class="hidden-xs">
									'.$val[0].'
								</span>
								<span class="visible-xs-block label label-success" style="padding-top:5px;padding-bottom:5px;">'.$val[0].'</span>
							</td>
							<td>
								<span class="label label-danger hidden-xs">
									'.date('F d, Y g:i:s A',strtotime($val[1])).'
								</span>
								<span class="visible-xs-block label label-danger">
									'.date('m/d/Y',strtotime($val[1])).'<br/>'.date('h:i:s',strtotime($val[1])).'
								</span>
							</td>
						</tr>
						';

					//echo '<br />';

					//echo $val[0]. ' '. ($val[0]==1 ? 'Point Expires' : 'Points Expire'). ' on:<span class="label label-danger">'. $val[1].'</span>';

					//echo '</tr>';

				}

				echo '		</tbody>
						</table>
					</div>
				</div>';
			  ?>
			 <div class="row">
			 	<div class="col-md-12">
			  		<a href="buy-credits.php" class="btn btn-primary" type="button"><i class="icon-shopping-cart"></i> クレジットを購入する</a>
			  	</div>
			  </div>
            </div><!--/col-md-9 -->
 <?php
 include('footer-student.php');
 ?>   