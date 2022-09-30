function selectchange(){
	jQuery(document).ready(function () {
		jQuery('select.product_id').on('change', function(){
			var id = jQuery(this).val();

            jQuery.post(
                ajaxurl, 
                {
                    'action': 'load_attribute',
                    'data':   id,
                    'dataType': "html"
                },
                function(response){
                    jQuery('.attribute_id').empty().append(response);
                }
            );

			

		});
	});
}



