<?php


if (! defined( 'ABSPATH' ) ) exit; 


/*


 * Plugin Name: Product delivery date time for WooCommerce


 * Plugin URI: https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/


 * Description: Product delivery date time for WooCommerce is a plugin that allow your customers to choose their desired delivery date and time for their WooPDDT service orders on product page.For settings help visit <a href="https://blog.byconsole.com/" target="_blank">HOW TO</a> guide. 


 * Version: 1.0.0


 * Author: ByConsole


 * Author URI: https://www.byconsole.com


 * Text Domain: product-delivery-date-time-for-woocommerce


 


 * Domain Path: /languages


 * License: GPL2 


*/


require_once('inc/'.sanitize_file_name('bycwoopdtt_admin_settings.php'));


require_once('inc/'.sanitize_file_name('bycwoopdtt_holiday_setting.php'));


require_once('inc/'.sanitize_file_name('bycwoopdtt_get_time_slot_list_by_date_using_ajax.php'));


require_once('inc/'.sanitize_file_name('bycwoopdtt_modification_request_details.php'));


require_once('inc/'.sanitize_file_name('bycwoopdtt_compare_table.php'));


require_once('woocommerce/'.sanitize_file_name('admin-product.php'));


function byconsolewooptt_load_text_domain(){


load_plugin_textdomain( 'product-delivery-date-time-for-woocommerce', false, dirname( plugin_basename(__FILE__) ) . '/languages/' );


}


add_action('plugins_loaded','byconsolewooptt_load_text_domain');


function byconsolewooptt_settings_link($links_array, $plugin_file_name){


	if( strpos( $plugin_file_name, basename(__FILE__) ) ) {


		array_unshift( $links_array, '<a href="admin.php?page=byconsolewooptt_general_settings">Settings</a>' );


	}


	return $links_array;


}


add_filter( 'plugin_action_links', 'byconsolewooptt_settings_link', 10, 2 );

function byconsolewooptt_dosc_and_support_links( $links_array, $plugin_file_name, $plugin_data, $status ){

	if(strpos( $plugin_file_name, basename(__FILE__) )){

		$links_array[] = '<a href="https://www.plugins.byconsole.com/product/product-time-table-for-woocommerce" target="_blank">Pro Version</a>';

		$links_array[] = '<a href="https://blog.byconsole.com/product-wise-timetable-setup/" target="_blank">DOC</a>';

		$links_array[] = '<a href="'.home_url().'/wp-admin/admin.php?page=byconsolewooptt_custom_modification_settings/" target="_blank">Support</a>';

	}

	return $links_array;

}

add_filter( 'plugin_row_meta', 'byconsolewooptt_dosc_and_support_links', 10, 4 );

/*****************product details page*************************/

