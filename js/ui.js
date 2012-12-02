 $(document).ready(function() 
 {
        $("#searchMenu").click( function()
        {
        	$("#presentation").hide();
            $("#search").show("slow");
            $('#maps').removeClass().addClass('span7');
            $("#demoMap").animate({height: '370px'},"slow");
            
            $("#searchMenu").addClass("active-m");
	        $("#homeMenu").removeClass("active-m");
        });
        
        $("#homeMenu").click(function()
        {
        	$("#search").hide("slow");
	        $("#presentation").show("slow");
	        $('#maps').removeClass().addClass('span6');
	        $("#demoMap").animate({height: '370px'},"slow");
	        
	        $("#homeMenu").addClass("active-m");
	        $("#searchMenu").removeClass("active-m");

        });
 });