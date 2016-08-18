<?php
include('header-student.php');
?>

	    <div class="col-md-9">
           <div class="tabbable tabs-left">
			<div class="tab-content"> 
             <?php           


             	//Add/Edit Materials
             	if(isset($_POST['save']))
					{
						if($_POST['material_id']=='')
							{
							if( $_FILES["file"]["name"] != ""){
								if(is_numeric($_POST['order'])){
									if (( $_FILES["file"]["type"] == "application/pdf") && ($_FILES["file"]["size"] < 20000000)) 
										{
										      if ($_FILES["file"]["error"] > 0) {
										        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'
										        . $_FILES["file"]["error"] . '<br>';
										      }

										  if (file_exists("../materials/" . $_FILES["file"]["name"])) {
										  	$_FILES["file"]["name"] = str_replace(".pdf","",$_FILES["file"]["name"])."1.pdf";
										      }

										  	  		//Get category and subcategory
										  	  		$cat_choice = explode(":", $_POST['category_input']);
												        	move_uploaded_file($_FILES["file"]["tmp_name"],
												        	"../materials/" . $_FILES["file"]["name"]);
												       	//update\
													$sql = 'INSERT INTO materials (`material_id`, `title`, `content`, `order`, `category_id`, `subcategory_id`) VALUES (NULL, "'.$_POST['title'].'", "../materials/'.$_FILES["file"]["name"].'",'.$_POST['order'].','.$cat_choice[0].','.$cat_choice[1].')'; //added fulldate
														$ins_res=mysql_query($sql) or die(mysql_error());
														if($ins_res)
														{
															echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
														}	
														else
														{
															echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
														}
												
										}
									else {
									echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
									}
								}
								else{
								echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>"Material Order" must be a number.</div>';
								}
							}
							else{
							echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>Please upload a material.</div>';
							}
						


						}
						else
							{

							if($_FILES["file"]["error"] == 0){

								if (($_FILES["file"]["type"] == "application/pdf") && ($_FILES["file"]["size"] < 20000000)) 
									{
									      if ($_FILES["file"]["error"] > 0) {
									        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'
									        . $_FILES["file"]["error"] . '<br>';
									      }

									  	  if (file_exists("../materials/" . $_FILES["file"]["name"])) {
										  	$_FILES["file"]["name"] = str_replace(".pdf","",$_FILES["file"]["name"])."1.pdf";
										      }
									        //Get category and subcategory
										  	  $cat_choice = explode(":", $_POST['category_input']); 

											        move_uploaded_file($_FILES["file"]["tmp_name"],
											        "../materials/" . $_FILES["file"]["name"]);
											      
											       //update\
													$sql = 'UPDATE materials SET title="'.$_POST['title'].'", materials.order='.$_POST['order'].', content="../materials/'.$_FILES["file"]["name"].'", category_id='.$cat_choice[0].', subcategory_id='.$cat_choice[1].' WHERE material_id='.$_POST['material_id'];
													$ins_res=mysql_query($sql) or die(mysql_error());
													if($ins_res)
													{
														echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
													}	
													else
													{
														echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
													}
				
									}
								else {
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
							}
						}
						elseif(
							isset($_POST['title']) &&
							isset($_POST['content']) &&
							isset($_POST['order']) &&
							isset($_POST['category_input'])
							){

							//Get category and subcategory
							$cat_choice = explode(":", $_POST['category_input']);

							$sql = 'UPDATE materials 
									SET `title`="'.$_POST['title'].'" , 
									`order` ='.$_POST['order'].' , 
									`content` ="'.$_POST['content'].'",
									`category_id` ="'.$cat_choice[0].'",
									`subcategory_id` ="'.$cat_choice[1].'" 
									WHERE material_id='.$_POST['material_id'];
								$ins_res=mysql_query($sql) or die(mysql_error());
								if($ins_res)
								{
									echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
								}	
								else
								{
									echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
								}
				
							}
						else{
							echo '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button>Please Complete the form.</div>';
							}
							}	
					}
			 ?>

				<div id="4B" class="tab-pane fade in <?php echo $tab=='4B' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row materialsBox">
						
						<h4>View Materials</h4> 
		              
						<?php 
							
						//Get category list
						$res1 = $page_protect->get_categories();
						while($row = mysql_fetch_array($res1,MYSQL_NUM)){
							$cat[$row[0]] = $row[1];
						}

						//Get subcategory list
						$res2 = $page_protect->get_subcategories();
						while($row =  mysql_fetch_array($res2,MYSQL_NUM)){
							$subcat[$row[0]] = $row[2];
						}

						$res3 = $page_protect->get_all_categories();
						while($row3 = mysql_fetch_array($res3,MYSQL_NUM)){
							$list[$row3[1]][$row3[0]]['name']= $row3[2];
						}
						
					
						foreach($cat as $a => $b) {
							if($b == "9. Answer Keys" ) {
								
							} else {
							echo "<h5><b>".$b."</b></h5>";

						?>
						<div class="panel-group materials-tab" id="accordion-<?php echo $a; ?>" role="tablist" aria-multiselectable="true">

						<?php
							foreach($list[$a] as $c => $d) {
								
								$countsub = $page_protect->get_materials($a, $c, NULL);
								$countsub = mysql_num_rows($countsub);
								
								echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading-'.$c.'"><h5 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$c.'"   aria-expanded="false" aria-controls="collapse-'.$c.'">'.$subcat[$c].' ('.$countsub.')</a></h5></div>';
								
								echo '<div id="collapse-'.$c.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-'.$c.'" ><div class="panel-body">';
								
								
								
								if(isset($subcat[$c])) {
									$res4 = $page_protect->get_materials($a, $c, NULL);
									echo "<ul>";
									while($row4 = mysql_fetch_array($res4,MYSQL_ASSOC)){
										if(	$row4['visibility'] == "1" ) {
											echo "<li><a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a></li>";
										} else {
											echo "<li>".$row4['title']."</li>";
											
										}
									}
									echo "</ul>";
								}
								echo '</div></div></div>'; //end of panel body
							} 
						?>
						
						</div><!-- end of accordion -->
						<?php
							} //end of else to check if answer key
						} //end of foreach loop
						?>
		              

		               
		            </div>
		         
	  			</div>
				
				<div id="4D" class="tab-pane fade in <?php echo $tab=='4D' ? 'active' : '';?> col-xs-12 col-md-12">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4D" method="POST" enctype="multipart/form-data">		                				
				<div id="deleteCategory" class="modal fade deleteCategory" tabindex="-1" role="dialog" aria-labelledby="deleteCategory" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
						  <div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">
        						<span aria-hidden="true">&times;</span>
        						<span class="sr-only">Close</span>
        						</button>			 
			    		<h4>Delete Category</h4> 
			    		      </div>
				      <div class="modal-body">
 						<p>All sub-categories under this category will be deleted. Are you sure you want to delete this category?</p>
						<input type="hidden" name="catId"  id="modinput" value=""/>
	  				</div>
      				<div class="modal-footer">
						<button type="submit" name="deleteCat" class="btn btn-primary" value="submit" type="button">
							<i class="glyphicon-ok glyphicon"></i> Submit
						</button>
    					<button type="submit" name="deleteCat" class="btn btn-default" value="submit" type="button" data-dismiss="modal" aria-hidden="true">
							<i class="glyphicon-remove glyphicon"></i> Cancel
						</button>
    					
					</div>
					</div>
				</div>
				</div>	
			</form>


					<div class="row">
						<div class="col-md-4">
						<h4>View/Edit Categories</h4> 
		                </div>
		                <div class="col-md-5 col-md-offset-3">
		                	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4D" method="POST">
		                	<div class="input-group">
		                	<span class="input-group-addon">
		                		Arrange By:
		                	</span>
		                	<select name="filterCategory" class="form-control">
		                		<option value="1"></option>
								<option value="category_name">Category Name</option>
		                		<option value="category_id">Category ID</option>
		                	</select>
		                	<span class="input-group-btn">
		                	<button name="submit_filterCategory" class="btn-primary btn">
		                	Go!
		                	</button>
		                	</span>
		                	</div>
		                	</form>
		                </div>
		            </div>
		          <div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-bordered table-hover">

						<tr>
						<th class="hidden-xs" style="width:10px;">ID</th>
						<th>Name</th>
						<th class="hidden-xs" style="width:20px;">Delete</th>
						</tr>
						<?php

								if(isset($_POST['filterCategory'])!= "" && isset($_POST['submit_filterCategory'])){
										$filter = " ORDER BY ".$_POST['filterCategory']." ASC";
										$res = $page_protect->get_categories($filter);
								}else{
										$res = $page_protect->get_categories();
								}
								
								
								while($row = mysql_fetch_array($res,MYSQL_NUM))
								{
								echo '<tr>';
								echo '<td class="hidden-xs"><span class="label label-success">'.$row[0].'</span></td>';
								echo '<td><a href="materials.php?t=4D&category_id='.$row[0].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$row[1].'</a></td>';
								?>
								<td><button type="button" class="btn-warning btn" data-toggle="modal" onclick="delete_category('<?php echo $row[0]; ?>');" data-target=".deleteCategory"><i class="glyphicon glyphicon-remove"></i></button></td>
								</tr>
								<?php 
								}
							?>
							
						</table>
		            	<?php
				            if(isset($_GET['category_id']))
								{
										$category_id = filter_var($_GET['category_id'], FILTER_SANITIZE_STRING);  
										echo $page_protect->update_category($category_id);
								}
						?>

		            	<!-- / View Category ========================================================================-->
	  				</div>
	  			</div>
				</div>

				


			<div id="4F" class="tab-pane fade in <?php echo $tab=='4F' ? 'active' : '';?> col-xs-12 col-md-12">

				<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4F" method="POST" enctype="multipart/form-data">		                				
				<div id="deleteSubcategory" class="modal fade deleteSubcategory" tabindex="-1" role="dialog" aria-labelledby="deleteSubcategory" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
						  <div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">
        						<span aria-hidden="true">&times;</span>
        						<span class="sr-only">Close</span>
        						</button>			 
			    		<h4>Delete Sub-category</h4> 
			    		      </div>
				      <div class="modal-body">
 						<p>Are you sure you want to delete this sub-category?</p>
						<input type="hidden" name="subcatId"  id="modinput_sub" value=""/>
	  				</div>
      				<div class="modal-footer">
						<button type="submit" name="deleteSubcat" class="btn btn-primary" value="submit" type="button">
							<i class="glyphicon-ok glyphicon"></i> Submit
						</button>
    					<button type="submit" name="deleteSubcat" class="btn btn-default" value="submit" type="button" data-dismiss="modal" aria-hidden="true">
							<i class="glyphicon-remove glyphicon"></i> Cancel
						</button>
    					
					</div>
					</div>
				</div>
				</div>	
				</form>
				
					<div class="row">
						<div class="col-md-4">
						<h4>View/Edit Sub-categories</h4> 
		                </div>
		                <div class="col-md-7 col-md-offset-1">
		                	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4F" method="POST">
		                	<div class="input-group">
		                	<span class="input-group-addon">
		                		Category:
		                	</span>
		                	<select name="viewSub_category" class="form-control">
		                		<option value=""></option>
		                		<?php 
		                			//Get category list
		                			$res1 = $page_protect->get_categories();
		                			while($row = mysql_fetch_array($res1,MYSQL_NUM)){
		                				echo '<option value='.$row[0].'>'.$row[1].'</option>'; 
									}
								?>
		                	</select>
		                	<span class="input-group-addon">
		                		Arrange By:
		                	</span>
		                	<select name="filterSubcategory" class="form-control">
		                		<option value="1"></option>
								<option value="subcategory_name">Sub-category Name</option>
		                		<option value="subcategory_id">Sub-category ID</option>
		                	</select>
		                	<span class="input-group-btn">
		                	<button name="submit_filterSubcategory" class="btn-primary btn">
		                	Go!
		                	</button>
		                	</span>
		                	</div>
		                	</form>
		                </div>
		            </div>
		          <div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-bordered table-hover">

						<tr>
						<th class="hidden-xs" style="width:10px;">ID</th>
						<th>Name</th>
						<th>Category</th>
						<th class="hidden-xs" style="width:20px">Delete</th>
						</tr>
						<?php
								//Get category list
								$res1 = $page_protect->get_categories();
								while($row = mysql_fetch_array($res1,MYSQL_NUM)){
									$category_list[$row[0]] = $row[1];
								}

								//Get category filter
								$filter = NULL;
								if(!empty($_POST['viewSub_category'])){
									$filter .= " WHERE category_id =".$_POST['viewSub_category'];
								}

								//Get subcategories
								if(isset($_POST['filterSubcategory'])!= "" && isset($_POST['submit_filterSubcategory'])){
										$filter .= " ORDER BY ".$_POST['filterSubcategory']." ASC";
										$res = $page_protect->get_subcategories($filter);
								}else{
										$res = $page_protect->get_subcategories();
								}
								
								while($row = mysql_fetch_array($res,MYSQL_NUM))
								{
								echo '<tr>';
								echo '<td class="hidden-xs"><span class="label label-success">'.$row[0].'</span></td>';
								echo '<td><a href="materials.php?t=4F&subcategory_id='.$row[0].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$row[2].'</a></td>';
								echo '<td>'.$category_list[$row[1]].'</td>';
								?>
								<td><button type="button" class="btn-warning btn" data-toggle="modal" onclick="delete_subcategory('<?php echo $row[0]; ?>');" data-target=".deleteSubcategory"><i class="glyphicon glyphicon-remove"></i></button></td>
								</tr>
								<?php 
								}
							?>
						</table>
		            	<?php
				            if(isset($_GET['subcategory_id']))
								{
										$subcategory_id = filter_var($_GET['subcategory_id'], FILTER_SANITIZE_STRING);  
										echo $page_protect->update_subcategory($subcategory_id);
								}
						?>
		            	<!-- / View Sub-category ========================================================================-->
	  				</div>
	  			</div>
				</div>


			</div>
			</div>

<?php
include('footer-student.php');
?>   