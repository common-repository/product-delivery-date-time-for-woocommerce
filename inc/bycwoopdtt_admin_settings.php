<?php

add_action('admin_menu','byconsolewooptt_themes_add_plugin_menu');

function byconsolewooptt_themes_add_plugin_menu(){

	global $byconsolewooptt_admin_settings_holidays;

	global $byconsolewooptt_admin_custom_modifiction;

	global $byconsolewooptt_admin_plugins_compare;
	

	add_menu_page( 'WooPDT Lite','WooPDT Lite', 'manage_options', 'byconsolewooptt_general_settings', 'byconsolewooptt_general_settings_form' );

	$byconsolewooptt_admin_settings_holidays=add_submenu_page('byconsolewooptt_general_settings', 'Holiday Settings','Holiday Settings', 'manage_options','byconsolewooptt_holiday_settings', 'byconsolewooptt_admin_holiday_settings_form');

	$byconsolewooptt_admin_custom_modifiction=add_submenu_page('byconsolewooptt_general_settings', 'Custom Modification Request','Custom Modification Request', 'manage_options','byconsolewooptt_custom_modification_settings', 'byconsolewooptt_admin_custom_modification_settings_form');

	$byconsolewooptt_admin_plugins_compare=add_submenu_page('byconsolewooptt_general_settings', 'Compare Plugins','Compare Plugins', 'manage_options','byconsolewooptt_compare_plugins_settings', 'byconsolewooptt_admin_compare_plugins_settings_form');

}



function byconsolewooptt_general_settings_form(){?>



<div class="wrap">



<h1><?php esc_html_e('Product delivery date time for WooCommerce','product-delivery-date-time-for-woocommerce'); ?></h1>



<form method="post" class="form_theme_panal" action="options.php">



    <?php



        settings_fields("bycwoopttadminoptions");



        do_settings_sections("bycwooptt-admin-plugins-options");      



        submit_button();  ?>          



</form>





</div>





<?php





}





function byconsolewooptt_delivery_start_end_time_section(){?>



	<label><?php esc_html_e('Start time : ','product-delivery-date-time-for-woocommerce'); ?></label>

    <input type="time" name="byconsolewooptt_delivery_start_time" id="byconsolewooptt_delivery_start_time" value="<?php echo esc_html(get_option('byconsolewooptt_delivery_start_time'));?>" style="width:20%;" />



    <label><?php esc_html_e('End time : ','product-delivery-date-time-for-woocommerce'); ?></label>

    <input type="time" name="byconsolewooptt_delivery_end_time" id="byconsolewooptt_delivery_end_time" value="<?php echo esc_html(get_option('byconsolewooptt_delivery_end_time'));?>" style="width:20%;" />

    

    <label><?php esc_html_e('Time slot : ','product-delivery-date-time-for-woocommerce'); ?></label>

     <select name="byconsolewooptt_delivery_time_duration" id="byconsolewooptt_delivery_time_duration" style="width:20%;">

        	<option value=""><?php esc_html_e('~~select~~','byconsolewooptt'); ?></option>

            <option value="60" <?php if(get_option('byconsolewooptt_delivery_time_duration')==60){ ?> selected="selected" <?php } ?>>60 minutes</option>

        </select><br/><br/>

      

      <label><?php esc_html_e('Break start time : ','product-delivery-date-time-for-woocommerce'); ?></label>

      <input type="time" name="byconsolewooptt_delivery_break_start_time" readonly="readonly" style="width:20%; background: #ddd;" />



    <label><?php esc_html_e('Break end time : ','product-delivery-date-time-for-woocommerce'); ?></label>

    <input type="time" name="byconsolewooptt_delivery_break_end_time" readonly="readonly" style="width:20%; background: #ddd;" />

    <a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a><br/>



<?php



 }

 

function byconsolewooptt_pickup_start_end_time_section(){ ?>

	<label><?php esc_html_e('Start time : ','product-delivery-date-time-for-woocommerce'); ?></label>
    <input type="time" name="byconsolewooptt_pickup_start_time" readonly="readonly" style="width:20%; background: #ddd;" />


    <label><?php esc_html_e('End time : ','product-delivery-date-time-for-woocommerce'); ?></label>
    <input type="time" name="byconsolewooptt_pickup_end_time" readonly="readonly" style="width:20%; background: #ddd;" />

    

    <label><?php esc_html_e('Time slot : ','product-delivery-date-time-for-woocommerce'); ?></label>
     <select name="byconsolewooptt_pickup_time_duration" style="background: #ddd; width:20%;">

        	<option value=""><?php esc_html_e('~~select~~','product-delivery-date-time-for-woocommerce'); ?></option>

            <option value="15"><?php esc_html_e('15 minutes','product-delivery-date-time-for-woocommerce'); ?></option>

            <option value="30"><?php esc_html_e('30 minutes','product-delivery-date-time-for-woocommerce'); ?></option>

            <option value="60"><?php esc_html_e('60 minutes','product-delivery-date-time-for-woocommerce'); ?></option>

            <option value="120"><?php esc_html_e('120 minutes','product-delivery-date-time-for-woocommerce'); ?></option>

        </select> <a style="color:#ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a><br/><br/>

      

      <label><?php esc_html_e('Break start time : ','product-delivery-date-time-for-woocommerce'); ?></label>

      <input type="time" name="byconsolewooptt_pickup_break_start_time" readonly="readonly" style="width:20%; background: #ddd;" />



    <label><?php esc_html_e('Break end time : ','product-delivery-date-time-for-woocommerce'); ?></label>

    <input type="time" name="byconsolewooptt_pickup_break_end_time" readonly="readonly" style="width:20%; background: #ddd;" />

    <a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a><br/>



<?php



}



