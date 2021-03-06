<?php
include("../includes/main_class.php"); 
$page_protect = new Main_Class;
$page_protect->get_user_info();
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if(isset($_POST))
{
	 //Some Settings
	$ThumbSquareSize 		= 150; //Thumbnail will be 200x200
	$BigImageMaxSize 		= 500; //Image Maximum height or width
	$ThumbPrefix			= "thumb_"; //Normal thumb Prefix
	$user 					= $_POST['user'];
	if($_POST['user'] == "tutor")
	{
	$DestinationDirectory	= '../pictures/tutors/'; //Upload Directory ends with / (slash)
	}
	else if($_POST['user'] == "student")
	{
	$DestinationDirectory	= '../pictures/students/'; //Upload Directory ends with / (slash)
	}
	else if($_POST['user'] == "supervisor")
	{
	$DestinationDirectory	= '../pictures/supervisors/'; //Upload Directory ends with / (slash)
	}
	$Quality 				= 90;

	// check $_FILES['ImageFile'] array is not empty
	// "is_uploaded_file" Tells whether the file was uploaded via HTTP POST
	if($user == "tutor")
	{
		if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
		{
				//die('Something went wrong with Upload!'); // output error when above checks fail.
				echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
		}
		
		// Random number for both file, will be added after image name
		$RandomNumber 	= rand(0, 9999999999); 

		// Elements (values) of $_FILES['ImageFile'] array
		//let's access these values by using their index position
		$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'])); 
		$ImageSize 		= $_FILES['ImageFile']['size']; // Obtain original image size
		$TempSrc	 	= $_FILES['ImageFile']['tmp_name']; // Tmp name of image file stored in PHP tmp folder
		$ImageType	 	= $_FILES['ImageFile']['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

		//Let's use $ImageType variable to check wheather uploaded file is supported.
		//We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
		//suitable if we want to compare the a variable with many different values
		switch(strtolower($ImageType))
		{
			case 'image/png':
				$CreatedImage =  imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
				break;
			case 'image/gif':
				$CreatedImage =  imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				$CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
				break;
			default:
			echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
				die('Unsupported File!'); //output error and exit
		}
		
		//PHP getimagesize() function returns height-width from image file stored in PHP tmp folder.
		//Let's get first two values from image, width and height. list assign values to $CurWidth,$CurHeight
		list($CurWidth,$CurHeight)=getimagesize($TempSrc);
		//Get file extension from Image name, this will be re-added after random name
		$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	  	$ImageExt = str_replace('.','',$ImageExt);
		
		//remove extension from filename
		$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
		
		//Construct a new image name (with random number added) for our new image.
		$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
		//set the Destination Image
		$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
		$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image
		
		//Resize image to our Specified Size by calling resizeImage function.
		if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
		{
			//Create a square Thumbnail right after, this time we are using cropImage() function
			if(!cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
				{
					echo 'Error Creating thumbnail';
				}
			/*
			At this point we have succesfully resized and created thumbnail image
			We can render image to user's browser or store information in the database
			For demo, we are going to output results on browser.
			*/
			
			//Get New Image Size
			list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
			
			
			//echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="../pictures/students/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
		echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-original-title="Edit Profile Picture" data-placement="right" ><img class="img-rounded" src="../pictures/tutors/'.$ThumbPrefix.$NewImageName.'" alt="Photo" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
		
			// other post variables
			//echo $_POST['pk'];
			$photodir='../pictures/tutors/'.$ThumbPrefix.$NewImageName;
			
			// insert into DB
			if($page_protect->has_profile_tutor($_POST['pk']))
			{
				//has profile --update
					$page_protect->update_tutor_profile_ajax($_POST['pk'], "photo", $photodir);
					
			}
			else
			{
				//no profile --insert
				$page_protect->insert_profile_tutor($_POST['pk'], "photo", $photodir);
			}
			
			/*
			// Insert info into database table!
			mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
			VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
			*/

		}
		else{
			die('Resize Error'); //output error
		}
	}
	else if($_POST['user'] == "student")
	{
	if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
	{
			//die('Something went wrong with Upload!'); // output error when above checks fail.
			echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
	}
	
	// Random number for both file, will be added after image name
	$RandomNumber 	= rand(0, 9999999999); 

	// Elements (values) of $_FILES['ImageFile'] array
	//let's access these values by using their index position
	$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'])); 
	$ImageSize 		= $_FILES['ImageFile']['size']; // Obtain original image size
	$TempSrc	 	= $_FILES['ImageFile']['tmp_name']; // Tmp name of image file stored in PHP tmp folder
	$ImageType	 	= $_FILES['ImageFile']['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

	//Let's use $ImageType variable to check wheather uploaded file is supported.
	//We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
	//suitable if we want to compare the a variable with many different values
	switch(strtolower($ImageType))
	{
		case 'image/png':
			$CreatedImage =  imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/pjpeg':
			$CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
			break;
		default:
		echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
			die('Unsupported File!'); //output error and exit
	}
	
	//PHP getimagesize() function returns height-width from image file stored in PHP tmp folder.
	//Let's get first two values from image, width and height. list assign values to $CurWidth,$CurHeight
	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	//Get file extension from Image name, this will be re-added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	
	//Construct a new image name (with random number added) for our new image.
	$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
	//set the Destination Image
	$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
	$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image
	
	//Resize image to our Specified Size by calling resizeImage function.
	if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
	{
		//Create a square Thumbnail right after, this time we are using cropImage() function
		if(!cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
			{
				echo 'Error Creating thumbnail';
			}
		/*
		At this point we have succesfully resized and created thumbnail image
		We can render image to user's browser or store information in the database
		For demo, we are going to output results on browser.
		*/
		
		//Get New Image Size
		list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
		
		
		//echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="../pictures/students/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
	echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-original-title="Edit Profile Picture" data-placement="right" ><img class="img-rounded" src="../pictures/students/'.$ThumbPrefix.$NewImageName.'" alt="Photo" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
	
		// other post variables
		//echo $_POST['pk'];
		$photodir='../pictures/students/'.$ThumbPrefix.$NewImageName;
		
		// insert into DB
		if($page_protect->has_profile_student($_POST['pk']))
		{
			//has profile --update
				$page_protect->update_student_profile_ajax($_POST['pk'], "photo", $photodir);
		}
		else
		{
			//no profile --insert
			echo $page_protect->insert_profile_student($_POST['pk'], "photo", $photodir);
		}
		
		/*
		// Insert info into database table!
		mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
		VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
		*/

		}
		else{
			die('Resize Error'); //output error
		}
	
	}
	else if($user == "supervisor")
	{
if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name']))
	{
			//die('Something went wrong with Upload!'); // output error when above checks fail.
			echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
	}
	
	// Random number for both file, will be added after image name
	$RandomNumber 	= rand(0, 9999999999); 

	// Elements (values) of $_FILES['ImageFile'] array
	//let's access these values by using their index position
	$ImageName 		= str_replace(' ','-',strtolower($_FILES['ImageFile']['name'])); 
	$ImageSize 		= $_FILES['ImageFile']['size']; // Obtain original image size
	$TempSrc	 	= $_FILES['ImageFile']['tmp_name']; // Tmp name of image file stored in PHP tmp folder
	$ImageType	 	= $_FILES['ImageFile']['type']; //Obtain file type, returns "image/png", image/jpeg, text/plain etc.

	//Let's use $ImageType variable to check wheather uploaded file is supported.
	//We use PHP SWITCH statement to check valid image format, PHP SWITCH is similar to IF/ELSE statements 
	//suitable if we want to compare the a variable with many different values
	switch(strtolower($ImageType))
	{
		case 'image/png':
			$CreatedImage =  imagecreatefrompng($_FILES['ImageFile']['tmp_name']);
			break;
		case 'image/gif':
			$CreatedImage =  imagecreatefromgif($_FILES['ImageFile']['tmp_name']);
			break;			
		case 'image/jpeg':
		case 'image/pjpeg':
			$CreatedImage = imagecreatefromjpeg($_FILES['ImageFile']['tmp_name']);
			break;
		default:
		echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="<?php echo $page_protect->studentprofile_photo; ?>" class="img-rounded" alt="Photo" height="'.$ThumbSquareSize.'" width="150" /></a>';
			die('Unsupported File!'); //output error and exit
	}
	
	//PHP getimagesize() function returns height-width from image file stored in PHP tmp folder.
	//Let's get first two values from image, width and height. list assign values to $CurWidth,$CurHeight
	list($CurWidth,$CurHeight)=getimagesize($TempSrc);
	//Get file extension from Image name, this will be re-added after random name
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
  	$ImageExt = str_replace('.','',$ImageExt);
	
	//remove extension from filename
	$ImageName 		= preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
	
	//Construct a new image name (with random number added) for our new image.
	$NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
	//set the Destination Image
	$thumb_DestRandImageName 	= $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumb name
	$DestRandImageName 			= $DestinationDirectory.$NewImageName; //Name for Big Image
	
	//Resize image to our Specified Size by calling resizeImage function.
	if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType))
	{
		//Create a square Thumbnail right after, this time we are using cropImage() function
		if(!cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType))
			{
				echo 'Error Creating thumbnail';
			}
		/*
		At this point we have succesfully resized and created thumbnail image
		We can render image to user's browser or store information in the database
		For demo, we are going to output results on browser.
		*/
		
		//Get New Image Size
		list($ResizedWidth,$ResizedHeight)=getimagesize($DestRandImageName);
		
		
		//echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-placement="right" ><img src="../pictures/students/'.$ThumbPrefix.$NewImageName.'" alt="Thumbnail" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
	echo '<a class="thumbnail" href="#modalImageupload" role="button" data-toggle="modal" title="Edit Profile Picture" data-original-title="Edit Profile Picture" data-placement="right" ><img class="img-rounded" src="../pictures/students/'.$ThumbPrefix.$NewImageName.'" alt="Photo" height="'.$ThumbSquareSize.'" width="'.$ThumbSquareSize.'" /></a>';
	
		// other post variables
		//echo $_POST['pk'];
		$photodir='../pictures/supervisors/'.$ThumbPrefix.$NewImageName;
		
		// insert into DB
		if($page_protect->has_profile_supervisor($_POST['pk']))
		{
			//has profile --update
				$page_protect->update_supervisors_profile_ajax($_POST['pk'], "photo", $photodir);
		}
		else
		{
			//no profile --insert
		}
		
		/*
		// Insert info into database table!
		mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
		VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
		*/

		}
		else{
			die('Resize Error'); //output error
		}
	
	}

}


// This function will proportionally resize image 
function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//Construct a proportional size of new image
	$ImageScale      	= min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
	$NewWidth  			= ceil($ImageScale*$CurWidth);
	$NewHeight 			= ceil($ImageScale*$CurHeight);
	
	if($CurWidth < $NewWidth || $CurHeight < $NewHeight)
	{
		$NewWidth = $CurWidth;
		$NewHeight = $CurHeight;
	}
	$NewCanves 	= imagecreatetruecolor($NewWidth, $NewHeight);
	// Resize Image
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees up memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}

}

//This function corps image to create exact square images, no matter what its original size!
function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType)
{	 
	//Check Image size is not 0
	if($CurWidth <= 0 || $CurHeight <= 0) 
	{
		return false;
	}
	
	//abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
	//http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
	if($CurWidth>$CurHeight)
	{
		$y_offset = 0;
		$x_offset = ($CurWidth - $CurHeight) / 2;
		$square_size 	= $CurWidth - ($x_offset * 2);
	}else{
		$x_offset = 0;
		$y_offset = ($CurHeight - $CurWidth) / 2;
		$square_size = $CurHeight - ($y_offset * 2);
	}
	
	$NewCanves 	= imagecreatetruecolor($iSize, $iSize);	
	if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size))
	{
		switch(strtolower($ImageType))
		{
			case 'image/png':
				imagepng($NewCanves,$DestFolder);
				break;
			case 'image/gif':
				imagegif($NewCanves,$DestFolder);
				break;			
			case 'image/jpeg':
			case 'image/pjpeg':
				imagejpeg($NewCanves,$DestFolder,$Quality);
				break;
			default:
				return false;
		}
	//Destroy image, frees up memory	
	if(is_resource($NewCanves)) {imagedestroy($NewCanves);} 
	return true;
	}
	  
}