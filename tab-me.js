/**
 * Tab Me
 *
 * Core and very simple jQuery for Tab Me Tabs
 *
 * @since 0.5
 */
jQuery(document).ready(function($){

	$('.tab-me-tabs li').click(function(){
		switch_tabs($(this));
	});
		
	function switch_tabs(obj) {

		obj.parent().parent().find('.tab-me-tab-content').hide();
		obj.parent().find('li').removeClass("active");

		var id = obj.find("a", 0).attr("rel");
		
		$('#'+id).show();
		
		obj.addClass("active");
	}
});