function byconsolewooptt_no_of_days_open_in_calender_section(){ ?>



<input type="number" name="byconsolewooptt_no_of_days_open_in_calender" id="byconsolewooptt_no_of_days_open_in_calender" value="<?php echo esc_html(get_option('byconsolewooptt_no_of_days_open_in_calender'));?>" style="width:20%;" />



<label><?php esc_html_e('Leave blank not to set any pre-order days, this is number of days from current date customer can place an order.','product-delivery-date-time-for-woocommerce');?></label><br/>



<span style="color:#a0a5aa"><?php esc_html_e('(Eg: 14 Only number)','product-delivery-date-time-for-woocommerce'); ?></span>



<?php  }



function byconsolewooptt_pre_order_in_calender_section(){ ?>



<input type="number" name="byconsolewooptt_pre_order_in_calender" readonly="readonly" style="width:20%; background: #ddd;" />



 <label><?php esc_html_e('Leave blank to not set any restricted pre-order days,this is number of days customer can not place an order before these number of days from current date.','product-delivery-date-time-for-woocommerce');?>&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></label><br/>



<span style="color:#a0a5aa"><?php esc_html_e('(Eg: 2 Only number)','product-delivery-date-time-for-woocommerce'); ?></span>



<?php  }



function byconsolewooptt_product_button_text_section(){ ?>



<input type="text" name="byconsolewooptt_product_button_text" id="byconsolewooptt_product_button_text" value="<?php echo esc_html(get_option('byconsolewooptt_product_button_text'));?>" style="width:20%;" />



<span style="color:#a0a5aa"><?php esc_html_e('(Eg: Add to Cart)','product-delivery-date-time-for-woocommerce'); ?></span>



<?php  } 





function byconsolewooptt_product_sameday_cutoff_lable_text_section(){ ?>



<input type="text" name="byconsolewooptt_product_sameday_cutoff_lable" id="byconsolewooptt_product_sameday_cutoff_lable" value="<?php echo esc_html(get_option('byconsolewooptt_product_sameday_cutoff_lable')); ?>" style="width:65%;" />



<span style="color:#a0a5aa"><?php esc_html_e('(Eg: This will be shown on product details page just before time selection box, once same day delivery cutoff time appears to end in an hour for the current day)','product-delivery-date-time-for-woocommerce'); ?></span>



<?php  }







function byconsolewooptt_shipping_charges_section(){?>



	<input type="text" name="byconsolewooptt_shipping_charges" readonly="readonly" style="width:20%;" />&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></label><br/>

    <span style="color:#a0a5aa">(Eg: $5)</span>



<?php



 }



 

function byconsolewooptt_minimum_cart_price(){?>



<input type="number" name="byconsolewooptt_minimum_cart_price" readonly="readonly" style="width:20%;" />



    <label><?php echo esc_html_e('This is the amount after which shipping is free.','product-delivery-date-time-for-woocommerce');?></label>&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></label><br/>



    <span style="color:#a0a5aa">(Eg: $1000)</span>



<?php



}





function byconsolewooptt_maximum_cart_price(){?>



<input type="number" name="byconsolewooptt_maximum_cart_price" readonly="readonly" style="width:20%;" />



    <label><?php echo esc_html_e('This is the amount after which shipping is free.','product-delivery-date-time-for-woocommerce');?></label>&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/">Get Pro Version</a></label><br/>



    <span style="color:#a0a5aa">(Eg: $5000)</span>



<?php }





add_action('admin_init', 'bycwoopdt_themes_plugin_settings_fields');

function bycwoopdt_themes_plugin_settings_fields(){

	add_settings_section("bycwoopttadminoptions", "WooPDT Lite", null, "bycwooptt-admin-plugins-options");

	add_settings_field("byconsolewooptt_delivery_start_end_time", "Delivery time : ", "byconsolewooptt_delivery_start_end_time_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_pickup_start_time", "Pickup time : ", "byconsolewooptt_pickup_start_end_time_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_no_of_days_open_in_calender_section","Pre order day : ", "byconsolewooptt_no_of_days_open_in_calender_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_pre_order_in_calender_section", "Pre order day restriction(Pickup & Delivery): ", "byconsolewooptt_pre_order_in_calender_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_product_button_text","Product button text : ", "byconsolewooptt_product_button_text_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_product_sameday_cutoff_lable","Same day delivery cutoff time ending soon alert text : ", "byconsolewooptt_product_sameday_cutoff_lable_text_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_shipping_charges","Delivery Charges: ", "byconsolewooptt_shipping_charges_section", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_minimum_cart_price", "Minimum cart Price(One Day Delivery): ", "byconsolewooptt_minimum_cart_price", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");

	add_settings_field("byconsolewooptt_maximum_cart_price", "Maximum cart Price(All Day Delivery): ", "byconsolewooptt_maximum_cart_price", "bycwooptt-admin-plugins-options", "bycwoopttadminoptions");


	register_setting("bycwoopttadminoptions", "byconsolewooptt_delivery_start_time");

	register_setting("bycwoopttadminoptions", "byconsolewooptt_delivery_end_time");

	register_setting("bycwoopttadminoptions", "byconsolewooptt_delivery_time_duration");

	register_setting("bycwoopttadminoptions", "byconsolewooptt_no_of_days_open_in_calender");

	register_setting("bycwoopttadminoptions", "byconsolewooptt_product_button_text");

	register_setting("bycwoopttadminoptions", "byconsolewooptt_product_sameday_cutoff_lable");

}

?>