function bycwooptt_action_woocommerce_add_to_cart(){ 

$byc_enable_for_functions_working=get_post_meta(get_the_ID(), 'byc_enable_for_functions_working', true );

if($byc_enable_for_functions_working=='yes'){

$bycwooptt_delivery_holiday_sunday=get_option('byconsolewooptt_delivery_holiday_sunday_check');

$bycwooptt_delivery_holiday_saturday=get_option('byconsolewooptt_delivery_holiday_saturday_check');

$bycwooptt_delivery_holiday_js_array_data=array();

if($bycwooptt_delivery_holiday_sunday=='Sun'){

    $bycwooptt_delivery_holiday_js_array_data['sun']= 'Sun';

	}else{

	$bycwooptt_delivery_holiday_js_array_data['sun']='';

}

if($bycwooptt_delivery_holiday_saturday=='Sat'){

    $bycwooptt_delivery_holiday_js_array_data['sat']= 'Sat';

	}else{

	$bycwooptt_delivery_holiday_js_array_data['sat']='';
}

$bycwooptt_delivery_holiday_string_array='';

if(!empty($bycwooptt_delivery_holiday_js_array_data)){

	foreach($bycwooptt_delivery_holiday_js_array_data as $bycwooptt_delivery_holiday_singel_day){

		if(!empty($bycwooptt_delivery_holiday_singel_day)){

			$bycwooptt_delivery_holiday_string='"'.$bycwooptt_delivery_holiday_singel_day.'"';

			$bycwooptt_delivery_holiday_string_array=$bycwooptt_delivery_holiday_string_array.','.$bycwooptt_delivery_holiday_string;

			}//!empty($bycwooptt_delivery_holiday_singel_day

		}//foreach($bycwooptt_delivery_holiday_js_array_data

	}//empty($bycwooptt_delivery_holiday_js_array_data

$bycwooptt_closing_day_js_array=sanitize_text_field('['.substr($bycwooptt_delivery_holiday_string_array,1).']');

$bycwooptt_delivery_end_time=get_option('byconsolewooptt_delivery_end_time');




if(!empty(get_option('byconsolewooptt_delivery_holiday_sunday_check'))==''){
	
	$bycwooptt_delivery_holiday_sunday='BYC';
	
	}else{
		
	$bycwooptt_delivery_holiday_sunday=get_option('byconsolewooptt_delivery_holiday_sunday_check');
		
		
	}
	
	
if(!empty(get_option('byconsolewooptt_delivery_holiday_saturday_check'))==''){
	
	$bycwooptt_delivery_holiday_saturday='BYC';
	
	}else{
		
	$bycwooptt_delivery_holiday_saturday=get_option('byconsolewooptt_delivery_holiday_saturday_check');
				
}

?>

<script>

function bycwooptt_check_product_availability_days(date){

var byc_product_checkday= jQuery.datepicker.formatDate("D", date);

var today = new Date();

var dd = today.getDate();

var mm = today.getMonth()+1;

var yyyy = today.getFullYear();

if(dd<10){

dd='0'+dd;

} 


if(mm<10){


mm='0'+mm;


}


var current_date = dd+'/'+mm+'/'+yyyy;

<?php

$currentlang=get_bloginfo("language");

if($currentlang == 'en_US' || $currentlang == 'en-US'){ ?>


if(byc_product_checkday=='Sun'){


var byc_product_checkday='Sun';	


}else if (byc_product_checkday=='Mon'){	


var byc_product_checkday='Mon';	


}else if (byc_product_checkday=='Tue'){	


var byc_product_checkday='Tue';	


}else if (byc_product_checkday=='Wed'){	


var byc_product_checkday='Wed';	


}else if (byc_product_checkday=='Thu'){	


var byc_product_checkday='Thu';	


}else if ( byc_product_checkday=='Fri'){	


var byc_product_checkday='Fri';	


}else if (byc_product_checkday=='Sat'){	


var byc_product_checkday='Sat';


}


<?php 


} 

/*Finnish*/

else if($currentlang =='fi'){ ?>


if (byc_product_checkday=='ma'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='ti'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='ke'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='to'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='pe'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='la'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='su'){


var byc_product_checkday='Sun';


}


<?php


}

/*spanish*/

else if($currentlang =='es_ES' || $currentlang =='es-ES'){ ?>


if (byc_product_checkday=='lun'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='mar'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='mié'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='jue'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='vie'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='sáb'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='dom'){


var byc_product_checkday='Sun';


}


<?php 


}

/*Deutsch(sie)*/

else if($currentlang == 'de_DE_formal' || $currentlang == 'de_DE'  || $currentlang == 'de-DE'){?>


if (byc_product_checkday=='Mo'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='Di'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='Mi'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='Do'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='Fr'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='Sa'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='So'){


var byc_product_checkday='Sun';


}


<?php


}

/*French*/

else if($currentlang == 'fr_FR' || $currentlang == 'fr-FR'){ ?>


if (byc_product_checkday=='lun'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='mar'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='mer'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='jeu'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='ven'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='sam'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='dim'){


var byc_product_checkday='Sun';


}


<?php


}

/*Italian*/

else if($currentlang == 'it_IT' || $currentlang == 'it-IT'){ ?>


if (byc_product_checkday=='Lun'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='Mar'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='Mer'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='Gio'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='Ven'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='Sab'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='Dom'){


var byc_product_checkday='Sun';


}


<?php


}

/*Nederlands*/

else if($currentlang == 'nl' || $currentlang == 'nl_NL'){ ?>


if (byc_product_checkday=='ma'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='di'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='wo'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='do'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='vr'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='za'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='zo'){


var byc_product_checkday='Sun';


}


<?php


}

/*Danish*/

else if($currentlang == 'da_DK' || $currentlang == 'da-DK'){?>


if (byc_product_checkday=='Man'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='Tir'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='Ons'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='Tor'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='Fre'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='Lør'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='Søn'){


var byc_product_checkday='Sun';


}


<?php 


}

/*Deutsch(schweiz)*/

else if($currentlang =='de_CH' || $currentlang =='de-CH'){ ?>


if (byc_product_checkday=='Mo'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='Di'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='Mi'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='Do'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='Fr'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='Sa'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='So'){


var byc_product_checkday='Sun';


}


<?php


}

/*Estonian*/

else if($currentlang=='et'){?>


if (byc_product_checkday=='E'){	


var byc_product_checkday='Mon';


}else if (byc_product_checkday=='T'){


var byc_product_checkday='Tue';


}else if (byc_product_checkday=='K'){


var byc_product_checkday='Wed';


}else if (byc_product_checkday=='N'){


var byc_product_checkday='Thu';


}else if (byc_product_checkday=='R'){


var byc_product_checkday='Fri';


}else if (byc_product_checkday=='L'){


var byc_product_checkday='Sat';


}else if (byc_product_checkday=='P'){


var byc_product_checkday='Sun';


}


<?php } ?>

var $product_availability_return=true;

var $product_availability_returnclass ="available byconsolewooptt_date_return";

var byc_bycwoopdt_machine_curtime='<?php echo date( 'H:i', current_time( 'timestamp', 0 )); ?>';

var bycwooptt_delivery_end_time='<?php echo esc_js($bycwooptt_delivery_end_time)?>';

var loop_date=jQuery.datepicker.formatDate("dd/mm/yy", date);

if(loop_date==current_date){

if(Date.parse("12 Apr 2021 "+byc_bycwoopdt_machine_curtime)>= Date.parse("12 Apr 2021 "+bycwooptt_delivery_end_time)){

	$product_availability_return=false;
	$product_availability_returnclass ="unavailable today_end_time";

}else{

	$product_availability_return=true;
	$product_availability_returnclass ="available today_end_time_available";
	
	}
}

var bycwooptt_delivery_holiday_sunday='<?php echo esc_js($bycwooptt_delivery_holiday_sunday)?>';

if(byc_product_checkday==bycwooptt_delivery_holiday_sunday){
$product_availability_return=false;
$product_availability_returnclass ="unavailable bycwooptt_closing_day";

}

var bycwooptt_delivery_holiday_saturday='<?php echo esc_js($bycwooptt_delivery_holiday_saturday)?>';

if(byc_product_checkday==bycwooptt_delivery_holiday_saturday){
$product_availability_return=false;
$product_availability_returnclass ="unavailable bycwooptt_closing_day";

}


//closing_holiday_setting 

return [$product_availability_return,$product_availability_returnclass];


}


</script>


<label><?php esc_html_e('Choose your delivery date','product-delivery-date-time-for-woocommerce'); ?><em class="required" title="Required field">*</em></label><br/>


<input type="text" name="bycwooptt_product_delivery_date" class="product_datepicker" id="product_datepicker" placeholder="<?php echo  __('Click here...','product-delivery-date-time-for-woocommerce'); ?>" readonly="readonly" autocomplete="off" style="border: 1px solid #701A1A;width:50%;padding:5px;" />


<div style="margin-bottom:8px; clear:both;"></div>


 <label class="byconsolewooptt_timepicker_lebel" style="display:none;"><?php esc_html_e('Order type','product-delivery-date-time-for-woocommerce'); ?><em class="required" title="Required field">*</em></label>


<div id="byc_div_product_delivery" style="display:none;">


 <input type="radio" name="byconsolewooptt_ordered_for" id="byc_product_delivery" value="Delivery" disabled="disabled" onclick="byconsolewooptt_show_delivery_time()" /><label><?php esc_html_e('Delivery','product-delivery-date-time-for-woocommerce'); ?></label>


</div>


<div id="bycwooptt_pickup_product_time" style="display:none; padding-bottom: 20px;">


<label for="lable_for_pickup_product_time"><?php esc_html_e('Choose your time slot','product-delivery-date-time-for-woocommerce'); ?><em class="required" title="Required field">*</em></label>


<div id="byc_loder_gif" style="display:none;">


<img src="<?php echo esc_url( plugins_url( 'img/byc_lodaing.gif', __FILE__ ) )?>" style="margin-left: -70px; height: 80px;" />


</div>


<div id="bycwooptt_pickup_product_time_slot"></div>


</div>


<?php


if(get_option('bycproductavailabilit_no_of_days_open_in_calender')==''){


$byc_open_date=14;


}else{


$byc_open_date=get_option('bycproductavailabilit_no_of_days_open_in_calender');


}


//$byc_wordpress_local_time=date( 'H:i', current_time( 'timestamp', 0 ));


if(get_option('byconsolewooptt_delivery_start_time')==''){


$bycwooptt_delivery_start_time='10:00';


}else{


$bycwooptt_delivery_start_time=get_option('byconsolewooptt_delivery_start_time');


}


if(get_option('byconsolewooptt_delivery_end_time')==''){


$bycwooptt_delivery_end_time='16:00';


}else{


$bycwooptt_delivery_end_time=get_option('byconsolewooptt_delivery_end_time');


}


$bycwooptt_delivery_time_duration=get_option('byconsolewooptt_delivery_time_duration');


?>


<script>


jQuery(document).ready(function(){


jQuery('.single_add_to_cart_button').prop('disabled', true);


jQuery("#bycwooptt_pickup_product_time_slot,input[name=bycwooptt_pickup_delivery_time]").on("change", function(){


var byc_selected_time =jQuery(this).find(":selected").val();


if(byc_selected_time==0){ 


	jQuery('.single_add_to_cart_button').prop('disabled', true);


  }else{ 


	jQuery('.single_add_to_cart_button').prop('disabled', false);


  }


});


var byc_open_date=<?php echo esc_js($byc_open_date)?>;


jQuery("#product_datepicker").datepicker({


beforeShowDay  : function(date){ return bycwooptt_check_product_availability_days(date)},


minDate: 0,


maxDate: byc_open_date,


dateFormat:"dd/mm/yy",


onSelect: function(date,obj){ return bycwooptt_check_product_availability_options(date,obj)}


});	


});


function bycwooptt_check_product_availability_options(date){


jQuery('.byconsolewooptt_timepicker_lebel').css("display","block");


jQuery('#byc_div_product_delivery').css("display","none");


jQuery('#bycwooptt_pickup_product_time').css("display","none");


jQuery('#byc_product_delivery').removeClass("delivery_available");


jQuery('.single_add_to_cart_button').prop('disabled', true);


jQuery("#byc_product_delivery").prop("checked", false);


jQuery("#byc_product_delivery").attr("checked", false);


var selected_calendar_date = jQuery("#product_datepicker").datepicker('getDate');


var $selected_date_day=jQuery.datepicker.formatDate('D', selected_calendar_date);


var selected_date=jQuery("#product_datepicker").val();


jQuery('#byc_div_product_delivery').css("display","block");


jQuery('#byc_product_delivery').addClass("delivery_available");


jQuery('#byc_product_delivery').removeAttr("disabled");


}


function byconsolewooptt_show_delivery_time(){

jQuery('#bycwooptt_pickup_product_time').css("display","block");	

var bycwooptt_delivery_start_time='<?php echo esc_js($bycwooptt_delivery_start_time); ?>';

var bycwooptt_delivery_end_time='<?php echo esc_js($bycwooptt_delivery_end_time); ?>';

var bycwooptt_delivery_time_duration='<?php echo esc_js($bycwooptt_delivery_time_duration); ?>';

var bycwooptt_selected_product_date = jQuery("#product_datepicker").val();

var woospd_ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

jQuery("#byc_loder_gif").css({"display":"block"});

var byconsolewooptt_selected_available_time_data = {

'action': 'byconsolewooptt_get_time_slot_by_date_using_ajax',

'calender_for' : 'delivery',

'bycwooptt_delivery_start_time' : bycwooptt_delivery_start_time,

'bycwooptt_delivery_end_time' : bycwooptt_delivery_end_time,

'bycwooptt_delivery_time_duration'   : bycwooptt_delivery_time_duration,

'bycwooptt_selected_product_date'	: bycwooptt_selected_product_date,

};


jQuery.post(woospd_ajaxurl,byconsolewooptt_selected_available_time_data,function(pickup_time_available){

jQuery("#byc_loder_gif").css("display","none");

jQuery("#bycwooptt_pickup_product_time").css("display","block");

jQuery("#bycwooptt_pickup_product_time_slot").empty();	

jQuery("#bycwooptt_pickup_product_time_slot").append(pickup_time_available);

});

}

</script>


<?php


} //check plugins function working.


}


