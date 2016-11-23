!function($) {
$(document).ready(function(){
  if ( $('.bt_mega_settings_container').length ) {
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;

	$('.custom_media_button.button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				$("#"+id).val(attachment.url);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}

		wp.media.editor.open(button);
		return false;
	});

	$('.add_media').on('click', function(){
		_custom_media = false;
	});
  }
  $(".bt-menu-icon-check").click(function(e) {
    
    var checkboxcontrol = $(this).attr("data-icon-check");
    $("."+checkboxcontrol).toggle("fast");
  });

  if ( $('.colorpicker').length ) {
  $('.colorpicker').wpColorPicker();
  }
  
	$(".bt-search").keyup(function(e){
		e.preventDefault();
		var filter = $(this).val(), count = 0;
		$(".bt-icon-list li").each(function(){
		if ($(this).text().search(new RegExp(filter, "i")) < 0) {
			$(this).fadeOut();
			} else {
			$(this).show();
				count++;
					}
		});
	});

		
	$(".bt-icon-dropdown ul.bt-icon-list li").click(function(e) {
		e.preventDefault();
		var sclass = $(this).attr("class");
		$(this).addClass("selected").siblings().removeClass("selected");
		var icon = $(this).attr("data-icon");
    $(".bt-icon-preview."+sclass).html("<i class=\'icon fa "+icon+"\'></i>");
		$(".bt_use_icons."+sclass).val(icon);
	});
  
  $(".mega_menu_select .mega-menu-check").click(function() {
    $(this).parent().next(".mega-menu-all-container").toggle();
  });
});
}(window.jQuery);