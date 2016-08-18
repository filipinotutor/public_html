<?php
include('header-admin.php');
?>

	    <div class="col-md-9">
           <div class="tabbable tabs-left">
			<div class="tab-content"> 
             <?php

 //Delete Material
if(isset($_GET['deleteThisSubmit']) == "yes"){
             		/*if($_POST['new_category']==''){
             			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Please complete the form. </div>';
             		}else{
             			$sql = 'INSERT INTO category (`category_id`, `category_name`) VALUES (NULL, "'.$_POST['new_category'].'")'; 
						$ins_res=mysql_query($sql) or die(mysql_error());
						if($ins_res)
						{
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
						}else{
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}
					}*/
					if(isset($_GET['deleteThis'])){
						$page_protect->get_materials_info($_GET['deleteThis']);
						$materialLink = $page_protect->m_content;
						unlink($materialLink);
						$sql = 'DELETE FROM materials WHERE material_id ='.$_GET['deleteThis'];
						$ins_res=mysql_query($sql) or die(mysql_error());
						echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Material successfully deleted.</div>';

					}
					else{
						echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
					}
             	}
//Delete Category
if(isset($_GET['ddeleteThisSubmit']) == "yes"){
					if(isset($_GET['ddeleteThis'])){
						$sql = 'DELETE FROM category WHERE category_id ='.$_GET['ddeleteThis'];
						$ins_res=mysql_query($sql) or die(mysql_error());
						echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Category successfully deleted.</div>';

					}
					else{
						echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
					}
             	}
//Delete Sub category
if(isset($_GET['_deleteThisSubmit']) == "yes"){
					if(isset($_GET['_deleteThis'])){
						$sql = 'DELETE FROM subcategory WHERE subcategory_id ='.$_GET['_deleteThis'];
						$ins_res=mysql_query($sql) or die(mysql_error());
						echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Subcategory successfully deleted.</div>';

					}
					else{
						echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
					}
             	}
             	//Add New Category
             	if(isset($_POST['saveNewCat'])){
             		if($_POST['new_category']=='' || !is_numeric($_POST['category_order'])){
             			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Please complete the form. </div>';
             		}else{
             			$sql = 'INSERT INTO category (`category_id`, `category_name`, `category_order`, `category_type`) VALUES (NULL, "'.$_POST['new_category'].'", "'.$_POST['category_order'].'", "'.$_POST['category_type'].'")'; 
						$ins_res=mysql_query($sql) or die(mysql_error());
						if($ins_res)
						{
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
						}else{
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}
					}
             	}

             	//Edit Existing Category
             	if(isset($_POST['saveCat'])){
             		if($_POST['edit_catName']=='' || !is_numeric($_POST['edit_catOrder'])){
             			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Please complete the form. </div>';
             		}else{
             			$sql = 'UPDATE category SET category_name="'.$_POST['edit_catName'].'", category_order='.$_POST['edit_catOrder'].' WHERE category_id='.$_POST['edit_catID'];
						$ins_res=mysql_query($sql) or die(mysql_error());
						if($ins_res){
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
						}else{
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}
	             	}
             	}
             	
             	//Add New Sub-category
             	if(isset($_POST['saveNewSubcat'])){
             		if($_POST['new_subcategory']=='' || !is_numeric($_POST['new_subcategory_order'])){
             			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Please complete the form. </div>';
             		}else{
             			$sql = 'INSERT INTO subcategory (`subcategory_id`, `category_id`, `subcategory_name`, `subcategory_order`) VALUES (NULL, "'.$_POST['new_subcategory_catID'].'", "'.$_POST['new_subcategory'].'", "'.$_POST['new_subcategory_order'].'")'; 
						$ins_res=mysql_query($sql) or die(mysql_error());
						if($ins_res)
						{
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
						}else{
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}
             		}
             	}

             	//Edit Existing Sub-category
             	if(isset($_POST['saveSubcat'])){
             		if($_POST['edit_subcatName']==''){
           				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Please complete the form. </div>';
            		}else if(!is_numeric($_POST['edit_subcatOrder'])){
           				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> Order must be numeric.</div>';
            		}else{
            			$sql = 'UPDATE subcategory SET subcategory_name="'.$_POST['edit_subcatName'].'", category_id="'.$_POST['edit_subcatCatID'].'", subcategory_order='.$_POST['edit_subcatOrder'].' WHERE subcategory_id='.$_POST['edit_subcatID'];
						$ins_res=mysql_query($sql) or die(mysql_error());
						if($ins_res){
							echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
						}else{
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
						}
            		}
             	}