add_action( 'woocommerce_before_add_to_cart_button', 'bycwooptt_action_woocommerce_add_to_cart'); 


function bycwooptt_action_woocommerce_add_to_cart_loop($quantity, $product){ 


if(get_option('byconsolewooptt_product_button_text')==''){


	$bycwooptt_product_add_to_cart_text='Add to cart';


	}else{


	$bycwooptt_product_add_to_cart_text=get_option('byconsolewooptt_product_button_text');	


}


if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {


$quantity = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data" style="display:none !important;">';


	$quantity .= woocommerce_quantity_input( array(), $product, false );


	$quantity .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';


	$quantity .= '</form>';


	$quantity .='<a href="'.get_permalink().'" class="button add_to_cart_button ajax_add_to_cart">'.$bycwooptt_product_add_to_cart_text.'</a>';


	}


	return $quantity;	


}


add_filter( 'woocommerce_loop_add_to_cart_link', 'bycwooptt_action_woocommerce_add_to_cart_loop', 10, 2 );


//display cart item data


function byconsolewooptt_date_option_for_products($cart_item, $product_id){	


if(isset($_POST['bycwooptt_product_delivery_date'])){


 $cart_item['bycwooptt_product_delivery_date'] = sanitize_text_field($_POST['bycwooptt_product_delivery_date'] );


}


	if(isset($_POST['byconsolewooptt_ordered_for'])){


    $cart_item['byconsolewooptt_ordered_for'] = sanitize_text_field($_POST['byconsolewooptt_ordered_for'] );


	if($cart_item['byconsolewooptt_ordered_for']=='Delivery'){


			if(isset($_POST['bycwooptt_pickup_delivery_time'])){


			$cart_item['bycwooptt_pickup_delivery_time'] = sanitize_text_field($_POST['bycwooptt_pickup_delivery_time'] );


			}


		}


    }


return $cart_item;


}


