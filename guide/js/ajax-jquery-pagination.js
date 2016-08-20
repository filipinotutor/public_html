// js for pagination     
	
	$(document).ready(function(){
	
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(400,0);
		$("#loading").html("<img src='../img/bigLoader.gif' />");
		
		
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};

	



   //Default Starting Page Results

   

	//$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});

	

	Display_Load();

	
	var tid = $('#content-tutors').attr('class');

	$("#content-tutors").fadeIn(500,0);

	$("#content-tutors").load("pagination_data.php?page=1&tutor_id=" + tid, Hide_Load());

	







	//Pagination Click

	$("#pagination li").click(function(){

			

		Display_Load();

		

		//CSS Styles

		

		$("#pagination li")

		.css({'color' : '#0063DC'});

		

		$(this)

		.css({'color' : '#FF0084'})

		.css({'border' : 'none'});

		

		



		//Loading Data

		var pageNum = this.id;

		var tid = $('#content-tutors').attr('class');		

		$("#content-tutors").fadeIn(500,0);

		console.log(window.location.href);
		$("#content-tutors").load("pagination_data.php?page=" + pageNum + "&tutor_id" + tid, Hide_Load());

		

		

	});

//   end js for pagination -->



});

	