<?php
include('header-admin.php');
?>
	
	    <div class="col-md-9">
           <div class="tabbable tabs-left">
			<div class="tab-content"> 
             <?php
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



			//Save
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
												        move_uploaded_file($_FILES["file"]["tmp_name"],
												        "../materials/" . $_FILES["file"]["name"]);

												        //get subcategory and category

												        $getting = $_POST['subcategory'];
												        $catch = '';
												        $i = 0;
												        do
												        {
												        $catch .= $getting[$i];
												        $i++;
												        $res1 = mysql_query("SELECT * FROM subcategory");
												        $count1 = mysql_num_rows($res1);
												        while ($rows = mysql_fetch_array($res1,$count1)) {
												        	$pair = $rows['subcategory_id'];
												        	if ($catch == $pair){
												        		goto b;
												        	}
														}
														}
														while(isset($getting[$i]));

														b:
														$subid = $catch;
														
												        $res2 = mysql_query('SELECT * FROM subcategory WHERE subcategory_id= "'. $subid .'"');
												        $count2 = mysql_num_rows($res2);
												        while ($rows = mysql_fetch_array($res2,$count2)) {
												        	$catid = $rows['category_id'];
												        }
												       //update
													$sql = 'INSERT INTO materials (`material_id`, `title`, `content`, `order` , `category_id` , `subcategory_id`) VALUES (NULL, "'.$_POST['title'].'", "../materials/'.$_FILES["file"]["name"].'", "'.$_POST['order'].'" , "'.$catid.'" , "'.$subid.'")'; //added fulldate
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
								else{
								echo '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>"Material Order" must be a number.</div>';
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
											        move_uploaded_file($_FILES["file"]["tmp_name"],
											        "../materials/" . $_FILES["file"]["name"]);
											      
											       //update\
													$sql = 'UPDATE materials SET title="'.$_POST['title'].'", order="'.$_POST['order'].'", content="../materials/'.$_FILES["file"]["name"].'" WHERE material_id='.$_POST['material_id'];
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
							echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>Opps! Something went wrong. Please retrykjljkljklj.</div>';
							}
						}
						elseif(
							isset($_POST['title']) &&
							isset($_POST['content']) &&
							isset($_POST['order'])
							){
							$sql = 'UPDATE materials 
									SET `title`="'.$_POST['title'].'" , 
									`order` ='.$_POST['order'].' , 
									`content` ="'.$_POST['content'].'" 
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
			
			<?php
			 	if(isset($_POST['save1']))
			 	{
			 			$cat = $_POST['categoryname'];
			 			$sql = 'INSERT INTO category (`category_id` , `category_name`) VALUES (NULL, "'.$cat.'")';
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


			 	if(isset($_POST['save2']))
			 	{

			 		//get category
				    $getting = $_POST['catname'];
			        $catch = '';
			        $i = 0;
			        do 
			       	{
			        $catch .= $getting[$i];
			        $i++;
			        $res1 = mysql_query("SELECT category_id FROM category");	
			        $count1 = mysql_num_rows($res1);
			        	while ($rows = mysql_fetch_array($res1,$count1)) {
		     		   		$pair = $rows['category_id'];
			        		if ($catch == $pair)
			        		{
		        				goto e;
			        		}
						}
					}
					while($getting != $catch);
					e:	
					$catid = $catch;
					$subcat = $_POST['subcategoryname'];
					$sql = 'INSERT INTO subcategory (`subcategory_id` , `category_id` , `subcategory_name`) VALUES (NULL, "'. $catid .'" , "'. $subcat .'")';
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
							 <input type="text" class="form-control" name="title" placeholder="Title"/required>
							 <input type="text" class="form-control" name="order" placeholder="Material Order"/required>
							 <select name="subcategory" class="form-control">
		                		<?php
		                		//get subcategory
		                			$res = mysql_query("SELECT * FROM subcategory");
		                			$count = mysql_num_rows($res);
		                			while ($rows = mysql_fetch_array($res,$count)) {
		                				echo '<option value="'. $rows['subcategory_id'] .'">' . $rows['subcategory_name'] . '</option>';
		                			}
		                		?>
		                	</select>
						<div class="input-group">
	              			<span class="btn btn-warning btn-file input-group-addon"> Browser : 
	                           	<i class="glyphicon glyphicon-circle-arrow-up"></i>
	                           	<input name="file" type="file" id="fil" onchange="document.getElementById('upfile').value = document.getElementById('fil').value;"/>
	                     	</span>
	                     	<input id="upfile" type="text" class="form-control" readonly/>
	                     	<br />
	          			</div>
	          			<br />
						<input type="hidden" name="material_id" value=""/>
							 <input type="hidden" name="t" value="4A"/>
						<button type="submit" name="save" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
                 
				
				</div>
				<div id="4B" class="tab-pane fade in <?php echo $tab=='4B' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-4">
						<h4>View/Edit Materials</h4> 
		                </div>
		                <div class="col-md-4 col-md-offset-4">
		                	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4B" method="POST">
		                	<div class="input-group">
		                	<span class="input-group-addon">
		                		Arrange By:
		                	</span>
		                	<select name="filter" class="form-control">
		                		<option value="1"></option>
								<option value="title">Material Title</option>
								<option value="`materials`.`order`">Material Order</option>
		                		<option value="material_id">Material ID</option>
		                		<option value="category_id">Category</option>
		                	</select>
		                	<span class="input-group-btn">
		                	<button name="submit_filter" class="btn-primary btn">
		                	Go!
		                	</button>
		                	</span>
		                	</div>
		                	</form>
		                </div>
		            </div>
		          <div class="row">
					<div class="col-md-12">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4B" method="POST">
						<p class="text-right">
							<button name="submit_visible" class="btn-info btn"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show </button>
							<button name="submit_hide" class="btn-info btn"> <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Hide </button>
						</p>
						<table class="table table-striped table-bordered table-hover">
						<tr>
						<th style="width:40px;">&nbsp;</th>
						<th class="hidden-xs" stlye="width:10px;">Order</th>
						<th style="width:10px;">Status</th>
						<th>ID</th>
						<th>Category</th>
						<th>Title</th>
						<th>Content</th>
						</tr>
						<?php
								if(isset($_POST['filter']) != "" && isset($_POST['submit_filter'])){
								$filter = " ORDER BY ".$_POST['filter']." ASC";
								$res = $page_protect->get_materials($filter);
								}
								else{
								$res = $page_protect->get_materials(NULL);
								}
								while($row = mysql_fetch_array($res,MYSQL_NUM))
								{
								echo '<tr>';
								echo '<td class="text-center"><input type="checkbox"  name="visibilty[]" value="'.$row[0].'"/></td> </form>';
								echo '<td class="hidden-xs"><span class="label label-info">'.$row[3].'</span></td>';
								echo '<td>';
									echo ($row[7] == "1") ? "<span class='label label-success'  title='Visible to students' data-placement='right' data-toggle='tooltip'>Visible</span>" : "<span class='label label-danger' title='Hidden to students' data-placement='right' data-toggle='tooltip'>Hidden</a>" ;
								echo '</td>';
								echo '<td><span class="label label-success">'.$row[0].'</span></td>';
								$cat = $row[4];
								$res5 = mysql_query("SELECT * FROM category WHERE category_id = '".$cat."' ");
								$count5 = mysql_num_rows($res5);
								while ($rows = mysql_fetch_array($res5,$count5)) {
									echo '<td class="text-left">' . $rows['category_name'] . '</th>';
								}
								echo '<td><a href="materials.php?t=4B&material_id='.$row[0].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$row[1].'</a></td>';
								echo '<td><a href="../includes/materials_content.php?mid='.$row[0].'&t=4B" target="blank" class="btn btn-primary btn-xs"><i class="glyphicon-chevron-right glyphicon"></i><i class="glyphicon-chevron-right glyphicon"></i></a>
								</td>';
								echo '</tr>';
								}
							?>
						</table>
		            <?php
		            if(isset($_GET['material_id']))
						{
								$material_id = filter_var($_GET['material_id'], FILTER_SANITIZE_STRING);  
								echo $page_protect->update_material($material_id);
						}
					?>
		            <!-- / View Material ========================================================================-->
							
	  				</div>
	  				</div>
				</div>
					

				<div id="4C" class="tab-pane fade in <?php echo $tab=='4C' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
						<h4>New Category</h4> 
						</div>
					</div>
                <form action="materials.php" method="post">
					<div class="row">
						<div class="form-gorup col-xs-12 col-md-6">
							 <input type="text" class="form-control" name="categoryname" placeholder="Name"/required><br />
						<?php //<input type="hidden" name="category_id" value=""/>?>
							 <input type="hidden" name="t" value="4C"/>
						<button type="submit" name="save1" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
				</div>

				<div id="4D" class="tab-pane fade in <?php echo $tab=='4D' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-4">
						<h4>View/Edit Category</h4> 
		                </div>
		                <div class="col-md-4 col-md-offset-4">
		                	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4D" method="POST">
		                	<div class="input-group">
		                	<span class="input-group-addon">
		                		Arrange By:
		                	</span>
		                	<select name="filter" class="form-control">
		                		<option value="1"></option>
								<option value="category_name">Category Name</option>
		                		<option value="category_id">Category ID</option>
		                	</select>
		                	<span class="input-group-btn">
		                	<button name="submit_filter" class="btn-primary btn">
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
						<th>ID</th>
						<th>Category</th>
						</tr>
							<?php
								echo '<tr>';
								if(isset($_POST['filter']) != "" && isset($_POST['submit_filter']))
								{
									$res4 = mysql_query("SELECT * FROM category ORDER BY ". $_POST['filter'] ." ASC");
								}
								else
								{
									$res4 = mysql_query("SELECT * FROM category");	
								}
								$count4 = mysql_num_rows($res4);
								while ($rows = mysql_fetch_array($res4,$count4)) {
									echo '<td><span class="label label-success">'.$rows['category_id'].'</span></td>';
									echo '<td><a href="materials.php?t=4D&category_id='.$rows['category_id'].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$rows['category_name'].'</a></td>';
									echo '</tr>';
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
					</div>
					</div>
				</div>
					

				<div id="4E" class="tab-pane fade in <?php echo $tab=='4E' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-12">
						<h4>New Sub-category</h4> 
						</div>
					</div>
                <form action="materials.php" method="post">
					<div class="row">
						<div class="form-gorup col-xs-12 col-md-6">
							<input type="text" class="form-control" name="subcategoryname" placeholder="Name"/required>
							<select name="catname" class="form-control">
							<?php
								$res3 = mysql_query("SELECT * FROM category");
								$count3 = mysql_num_rows($res3);
								while ($rows = mysql_fetch_array($res3,$count3)){
									echo '<option value="'. $rows['category_id'] .'">' . $rows['category_name'] . '</option>';
								}
							?>
							</select><br />
							 <input type="hidden" name="t" value="4E"/>
						<button type="submit" name="save2" class="btn btn-primary" value="submit" type="button"><i class="glyphicon-ok glyphicon"></i> Submit</button>
						</div>
					</div>
					</form>
				</div>

				<div id="4F" class="tab-pane fade in <?php echo $tab=='4F' ? 'active' : '';?> col-xs-12 col-md-12">
					<div class="row">
						<div class="col-md-4">
						<h4>View/Edit Sub Category</h4> 
		                </div>
		                <div class="col-md-4 col-md-offset-4">
		                	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?t=4F" method="POST">
		                	<div class="input-group">
		                	<span class="input-group-addon">
		                		Arrange By:
		                	</span>
		                	<select name="filter" class="form-control">
		                		<option value="1"></option>
								<option value="subcategory_name">Sub-category Name</option>
		                		<option value="subcategory_id">Sub-category ID</option>
		                	</select>
		                	<span class="input-group-btn">
		                	<button name="submit_filter" class="btn-primary btn">
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
						<th>ID</th>
						<th>Sub-category</th>
						<th>Category</th>
						</tr>
							<?php
								echo '<tr>';
								if(isset($_POST['filter']) != "" && isset($_POST['submit_filter']))
								{
									$res4 = mysql_query("SELECT * FROM subcategory ORDER BY ". $_POST['filter'] ." ASC");
								}
								else
								{
									$res4 = mysql_query("SELECT * FROM subcategory");	
								}
								$count4 = mysql_num_rows($res4);
								while ($rows = mysql_fetch_array($res4,$count4)) {
									echo '<td><span class="label label-success">'.$rows['subcategory_id'].'</span></td>';
									echo '<td><a href="materials.php?t=4F&subcategory_id='.$rows['subcategory_id'].'" title="Edit" data-placement="right" data-toggle="tooltip">'.$rows['subcategory_name'].'</a></td>';
									$cat = $rows['category_id'];
									$res6 = mysql_query("SELECT * FROM category WHERE category_id = ". $cat ."");
									$count6 = mysql_num_rows($res6);
									while ($rows1 = mysql_fetch_array($res6,$count6)) {
										echo '<td class="text-left">' . $rows1['category_name'] . '</td>';
									}
									echo '</tr>';
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
					</div>
					</div>
				</div>


			</div>
		</div>
	</div>
						


<?php
include('footer-admin.php');
?>   