add_filter('woocommerce_add_cart_item_data','byconsolewooptt_date_option_for_products',10,2);


function get_byconsolewooptt_session( $cart_item, $values ){


	if(isset($values['byconsolewooptt_ordered_for'])){


       $cart_item['byconsolewooptt_ordered_for'] = $values['byconsolewooptt_ordered_for'];


    }


    if(isset($values['bycwooptt_product_delivery_date'])){


       $cart_item['bycwooptt_product_delivery_date'] = $values['bycwooptt_product_delivery_date'];


    }


	if(isset($values['bycwooptt_pickup_delivery_time'])){


       $cart_item['bycwooptt_pickup_delivery_time'] = $values['bycwooptt_pickup_delivery_time'];


    }


    return $cart_item;


}


add_filter( 'woocommerce_get_cart_item_from_session', 'get_byconsolewooptt_session', 20, 2 );


// dispaly date and time in cart page


function byconsolewooptt_get_item_data($byconsolewooptt_data, $cart_item ){


    if ( isset($cart_item['bycwooptt_product_delivery_date'] ) ){


         $byconsolewooptt_data[] = array(


            'name' => __( 'Date', 'product-delivery-date-time-for-woocommerce' ),


            'value' => sanitize_text_field($cart_item['bycwooptt_product_delivery_date'] )


        );


     }


	if ( isset( $cart_item['bycwooptt_pickup_delivery_time'])){


         $byconsolewooptt_data[] = array(


            'name' => __( 'Time', 'product-delivery-date-time-for-woocommerce'),


            'value' => sanitize_text_field($cart_item['bycwooptt_pickup_delivery_time'])


        );


     }


	if ( isset( $cart_item['byconsolewooptt_ordered_for'] ) ){


         $byconsolewooptt_data[] = array(


            'name' => __( 'Order type', 'product-delivery-date-time-for-woocommerce'),


            'value' => sanitize_text_field($cart_item['byconsolewooptt_ordered_for'])


        );


     }


    return $byconsolewooptt_data;


}


