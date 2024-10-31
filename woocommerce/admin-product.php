<?php

/*

*Admin page-text input

* Author: ByConsole

* Author URI: http://byconsole.com 

*/
add_filter( 'woocommerce_product_data_tabs', 'byconsolewooptt_custom_product_data_tab' , 99 , 1 );

function byconsolewooptt_custom_product_data_tab($product_data_tabs){


$product_data_tabs['bycwooptt-custom-tab'] = array(


'label' => __('WooPDT Schedule', 'byconsolewooptt' ),


'target' => 'bycwooptt_custom_product_data',


);


return $product_data_tabs;


}


add_action( 'woocommerce_product_data_panels', 'byconsolewooptt_custom_product_data_fields' );


function byconsolewooptt_custom_product_data_fields(){


global $woocommerce, $post;


?>

<div id="bycwooptt_custom_product_data" class="panel woocommerce_options_panel">

<div class="options_group">

<h3><?php esc_html_e('Product delivery date time for WooCommerce','product-delivery-date-time-for-woocommerce'); ?> :-</h3>

<?php

woocommerce_wp_checkbox( 

array( 

'id'                => 'byc_enable_for_functions_working', 

'label'         => __('Enable:', 'product-delivery-date-time-for-woocommerce'),

'description'   => __( 'Click to enable in plugin working', 'product-delivery-date-time-for-woocommerce')

)

);

?>


<h3><?php esc_html_e('Product Cutoff Time ','product-delivery-date-time-for-woocommerce'); ?>:-</h3><span><a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></span>


<script>  
jQuery(document).ready(function(){

jQuery("#_cut_of_time_for_pickup").prop("disabled", true);

jQuery("#_cut_of_time_for_delivery").prop("disabled", true);

jQuery("#_next_day_cut_of_time_for_pickup").prop("disabled", true);

jQuery("#_next_day_cut_of_time_for_delivery").prop("disabled", true);

jQuery("#byc_enable_for_datewise_delivery").prop("disabled", true);

jQuery("#_byc_particular_product_pickup").prop("disabled", true);

jQuery("#_byc_particular_product_delivery").prop("disabled", true);

jQuery("#byc_enable_for_day_wise_delivery").prop("disabled", true);

jQuery("#_sunday_pickup").prop("disabled", true);

jQuery("#_sunday_delivery").prop("disabled", true);

jQuery("#_monday_pickup").prop("disabled", true);

jQuery("#_monday_delivery").prop("disabled", true);

jQuery("#_tuesday_pickup").prop("disabled", true);

jQuery("#_tuesday_delivery").prop("disabled", true);

jQuery("#_wednesday_pickup").prop("disabled", true);

jQuery("#_wednesday_delivery").prop("disabled", true);

jQuery("#_thursday_pickup").prop("disabled", true);

jQuery("#_thursday_delivery").prop("disabled", true);

jQuery("#_friday_pickup").prop("disabled", true);

jQuery("#_friday_delivery").prop("disabled", true);

jQuery("#_saturday_pickup").prop("disabled", true);

jQuery("#_saturday_delivery").prop("disabled", true);

});

</script>

<?php

woocommerce_wp_text_input( 

array( 

'id'                => '_cut_of_time_for_pickup', 

'label'             => __( 'Same day delivery cut off time(Pickup): ', 'product-delivery-date-time-for-woocommerce' ), 

'type'              => 'time', 

)

);


woocommerce_wp_text_input( 

array( 

'id'                => '_cut_of_time_for_delivery', 

'label'             => __( 'Same day delivery cut off time(Delivery): ', 'product-delivery-date-time-for-woocommerce' ), 

'type'              => 'time', 

)

);


woocommerce_wp_text_input( 

array( 

'id'                => '_next_day_cut_of_time_for_pickup', 

'label'             => __( 'Next day delivery cut off time(Pickup): ', 'product-delivery-date-time-for-woocommerce' ), 

'type'              => 'time', 

)

);


woocommerce_wp_text_input( 

array( 

'id'                => '_next_day_cut_of_time_for_delivery', 

'label'             => __( 'Next day delivery cut off time(Delivery): ', 'product-delivery-date-time-for-woocommerce' ), 

'type'              => 'time', 

)

);


?>


<h3><?php esc_html_e('Date wise Pickup and Delivery ','product-delivery-date-time-for-woocommerce'); ?>:-</h3><span><a style="color:#ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></span>


<?php


woocommerce_wp_checkbox( 


array( 


'id'                => 'byc_enable_for_datewise_delivery', 


'label'         => __('Enable:', 'product-delivery-date-time-for-woocommerce'),


'description'   => __( 'Click to enable in particular date', 'product-delivery-date-time-for-woocommerce')


)


);


woocommerce_wp_text_input( 

array( 

'id'                => 'byc_particular_product_date', 

'label'             => __('Particular Date : ', 'product-delivery-date-time-for-woocommerce' ), 

'placeholder'       => __('Select date hear...','product-delivery-date-time-for-woocommerce'), 

'type'              => 'text', 


)


);


?>


<div class="sunday_pickup" style="width:100%; float:left;">


<?php

woocommerce_wp_checkbox( 

array( 

'id'            => '_byc_particular_product_pickup', 

'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce') 

)

);


