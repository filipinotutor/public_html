	$(document).ready(function(){

//Display Loading Image
	function Display_LoadImg()
	{
	    $("#calloader").fadeIn(400,0);
		$("#calloader").html("<img src='../img/bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_LoadImg()
	{
		$("#calloader").fadeOut('slow');
	};
	
   //Default Starting Page Results
   
	//$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_LoadImg();
	
	$("#calcontent").fadeIn(500,0);
	$("#calcontent").load("calendar.php", Hide_LoadImg());
	
	//Pagination Click
	$("#test li").click(function(){
			
		Display_LoadImg();
		
		//CSS Styles
		
		$("#test li")
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});
		
		

		//Loading Data
		var pageNum = this.id;
		
		$("#calcontent").fadeIn(500,0);
		$("#calcontent").load("calendar.php?day=27&month=5&year=2013", Hide_LoadImg());
	});
});
	
	
	