add_filter( 'woocommerce_get_item_data', 'byconsolewooptt_get_item_data', 10, 2 );


// save bycpnsolewoopdt date on checkout


function byconsolewooptt_add_order_item_meta( $item_id, $values ) {


	if ( ! empty( $values['bycwooptt_product_delivery_date'] ) ) {


   		woocommerce_add_order_item_meta( $item_id, 'Date', $values['bycwooptt_product_delivery_date'] );           


		}


	if ( ! empty( $values['bycwooptt_pickup_delivery_time'] ) ) {


   		woocommerce_add_order_item_meta( $item_id, 'Time', $values['bycwooptt_pickup_delivery_time'] );           


    }


	if ( ! empty( $values['byconsolewooptt_ordered_for'] ) ) {


   		woocommerce_add_order_item_meta( $item_id, 'Order type', $values['byconsolewooptt_ordered_for'] );           


    }	


}


add_action( 'woocommerce_add_order_item_meta', 'byconsolewooptt_add_order_item_meta', 10, 2 );


// show byconsolewooptt data on oder overview page


function byconsolewooptt_order_item_product( $cart_item, $order_item ){


    if( isset( $order_item['bycwooptt_product_delivery_date'] ) ){


        $cart_item_meta['bycwooptt_product_delivery_date'] = $order_item['bycwooptt_product_delivery_date'];


    }


	if( isset( $order_item['bycwooptt_pickup_delivery_time'] ) ){


        $cart_item_meta['bycwooptt_pickup_delivery_time'] = $order_item['bycwooptt_pickup_delivery_time'];


    }


	if( isset( $order_item['byconsolewooptt_ordered_for'] ) ){


        $cart_item_meta['byconsolewooptt_ordered_for'] = $order_item['byconsolewooptt_ordered_for'];


    }


    return $cart_item;


}


