// Tabs
jQuery(document).ready(function($){

	$('.tab-me-tabs li').click(function(){
		switch_tabs($(this));
	});
	
	//switch_tabs($('.active'));
	
	function switch_tabs(obj) {
	
		$('.tab-me-tab-content').hide();
		$('.tab-me-tabs li').removeClass("active");
		
		var id = obj.find("a", 0).attr("rel");
		
		$('#'+id).show();
		
		obj.addClass("active");
	}
});
