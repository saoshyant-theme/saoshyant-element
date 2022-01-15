jQuery(function($) {
	 	jQuery(document).ready(function($) {

		//Masked Inputs (images as radio buttons)
// single Position	
	"use strict";
		$('#inspector-select-control-0').change(function(){
			alert('33');

		});
   $('.editor-page-attributes__template select').change(function(){
			alert('33');
  });
  
  	$('.meta_ssel_single_template input:checked').parent().addClass("selected");
  	$('.meta_ssel_single_template').on("click","img",function(){
			$('.meta_ssel_single_template').find('li').removeClass('selected');
			$(this).parents('li').addClass('selected');
 			$(this).parent().prev().attr('checked','checked');
  	});
	
	 
 
 
   	$('.meta_ssel_body_background_pattern input:checked').parent().addClass("selected");
  	$('.meta_ssel_body_background_pattern').on("click","a",function(){
			$('.meta_ssel_body_background_pattern').find('li').removeClass('selected');
			$(this).parents('li').addClass('selected');
 			$(this).prev().attr('checked','checked');
  	});
	
	 
  
	$(".cs-wp-color-picker").cs_wpColorPicker();

 
 	$("#ssel_page_options_box input:checkbox").each(function(event) {
			var id = $(this).attr('id');
    		 if ($(this).is(":checked")){
 			 $(document).find('tr[rd-parant="'+id+'"]').show();
		 }else{
 			 $(document).find('tr[rd-parant="'+id+'"]').hide();
 			}
  	 });
  
 
  	$("#ssel_page_options_box input:checkbox").click(function(event) {
   	 if ($(this).is(":checked")){
      	 var id = $(this).attr('id');
		 $(document).find('tr[rd-parant="'+id+'"]').show();
	 }else{
      	 var id = $(this).attr('id');
		 $(document).find('tr[rd-parant="'+id+'"]').hide();
		 
			 }
  	 });
	 
	if( $('#ssel_breakingnews option[value="enable"]').is( ":selected" )) {
		 $(document).find('tr[rd-parant="ssel_breakingnews"]').show();

	} else {
		$(document).find('tr[rd-parant="ssel_breakingnews"]').hide();
	}
	jQuery('#ssel_breakingnews').on("click" , 'option[value="enable"]' ,function(){
		 $(document).find('tr[rd-parant="ssel_breakingnews"]').show();
 	});		
	jQuery('#ssel_breakingnews').on("click" , 'option[value=""],option[value="disable"]' ,function(){
		 $(document).find('tr[rd-parant="ssel_breakingnews"]').hide();
 	});		
	 
 
	$('.meta_ssel_body_background_pattern li').each(function(index, element) {
		var src = $(this).find('img').attr('src'); 
		$(this).find('a').css("background" , " transparent url("+src+") repeat scroll 0% 0%");
    });	
 	 
		 
		jQuery('.meta_ssel_body_background_image').hide();
	jQuery('.meta_ssel_body_background_pattern').hide();	 
		// Body Background Type
  	if( $('#body_background_type').val() == 'pattern') {
		jQuery('.meta_ssel_body_background_pattern').show();
		jQuery('.meta_ssel_body_background_image').hide();
		
	} else if($('#body_background_type').val() == 'custom'){
		jQuery('.meta_ssel_body_background_image').show();
		jQuery('.meta_ssel_body_background_pattern').hide();	
		
	} else{
		jQuery('.meta_ssel_body_background_pattern').hide();
		jQuery('.meta_ssel_body_background_image').hide();
	}
 
	jQuery('.meta_ssel_body_background_type').on("click" , '#body_background_type_default,#body_background_type_none' ,function(){
		jQuery('.meta_ssel_body_background_image').hide();
		jQuery('.meta_ssel_body_background_pattern').hide();
	});
	jQuery('.meta_ssel_body_background_type').on("click" ,'#body_background_type_pattern'   ,function(){
		jQuery('.meta_ssel_body_background_pattern').show();
		jQuery('.meta_ssel_body_background_image').hide();
	});
	jQuery('.meta_ssel_body_background_type').on("click" , '#body_background_type_custom' ,function(){
		jQuery('.meta_ssel_body_background_image').show();
		jQuery('.meta_ssel_body_background_pattern').hide();
	});	  
				  
	
	$(document).on('click', '.ssel_game_remove_image', function(e) {
		$(this).parent().find('input').attr('value','');
		
		$(this).parent().find('img').remove()
		$(this).remove();
  	}); 				 
				 
	// the upload image button, saves the id and outputs a preview of the image
	$('.rd_add_image').click(function(event) {
			var imageFrame;

		var that = $(this);
		event.preventDefault();
		
		var options, attachment;
		 var meta_ssel_body_background_image = that.parents('.meta_ssel_body_background_image');
		 var ssel_text_remove = that.attr('data-remove');
		var $self = $(event.target);
		var $div = $self.closest(meta_ssel_body_background_image);
		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
 
			
			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			multiple: false
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			var selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
 				
				var data = '<a class="rd_remove_image button button-small">'+ssel_text_remove+'</a><img  src="'+src+'"/>';
				$div.find('.rd_remove_image').remove();
				$div.find('img').remove();
 				$div.find('input').attr('value',src);	
 				$div.find('td').append(data);
  			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	$(document).on('click', '.rd_remove_image', function(e) {
		$(this).parent().find('input').attr('value','');
		
		$(this).parent().find('img').remove()
		$(this).remove();
  	}); 
	 
 		});				
	$('.chosen').chosen({ allow_single_deselect: true });
		
	  $(document).ajaxStop(function () {
		$('.chosen').chosen({ allow_single_deselect: true });
  });
  
	function  gallery_jspn(){
		var data_array = new Array();
		$("#ssel-gallery-metabox-list li").each(function(){
		
			data_array.push($(this).attr('data-id'));
	
		});
		var serialized = JSON.stringify(data_array);
 		 $("#ssel_gallery_id_json").text(serialized);
	}

  
  
	// the upload image button, saves the id and outputs a preview of the image
	$('.ssel_game_add_image').click(function(event) {
		var imageFrame;
 		var that = $(this);
 		var remove = $(this).attr('data-remove-text');
		event.preventDefault();
		var this_class= $('.meta_ssel_game_body_background_image');
		var options, attachment;
		 var meta_ssel_game_body_background_image = that.parents('.meta_ssel_game_body_background_image');
		var $self = $(event.target);
		var $div = $self.closest(meta_ssel_game_body_background_image);
		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		imageFrame = wp.media({
  			title: $(this).data('uploader-title'),
			button: {
				text: $(this).data('uploader-button-text'),
			},
			multiple: false
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			var selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
				var id = attachment.attributes.id;
				var data = '<a class="ssel_game_remove_image button button-small">'+remove+'</a><img  src="'+src+'"/>';
				this_class.find('.ssel_game_remove_image').remove();
				this_class.find('img').remove();
 				this_class.find('input').attr('value',id);	
 				this_class.find('td').append(data);
  			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	$(document).on('click', '.ssel_game_remove_image', function(e) {
		$(this).parent().find('input').attr('value','');
		
		$(this).parent().find('img').remove()
		$(this).remove();
gallery_jspn();
		
  	}); 
	
 // 

  var file_frame;

  $(document).on('click', 'a.ssel-gallery-add', function(e) {

    e.preventDefault();
	var  data_change = $(this).attr('data-change');
 	var  data_remove = $(this).attr('data-remove');
    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: true
    });

    file_frame.on('select', function() {
      var listIndex = $('#ssel-gallery-metabox-list li').index($('#gao-allery-metabox-list li:last')),
          selection = file_frame.state().get('selection');

      selection.map(function(attachment, i) {
        attachment = attachment.toJSON(),
        index      = listIndex + (i + 1);
		console.log(attachment);
		var thumbnail_size='';
		if(attachment.sizes.thumbnail ===true ){
			thumbnail_size  = attachment.sizes.thumbnail.url ;
		}else{
			
			thumbnail_size  = attachment.sizes.full.url;
			
		}
		 

        $('#ssel-gallery-metabox-list').append('<li data-id="' + attachment.id + '"  data-key="' + index + '"><img class="image-preview" src="' + thumbnail_size + '"><a class="change-image button button-small" href="#" data-uploader-title="'+data_change+'" data-uploader-button-text="'+data_change+'">'+data_change+'</a><br><small><a class="remove-image" href="#">'+data_remove+'</a></small></li>');
      });
	  	gallery_jspn();

    });

    makeSortable();
     file_frame.open();
 
  });

  $(document).on('click', '#ssel-gallery-metabox-list a.change-image', function(e) {

    e.preventDefault();

    var that = $(this);

    if (file_frame) file_frame.close();

    file_frame = wp.media.frames.file_frame = wp.media({
      title: $(this).data('uploader-title'),
      button: {
        text: $(this).data('uploader-button-text'),
      },
      multiple: false
    });

    file_frame.on( 'select', function() {
      var attachment = file_frame.state().get('selection').first().toJSON();
 
      that.parent().attr('data-id', attachment.id);
      that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
	  gallery_jspn();

    });

    file_frame.open();
   });

  function resetIndex() {
    $('#ssel-gallery-metabox-list li').each(function(i) {
      $(this).attr('data-key',  i );
    });
gallery_jspn();
	
  }

  function makeSortable() {
    $('#ssel-gallery-metabox-list').sortable({
      opacity: 0.6,
      stop: function() {
        resetIndex();
		gallery_jspn();
      }
    });
  }

  $(document).on('click', '#ssel-gallery-metabox-list a.remove-image', function(e) {
    e.preventDefault();

    $(this).parents('li').animate({ opacity: 0 }, 200, function() {
      $(this).remove();
      resetIndex();
		gallery_jspn();
	  
    });
  });

  makeSortable();


gallery_jspn();
$(window).on('load',function(e) {
gallery_jspn();
});
 

});
 