?>


</div>


<div class="sunday_delivery" style="width:100%; float:left;">


<?php

woocommerce_wp_checkbox( 

array( 

'id'            => '_byc_particular_product_delivery', 

'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce') 

)

);


?>


</div>


<div class="woopdt_checkbox">

<h3><?php esc_html_e('Day wise Pickup and Delivery','product-delivery-date-time-for-woocommerce'); ?>:-</h3><span><a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></span>

<?php


woocommerce_wp_checkbox( 

array( 

'id'                => 'byc_enable_for_day_wise_delivery', 

'label'         => __('Enable:', 'product-delivery-date-time-for-woocommerce'),

'description'   => __( 'Click to enable in Day wise pickup and delivery', 'product-delivery-date-time-for-woocommerce')

)

);

?>


<div class="sunday_pickup" style="width:40%;float:left;">

<?php

woocommerce_wp_checkbox( 

array( 

'id'            => '_sunday_pickup', 

'label'         => __('Sunday', 'product-delivery-date-time-for-woocommerce' ), 

'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 

)

);

?>


</div>


<div class="sunday_delivery" style="width:40%; float:left;">


<?php

woocommerce_wp_checkbox( 

array( 

'id'            => '_sunday_delivery', 

'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce') 

)

);

?>


</div>


</div>


<div style="clear:both;"></div>


<div class="monday_pickup" style="width:40%;float:left;">


<?php


woocommerce_wp_checkbox( 


array( 


'id'            => '_monday_pickup', 


'label'         => __('Monday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>


</div>


<div class="monday_delivery" style="width:40%;float:left;">


<?php


woocommerce_wp_checkbox( 


array( 


'id'            => '_monday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>


</div>


<div class="tuesday_pickup" style="width:40%;float:left;">


<?php		


woocommerce_wp_checkbox( 


array( 


'id'            => '_tuesday_pickup', 


'label'         => __('Tuesday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>


</div>


<div class="tuesday_delivery" style="width:40%;float:left;">


<?php


woocommerce_wp_checkbox( 


array(


'id'            => '_tuesday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>


</div>


<div class="wednesday_pickup" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_wednesday_pickup', 


'label'         => __('Wednesday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<div class="wednesday_delivery" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_wednesday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' )


)


);


?>	


</div>


<div class="thursday_pickup" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_thursday_pickup', 


'label'         => __('Thursday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<div class="thursday_delivery" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_thursday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<div class="friday_pickup" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_friday_pickup', 


'label'         => __('Friday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<div class="friday_delivery" style="width:40%;float:left;">


<?php


woocommerce_wp_checkbox( 


array( 


'id'            => '_friday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<div class="saturday_pickup" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_saturday_pickup', 


'label'         => __('Saturday', 'product-delivery-date-time-for-woocommerce' ), 


'description'   => __( 'Pickup', 'product-delivery-date-time-for-woocommerce' ),


)


);


?>	


</div>


<div class="saturday_delivery" style="width:40%;float:left;">


<?php	


woocommerce_wp_checkbox( 


array( 


'id'            => '_saturday_delivery', 


'description'   => __( 'Delivery', 'product-delivery-date-time-for-woocommerce' ) 


)


);


?>	


</div>


<?php
}


function byconsolewoptt_wc_save_custom_general_fields($post){

if(!empty(sanitize_text_field($_POST['byc_enable_for_functions_working']))){

update_post_meta($post, 'byc_enable_for_functions_working',sanitize_text_field($_POST['byc_enable_for_functions_working']));

}else{

delete_post_meta($post, 'byc_enable_for_functions_working');

}		
}

add_action( 'woocommerce_process_product_meta', 'byconsolewoptt_wc_save_custom_general_fields' );

?>