//Visible
	if(isset($_POST['submit_visible'])) {
		if(!empty($_POST['visibilty'])) {
		    foreach($_POST['visibilty'] as $check) {
		            $sql = 'UPDATE materials SET visibility="1" WHERE material_id="'.$check.'"';
			$ins_vis=mysql_query($sql) or die(mysql_error());
		    }

		    if($ins_vis){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
			}else{
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
			}
		}
	}


//Invisible
	if(isset($_POST['submit_hide'])) {
		if(!empty($_POST['visibilty'])) {
		    foreach($_POST['visibilty'] as $check) {
		            $sql = 'UPDATE materials SET visibility="0" WHERE material_id="'.$check.'"';
			$ins_vis=mysql_query($sql) or die(mysql_error());
		    }

		    if($ins_vis){
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>Record saved.</div>';
			}else{
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
			}
		}
	}



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
													$sql = 'INSERT INTO materials (`material_id`, `title`, `content`, `material_order`, `category_id`, `subcategory_id`) VALUES (NULL, "'.$_POST['title'].'", "../materials/'.$_FILES["file"]["name"].'",'.$_POST['order'].','.$cat_choice[0].','.$cat_choice[1].')'; //added fulldate
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
													$sql = 'UPDATE materials SET title="'.$_POST['title'].'", materials.material_order='.$_POST['order'].', content="../materials/'.$_FILES["file"]["name"].'", category_id='.$cat_choice[0].', subcategory_id='.$cat_choice[1].' WHERE material_id='.$_POST['material_id'];
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
							isset($_POST['category_input']) &&
							isset($_POST['visibility'])
							){
							
							//Get category and subcategory
							$cat_choice = explode(":", $_POST['category_input']);

							$sql = 'UPDATE materials 
									SET `title`="'.$_POST['title'].'" , 
									`material_order` ='.$_POST['order'].' , 
									`content` ="'.$_POST['content'].'",
									`category_id` ="'.$cat_choice[0].'",
									`subcategory_id` ="'.$cat_choice[1].'",
									`visibility` = '.$_POST['visibility'].' 
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

			    <div id="4A" class="tab-pane fade in <?php echo $tab=='4A' ? 'active' : '';?> col-xs-12 col-md-12">
			    	
					<div class="row">
						<div class="col-md-12">
						<h4>New Material</h4> 
						</div>
					</div>
                <form action="materials.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-gorup col-xs-12 col-md-6">
							 <input type="text" class="form-control" name="title" placeholder="Title" required="true"/>
							 <input type="text" class="form-control" name="order" placeholder="Material Order" required="true"/>
							 <div class="input-group">
								 <span class="input-group-addon">
			                		Category:
			                	</span>
			                	<select name="category_input" class="form-control">
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
			                	
			                	foreach($cat as $a => $b){
			                		echo '<option value='.$a.':0 class="cat_optgroup" >'.$b.'</option>';
			                		foreach($list[$a] as $c => $d){
			                			echo '<option value='.$a.':'.$c.' class="sub_cat">'.$subcat[$c].'</option>';
			                		}
			                	}
								?>
			                	</select>
		                	 </div>

						<div class="input-group">
	              			<span class="btn btn-xs btn-warning btn-file input-group-addon"> Browser : 
	                           	<i class="glyphicon glyphicon-circle-arrow-up"></i>
	                           	<input name="file" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;" required="true"/>
	                     	</span>
	                     	<input id="upfile" type="text" class="form-control" readonly/>
	                     	<br />
	          			</div>
						<input type="hidden" name="material_id" value=""/>
							 <input type="hidden" name="t" value="4A"/>
						<button type="submit" name="save" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
                 
				
				</div>
				<div id="4B" class="tab-pane fade in <?php echo $tab=='4B' ? 'active' : '';?> col-xs-12 col-md-12">
					
		          <div class="row materialsBox">
						<h4>View/Edit Materials</h4> 
						
						<?php
							if(isset($_GET['material_id'])) {
									$material_id = filter_var($_GET['material_id'], FILTER_SANITIZE_STRING);  
									echo $page_protect->update_material($material_id);
							}
						?>
						
						<br clear="all" />
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
							echo "<h5><b>".$b."</b></h5>";

						?>
						<script>
						function toggleChevron(e) {
							$(e.target)
								.prev('.panel-heading')
								.find('i.indicator')
								.toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
						}
						$('#accordion').on('hidden.bs.collapse', toggleChevron);
						$('#accordion').on('shown.bs.collapse', toggleChevron);
						</script>

						<div class="panel-group materials-tab" id="accordion-<?php echo $a; ?>" role="tablist" aria-multiselectable="true">

						<?php
							//$a for categories ID
							
							foreach($list[$a] as $c => $d) {
								
								$countsub = $page_protect->get_materials($a, $c, NULL);
								$countsub = mysql_num_rows($countsub);
								
								//$c for sub-categories IDs
								
								
								echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading-'.$c.'"><h5 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$c.'"   aria-expanded="false" aria-controls="collapse-'.$c.'">'.$subcat[$c].' ('.$countsub.')</a></h5></div>';
								
								echo '<div id="collapse-'.$c.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-'.$c.'" ><div class="panel-body">';
								
								
								if( $subcat[$c] != "" ) {
									
									$res4 = $page_protect->get_materials($a, $c, NULL);
									echo "<ul>";
									while($row4 = mysql_fetch_array($res4,MYSQL_ASSOC)){
										
										$lesson = "<a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a>";
										
										
										$editlink = '<a href="materials.php?t=4B&material_id='.$row4['material_id'].'" title="Edit" data-placement="right" data-toggle="tooltip"><span class="glyphicon glyphicon-edit"></span></a>';
										
										$deletelink = '<a data-toggle="modal" data-target="#deleteModal-'.$row4['material_id'].'" title="Delete" data-placement="right" data-toggle="tooltip"><i class="glyphicon glyphicon-trash" ></i></a>';
										
										
										echo '<div class="modal fade" id="deleteModal-'.$row4['material_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										  <div class="modal-dialog">
											<div class="modal-content">
											  <div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Delete Material</h4>
											  </div>
											  <div class="modal-body">
												Are you sure you want to delete '.$row4['title'].'?
											  </div>
											  <div class="modal-footer">
													<a href="materials.php?deleteThisSubmit=yes&deleteThis='.$row4['material_id'].'&t=4B" class="btn btn-xs btn-warning">
														<i class="glyphicon glyphicon-remove" ></i>&nbsp;Yes
													</a>
													<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
												</div>
											</div>
										  </div>
										</div>';
										
										
										
										$vis = ($row4['visibility'] == "1") ? "<span class='label label-success' title='Visible to students' data-placement='right' data-toggle='tooltip'>Visible</span>" : "<span class='label label-danger' title='Hidden to students' data-placement='right' data-toggle='tooltip'>Hidden</a></span>";
										
										echo "<li>".$vis." ".$lesson." - ".$editlink. " | ".$deletelink;
										
										
										echo "</li>";
									}
									echo "</ul>";
								} else {
									
								}
								echo '</div></div></div>'; //end of panel body
							} 
						?>
						
						</div><!-- end of accordion -->
						<?php
						} //end of foreach loop
						?>
		              
		       
		         
		            </div>
				
</div>
				<div id="4C" class="tab-pane fade in <?php echo $tab=='4C' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
						<h4>New Category</h4> 
						</div>
					</div>
                <form action="materials.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-xs-12 col-md-6">
							 <input type="text" class="form-control" name="new_category" placeholder="Category Name"/>
                             <input type="number" class="form-control" name="category_order" placeholder="Category Order"/>
							 <select class="form-control" name="category_type">
							 	<option value="0">Select Category Type</option>
							 	<option value="2">ESL</option>
							 	<option value="1">Business</option>
							 </select>
							 <br/>
							 <input type="hidden" name="t" value="4C"/>
						<button type="submit" name="saveNewCat" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
				</div>

				<div id="4D" class="tab-pane fade in <?php echo $tab=='4D' ? 'active' : '';?> col-xs-12 col-md-12">
			<!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4D" method="POST" enctype="multipart/form-data">		                				
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
    					<button type="submit" name="deleteCat1" class="btn btn-default" value="submit" type="button" data-dismiss="modal" aria-hidden="true">
							<i class="glyphicon-remove glyphicon"></i> Cancel
						</button>
    					
					</div>
					</div>
				</div>
				</div>	
			</form>-->


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
                                <option value="category_order">Category Order</option>
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
								<td>
									<?php
									echo '<button data-toggle="modal" data-target="#ddeleteModal-'.$ModalCount.'" class="btn btn-xs btn-warning">
											<i class="glyphicon glyphicon-remove" ></i>
									</button>
								</td>
								<div class="modal fade" id="ddeleteModal-'.$ModalCount.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
								      </div>
								      <div class="modal-body">
								        Are you sure you want to delete this Category?
								      </div>
								      <div class="modal-footer">
											<a href="materials.php?ddeleteThisSubmit=yes&ddeleteThis='.$row[0].'&t=4D" class="btn btn-warning">
												<i class="glyphicon glyphicon-remove" ></i>&nbsp;Yes
											</a>
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										</div>
								    </div>
								  </div>
								</div>';

								$ModalCount++;
								echo '</tr>';
								?>
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

				<div id="4E" class="tab-pane fade in <?php echo $tab=='4E' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
						<h4>New Sub-category</h4> 
						</div>
					</div>
                		<form action="materials.php" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="form-gorup col-xs-12 col-md-6">
							<div class="input-group">
		                	<span class="input-group-addon">
		                		Category:
		                	</span>
		                	<select name="new_subcategory_catID" class="form-control">
							<?php 
								$res = $page_protect->get_categories();
								while($row = mysql_fetch_array($res,MYSQL_NUM))
								{
									echo '<option value='.$row[0].'>'.$row[1].'</option>'; 
								}
							?>
							</select>
							</div> 

							 <input type="text" class="form-control" name="new_subcategory" placeholder="Sub-category Name"/>
                             <input type="text" class="form-control" name="new_subcategory_order" placeholder="Sub-category Order"/>
							 <input type="hidden" name="t" value="4E"/>
						<button type="submit" name="saveNewSubcat" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
				</div>


			<div id="4F" class="tab-pane fade in <?php echo $tab=='4F' ? 'active' : '';?> col-xs-12 col-md-12">

			<!--<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4F" method="POST" enctype="multipart/form-data">		                				
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
						<input type="text" name="subcatId" id="modinput_sub" value="<?php echo $_POST['getcatid'];?>"/>
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
				</form>-->
				
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
                                <option value="subcategory_order">Sub-category Order</option>
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
                    <?php
				            if(isset($_GET['subcategory_id']))
								{
										$subcategory_id = filter_var($_GET['subcategory_id'], FILTER_SANITIZE_STRING);  
										echo $page_protect->update_subcategory($subcategory_id);
								}
						?>
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
										$filter .= " ORDER BY subcategory_order ASC";
										$res = $page_protect->get_subcategories($filter);
								}

								$ModalCount = 0;
								while($row = mysql_fetch_array($res,MYSQL_NUM))
								{
								echo '<tr>';
								echo '<td class="hidden-xs"><span class="label label-success">'.$row[0].'</span></td>';
								echo '<td><a href="materials.php?t=4F&subcategory_id='.$row[0].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$row[2].'</a></td>';
								echo '<td>'.$category_list[$row[1]].'</td>';
								?>
								<td>
									<?php
									echo '<button data-toggle="modal" data-target="#_deleteModal-'.$ModalCount.'" class="btn btn-warning">
											<i class="glyphicon glyphicon-remove" ></i>
									</button>
								</td>
								<div class="modal fade" id="_deleteModal-'.$ModalCount.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								        <h4 class="modal-title" id="myModalLabel">Delete Sub-category</h4>
								      </div>
								      <div class="modal-body">
								        Are you sure you want to delete this Sub-category?
								      </div>
								      <div class="modal-footer">
											<a href="materials.php?_deleteThisSubmit=yes&_deleteThis='.$row[0].'&t=4F" class="btn btn-warning">
												<i class="glyphicon glyphicon-remove" ></i>&nbsp;Yes
											</a>
											<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
										</div>
								    </div>
								  </div>
								</div>';

								$ModalCount++;
								echo '</tr>';
								?>
								<?php
								}
							?>
						</table>
		            	<!-- / View Sub-category ========================================================================-->
	  				</div>
	  			</div>
				</div>


			</div>
			</div>

<?php
include('footer-admin.php');
?>   