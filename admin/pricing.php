<?php
include("header-admin.php");
include('../includes/utilities/functions/pricing.php');
?>
<div class="col-md-9">
			<div class="tabbable tabs-left">
			<div class="tab-content">
				<div id="5A" class="tab-pane fade in <?php echo $tab=='5A' ? 'active' : '';?>">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<h4>Credit List</h4>
					</div>
				<div class="col-xs-5 col-xs-offset-1 col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-4">
						<form action="CSV.php" method="POST" style="text-align:right;">
							<input name="path" value="<?php echo $path;?>" type="hidden" />
							<input name="filter" value="<?php echo $filter;?>" type="hidden" />
							
								<span data=toggle="tooltip" title="Download Credit list" class="btn-group-addon">
								<button class="btn btn-warning" type="submit" name="download_csv">
									<i class="glyphicon glyphicon-download"></i>
								</button>
								
								</span>
								<a href='#ModalCreate' data-toggle='modal' data-backdrop='static' class="btn btn-info">
									<i class='glyphicon-file glyphicon'></i>
								</a>
							
					  	</form>
					</div>
				</div>

				<div class="row">
				<div class="col-xs-12 col-md-12">
				<table class="table table-striped table-bordered table-hover">
					<tr class="alert-success">
					<th>ID</th>
					<th>Name</th>
                    <th>Price</th>
					<th>Duration</th>
					<th>Credit Value</th>
					<th class="hidden-xs">Date</th>
					<th>Action</th>
					</tr>
				<?php
				if($filter != ""){
					$output =  $page_protect->get_credit_list($filter,NULL);
				}
				else{
					$output = $page_protect->get_credit_list(NULL,NULL);
				}
		for($x=0;$x!=$output['count'][0];$x++){
			echo"
			<tr>
				<td>
					<span class='label label-success'>
					".$output[$x]['id']."
					</span>
				</td>
				<td>
					".$output[$x]['name']." <span class='label label-info'>".($output[$x]['credit_type'] == 'esl'? 'ESL' : 'Business English')."</span>
				</td>
				<td>
					".$output[$x]['price']." JPY
				</td>
				<td>
					".$output[$x]['duration']." for ".$output[$x]['exp_date']." day(s)
				</td>
				<td>
					".$output[$x]['credit_value']."
					</td>
				<td class='hidden-xs'>
					".$output[$x]['date']."
				</td>
				<td>
					<a href='#ModalEdit". $output[$x]['id']."' class='btn btn-xs btn-info' data-toggle='modal' data-backdrop='static'><i class='glyphicon glyphicon-edit glyphicon'></i></a>
					<a href='#ModalDelete". $output[$x]['id']."' class='btn btn-xs btn-info' data-toggle='modal' data-backdrop='static'><i class='glyphicon glyphicon-remove glyphicon'></i></a>		
				</td>
			</tr>

			<div id='ModalEdit". $output[$x]['id']."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h4 id='myModalLabel'>View/Edit Credit details</h4>
					</div>
					
					<div class='modal-body'>
						<div id='credit'>
							<p style='vertical-align:top;'>Date:".$output[$x]['date']."
							<p style='vertical-align:top;'>Name:
							<a href='#' id='name' data-type='text' data-pk='".$output[$x]['id']."' title='Edit credit value' data-value='".$output[$x]['name']."'></a>
							</p>
							<p style='vertical-align:top;'>Credit Type:
							<a href='#' id='credit_type' data-type='text' data-pk='".$output[$x]['id']."' title='Edit credit value' data-value='".$output[$x]['credit_type']."'></a> [business_english or esl]
							</p>

							<p style='vertical-align:top;'>Credit Value:
							<a href='#' id='credit_value' data-type='text' data-pk='".$output[$x]['id']."' title='Edit credit value' data-value='".$output[$x]['credit_value']."'></a>
							</p>
							<p style='vertical-align:top;'>Credit Price:
							<a href='#' id='credit_price' data-type='text' data-pk='".$output[$x]['id']."' title='Edit credit value' data-value='".$output[$x]['price']."'></a> JPY
							</p>
							<p style='vertical-align:top;'>Duration:
							<a href='#' id='duration' data-type='text' data-pk='".$output[$x]['id']."' title='Edit credit value' data-value='".$output[$x]['duration']."'></a>
							</p>
							<p style='vertical-align:top;'>Expiration(value per day(s)):
							<a href='#' id='exp_date' data-type='text' data-pk='".$output[$x]['id']."' title='Edit expiration' data-value='".$output[$x]['exp_date']."'></a>
							</p>
							<p style='vertical-align:top;'>Description:
							<a href='#' id='description' data-type='text' data-pk='".$output[$x]['id']."' title='Edit expiration' data-value='".$output[$x]['description']."'></a>
							</p>
							<p style='vertical-align:top;'>Price Description:
							<a href='#' id='price_description' data-type='text' data-pk='".$output[$x]['id']."' title='Edit expiration' data-value='".$output[$x]['price_description']."'></a>
							</p>
						</div>
					</div>
					
					<div class='modal-footer'>
						<button class='btn' data-dismiss='modal' aria-hidden='true'>Close</button>
					</div>
				</div>
				</div>
			</div>

			<div id='ModalDelete". $output[$x]['id']."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
				<div class='modal-content'>
					
					<div class='modal-header'>
						<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
						<h4 id='myModalLabel'>View/Edit Credit details</h4>
					</div>
					
					<div class='modal-body'>
						<p style='vertical-align:top;'>Date:".$output[$x]['date']."
						</p>
						<p style='vertical-align:top;'>Credit Value:".$output[$x]['credit_value']."
						</p>
						<p style='vertical-align:top;'>Credit Price:".$output[$x]['price']."
						</p>
						<p style='vertical-align:top;'>Duration:".$output[$x]['duration']."
						</p>
						<p style='vertical-align:top;'>Expiration:".$output[$x]['exp_date']."
						</p>
						Are you sure you want to delete this item?
					</div>
					
					<div class='modal-footer'>
						<form action='".$_SERVER['PHP_SELF']."?t=5A' method='POST'>
							<input name='id' type='hidden' value='".$output[$x]['id']."'/>
							<button class='btn' name='delete_credit' type='submit'><i class='glyphicon glyphicon-trash'></i>&nbsp;Yes</button>
							<button class='btn' data-dismiss='modal' aria-hidden='true'>Back</button>
						</form>
					</div>
					
				</div>
				</div>
			</div>
		";
			}
				?>
				</table>
				</div>
				</div>
				<div id='ModalCreate' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
					<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 id='myModalLabel'>Create a new Credit</h4>
						</div>
						
						<div class='modal-body'>
							<div id='credit'>
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>?t=5A" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-8">
                                	<input name="name" type="text" class="form-control" value="<?php echo $_POST['name'] != '' ? ''.$_POST['name'].'':''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Credit Type</label>
                                <div class="col-sm-4">
                                	<select name="credit_type" class="form-control">
                                    	<option value="business_english">Business English</option>
                                        <option value="esl">ESL</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Credit Value</label>
                                <div class="col-sm-4">
                                	<input name="value" type="text" class="form-control" value="<?php echo $_POST['value'] != '' ? ''.$_POST['value'].'':''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price</label>
                                <div class="col-sm-4">
                                	<input name="price" type="text" class="form-control" value="<?php echo $_POST['price'] != '' ? ''.$_POST['price'].'':''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Duration</label>
                                <div class="col-sm-8">
                                	<input name="time" type="text" class="form-control" value="<?php echo $_POST['time'] != '' ? ''.$_POST['time'].'':''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Expiration (in days)</label>
                                <div class="col-sm-4">
                                	<input name="exp_date" type="text" class="form-control" value="<?php echo $_POST['exp_date'] != '' ? ''.$_POST['exp_date'].'':''; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-8">
                                	<input name="description" type="text" class="form-control" value="<?php echo $_POST['description'] != '' ? ''.$_POST['description'].'':''; ?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Price Description</label>
                                <div class="col-sm-8">
                                	<input name="price_description" type="text" class="form-control" value="<?php echo $_POST['price_description'] != '' ? ''.$_POST['price_description'].'':''; ?>"/>
                                </div>
                            </div>
                
							</div>
						</div>
						
						<div class='modal-footer'>
							<button class='btn btn-primary' type="submit" name="create_credit"><i class="glyphicon glyphicon-ok"></i>&nbsp;Create</button>
							<button class='btn' data-dismiss='modal' aria-hidden='true'>Cancel</button>
							</form>
						</div>
					</div>
					</div>
				</div>

				</div>
			</div>
		</div>
		</div>

<?php
include("footer-admin.php");
?>