add_filter( 'woocommerce_order_item_product', 'byconsolewooptt_order_item_product', 10, 2 );


//show byconsolewooptt data on email


function byconsolewooptt_email_order_meta_fields($fields){ 


    $fields['bycwooptt_product_delivery_date'] = __('Date', 'product-delivery-date-time-for-woocommerce' ); 


	$fields['bycwooptt_pickup_delivery_time'] = __('Time', 'product-delivery-date-time-for-woocommerce' );


	$fields['byconsolewooptt_ordered_for'] = __('Order type', 'product-delivery-date-time-for-woocommerce' );


	return $fields; 


} 


add_filter('woocommerce_email_order_meta_fields', 'byconsolewooptt_email_order_meta_fields');


function bycwooptt_add_styles(){


wp_enqueue_script('jquery-ui-datepicker');	


wp_enqueue_style('byconsolewooptt-stylesheet-one', plugins_url('css/woopdt.css', __FILE__));


wp_enqueue_style('byconsolewooptt-stylesheet-three', plugins_url('css/jquery-ui.theme.min.css', __FILE__));


wp_enqueue_style('byconsolewooptt-stylesheet-four', plugins_url('css/jquery-ui.structure.min.css', __FILE__));


}	


add_action( 'wp_enqueue_scripts', 'bycwooptt_add_styles' ); 


function bycwooptt_add_styles_admin(){


wp_enqueue_style('byconsolewooptt-stylesheet-one',plugins_url('inc/css/admin.css', __FILE__) );


wp_enqueue_style('byconsolewooptt-stylesheet-two', plugins_url('css/adminjquery-ui.css', __FILE__));


}


add_action( 'admin_enqueue_scripts', 'bycwooptt_add_styles_admin' ); 


function bycwooptt_add_admin_script(){


wp_register_script('byconsolewooptt-admin-script-2', plugins_url( 'js/jquery-ui.multidatespicker.js' , __FILE__ ));


wp_register_script('byconsolewooptt-admin-script-3', plugins_url('js/admin-scripts.js', __FILE__));


wp_enqueue_script( 'byconsolewooptt-admin-script-2');


wp_enqueue_script( 'byconsolewooptt-admin-script-3');


}


add_action('admin_enqueue_scripts','bycwooptt_add_admin_script');

?>