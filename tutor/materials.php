<?php
include('header-tutor.php');
?>
	
	    <div class="col-md-9">
           <div class="tabbable tabs-left">
			<div class="tab-content"> 
             <?php

	//Set Material Visible to Tutors
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

	//Set Material Invisible to Tutors
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




             	if(isset($_POST['save']))
					{
						if($_POST['material_id']=='')
							{
							if(is_numeric($_POST['order'])){
								if (($_FILES["file"]["type"] == "application/pdf") && ($_FILES["file"]["size"] < 20000000)) 
									{
									      if ($_FILES["file"]["error"] > 0) {
									        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'
									        . $_FILES["file"]["error"] . '<br>';
									      }

									  	  if (file_exists("../materials/" . $_FILES["file"]["name"])) {
									        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'
									        		.$_FILES["file"]["name"] . ' already exists. </div>';
									      }

									  	  else {
									  	  			//Get category and subcategory
													$cat_choice = explode(":", $_POST['category_input']);

											        move_uploaded_file($_FILES["file"]["tmp_name"],
											        "../materials/" . $_FILES["file"]["name"]);
											       //update\
												$sql = 'INSERT INTO materials (`material_id`,`title`, `content`, `order`, `category_id`, `subcategory_id`) VALUES (NULL, "'.$_POST['title'].'", "../materials/'.$_FILES["file"]["name"].'" ,'.$_POST['order'].','.$cat_choice[0].','.$cat_choice[1].')'; //added fulldate
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
									}
									else {
										echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retry.</div>';
									}
								}
								else {
								echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>"Order" must be a number</div>';
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
									        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>'
									        		.$_FILES["file"]["name"] . ' already exists. </div>';
									      }

									  	  else {
									  	  			//Get category and subcategory
													$cat_choice = explode(":", $_POST['category_input']);

											        move_uploaded_file($_FILES["file"]["tmp_name"],
											        "../materials/" . $_FILES["file"]["name"]);
											      
											       //update\
													$sql = 'UPDATE materials SET title="'.$_POST['title'].'", materials.order="'.$_POST['order'].'", content="../materials/'.$_FILES["file"]["name"].'", category_id='.$cat_choice[0].', subcategory_id='.$cat_choice[1].' WHERE material_id='.$_POST['material_id'];
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
									`content` ="'.$_POST['content'].'" ,
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
			 if($page_protect->tutor_access === "1" ||$page_protect->tutor_access === 1 ){
			 ?>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4B" method="POST" enctype="multipart/form-data">		                				
				<div class="modal fade AddMaterials" tabindex="-1" role="dialog" aria-labelledby="AddMaterials" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
						  <div class="modal-header">
        					<button type="button" class="close" data-dismiss="modal">
        						<span aria-hidden="true">&times;</span>
        						<span class="sr-only">Close</span>
        						</button>			 
			    		<h4>New Material</h4> 
			    		      </div>
				      <div class="modal-body">
 						<input type="text" class="form-control" name="title" placeholder="Title"/>
						<input type="text" class="form-control" name="order" placeholder="Material Order"/>
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
					                		echo '<option value='.$a.':0 class="cat_optgroup" disabled>'.$b.'</option>';
					                		foreach($list[$a] as $c => $d){
					                			echo '<option value='.$a.':'.$c.' class="sub_cat">'.$subcat[$c].'</option>';
					                		}
					                	} 
									?>
			                	</select>
		                	 </div>
						<div class="input-group">
	              			<span class="btn btn-warning btn-file input-group-addon"> Browser : 
	                           	<i class="glyphicon glyphicon-circle-arrow-up"></i>
	                           	<input name="file" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;"/>
	                     	</span>
	                     	<input id="upfile" type="text" class="form-control" readonly/>
	                     	<br />
	          			</div>
						<input type="hidden" name="material_id" value=""/>
	  				</div>
      				<div class="modal-footer">
						<button type="submit" name="save" class="btn btn-primary" value="submit" type="button">
							<i class="glyphicon-ok glyphicon"></i> Submit
						</button>
    					<button type="submit" name="save" class="btn btn-default" value="submit" type="button" data-dismiss="modal" aria-hidden="true">
							<i class="glyphicon-remove glyphicon"></i> Cancel
						</button>
    					
					</div>
					</div>
				</div>
				</div>	
			</form>
				

			<?php
		}
			?>
				<div id="ViewMaterial" class="col-xs-12 col-md-12">
				
					<div class="row materialsBox">
						
						<h4>View Materials</h4> 
		              
						<?php 
							
						//Get category list

						$tutor_type_id = $page_protect->get_tutor_type();

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
						<div class="panel-group materials-tab" id="accordion-<?php echo $a; ?>" role="tablist" aria-multiselectable="true">

						<?php
							foreach($list[$a] as $c => $d) {
								
								$countsub = $page_protect->get_materials($a, $c, NULL);
								$countsub = mysql_num_rows($countsub);
								
								echo '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading-'.$c.'">';
								echo '	<h5 class="panel-title">';
								echo '		<a data-toggle="collapse" data-parent="#accordion" href="#collapse-'.$c.'"   aria-expanded="false" aria-controls="collapse-'.$c.'">'.$subcat[$c].' ('.$countsub.')</a>';
								echo '	</h5>';
								echo '</div>';
								echo '<div id="collapse-'.$c.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-'.$c.'" ><div class="panel-body">';
								
								if(isset($subcat[$c])) {
									$res4 = $page_protect->get_materials($a, $c, NULL);
									echo "<ul>";
									while($row4 = mysql_fetch_array($res4,MYSQL_ASSOC)){

										if($row4['category_id'] != 23)
										{
											if($tutor_type_id == 1){
												$lesson = "<a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a></li>";
											} else {
												if($row4['category_type'] == $tutor_type_id || $row4['category_type'] == 0){
													$lesson = "<a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a></li>";
												} else {
													$lesson = "<span>".$row4['title']."</span></li>";
												}
											}
										} else {
											if($tutor_type_id == 1){
												$lesson = "<a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a></li>";
											} else {
												if($row4['subcategory_type'] == $tutor_type_id){
													$lesson = "<a href='".$row4['content']."' target='_BLANK'>".$row4['title']."</a></li>";
												} else {
													$lesson = "<span>".$row4['title']."</span></li>";
												}
											}
										}

										$vis = ($row4['visibility'] == "1") ? "<span class='label label-success' title='Visible to students' data-placement='right' data-toggle='tooltip'>Visible</span>" : "<span class='label label-danger' title='Hidden to students' data-placement='right' data-toggle='tooltip'>Hidden</a></span>";
										
										echo "<li>".$vis." ".$lesson;
									}
									echo "</ul>";
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
			</div>
			</div>
			</div>

<?php
include('footer-tutor.php');
?>   