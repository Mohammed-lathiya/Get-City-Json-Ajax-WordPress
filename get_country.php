<?php

function get_city_list(){
	if(!empty($_POST['country'])){
		$country = $_POST['country'];
		$json_data = file_get_contents(PC_URI.'js/countries.json');
		$country_data = json_decode($json_data, true);
		echo json_encode(
			array(
				'result'	=>	true, 
				'city'	=>	$country_data[$country]
			),
		);
	}
	die;
}

add_action('wp_ajax_get_city_list', 'get_city_list');
/* Md Code End */

?>

<script type="text/javascript">

$('select.country').on('change', function() {
	console.log(jQuery(this).val());
	jQuery.ajax({
		url: myAjax.ajaxurl,
		type:'post',
		dataType:"json",
      		data : {
			'action': 'get_city_list',
			'country': jQuery(this).val(),
		},
  		success: function( response ) {
  			console.log(response);
  		}
	});
});
/* Start Contest Settings */

</script>
