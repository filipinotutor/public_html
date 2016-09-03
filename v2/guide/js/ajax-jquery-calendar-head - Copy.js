	$(document).ready(function(){

//Display Loading Image
	function Display_LoadImg()
	{
	    $("#cheadloader").fadeIn(400,0);
		$("#cheadloader").html("<img src='../img/bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_LoadImg()
	{
		$("#cheadloader").fadeOut('slow');
	};
	
   //Default Starting Page Results
   
	//$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_LoadImg();
	
	$("#weekcontent").fadeIn(500,0);
	$("#weekcontent").load("calendar.php?postvars=21-5-2013", Hide_LoadImg());
	
	//Pagination Click
	$("#calendarhead li").click(function(){
			
		Display_LoadImg();
		
		//Loading Data
		var postVars = this.id;
		
		$("#weekcontent").fadeIn(500,0);
		$("#weekcontent").load("calendar.php?postvars=1" + postVars, Hide_LoadImg());
	});
});
	
	
	