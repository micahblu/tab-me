// Tabs
jQuery(document).ready(function($){
	$('.tab-me-tabs a').click(function(){
		switch_tabs($(this));
	});
	switch_tabs($('.active'));
	function switch_tabs(obj) {
		$('.tab-me-tab-content').hide();
		$('.tab-me-tabs a').removeClass("active");
		var id = obj.attr("rel");
		$('#'+id).show();
		obj.addClass("active");
	}
});
