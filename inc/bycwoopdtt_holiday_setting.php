<?php



function byconsolewooptt_admin_holiday_settings_form(){?>



<div class="wrap">



<h1><?php esc_html_e('Product delivery date time for WooCommerce','product-delivery-date-time-for-woocommerce'); ?></h1>

<form method="post" class="form_theme_panal" action="options.php">

<?php

settings_fields("bycwoopttholidayoptions");

do_settings_sections("product-holiday-theme-options");      

submit_button(); 

?>          

</form>

</div>

<?php

}


function byconsolewooptt_delivery_holiday_option(){

$byconsolewooptt_delivery_holiday_sunday_check=get_option('byconsolewooptt_delivery_holiday_sunday_check');	

$byconsolewooptt_delivery_holiday_saturday_check=get_option('byconsolewooptt_delivery_holiday_saturday_check');	

?>

<script>  

jQuery(document).ready(function(){

jQuery("#byconsolewooptt_delivery_holiday_monday_check").prop("disabled", true);

jQuery("#byconsolewooptt_delivery_holiday_tuesday_check").prop("disabled", true);

jQuery("#byconsolewooptt_delivery_holiday_wednesday_check").prop("disabled", true);

jQuery("#byconsolewooptt_delivery_holiday_thursday_check").prop("disabled", true);

jQuery("#byconsolewooptt_delivery_holiday_friday_check").prop("disabled", true);

});



</script>



	<span><?php esc_html_e('Sunday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox" name="byconsolewooptt_delivery_holiday_sunday_check" id="byconsolewooptt_delivery_holiday_sunday_check" value="Sun" <?php if($byconsolewooptt_delivery_holiday_sunday_check=='Sun'){ ?> checked="checked" <?php } ?> style="margin-left: 35px;" /><br/><br/>

    <span><?php esc_html_e('Monday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox" id="byconsolewooptt_delivery_holiday_monday_check" style="margin-left: 33px;"  /><br/><br/>



    <span><?php esc_html_e('Tuesday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox" id="byconsolewooptt_delivery_holiday_tuesday_check" style="margin-left: 29px;" /><br/><br/>



    <span><?php esc_html_e('Wednesday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox"  id="byconsolewooptt_delivery_holiday_wednesday_check" style="margin-left:8px;"  /><br/><br/>



    <span><?php esc_html_e('Thursday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox" id="byconsolewooptt_delivery_holiday_thursday_check" style="margin-left: 28px;" /><br/><br/>



    <span><?php esc_html_e('Friday:','product-delivery-date-time-for-woocommerce'); ?>

    </span><input type="checkbox" id="byconsolewooptt_delivery_holiday_friday_check" style="margin-left:42px;" /><br/><br/>



    <span><?php esc_html_e('Saturday :','product-delivery-date-time-for-woocommerce'); ?></span><input type="checkbox" name="byconsolewooptt_delivery_holiday_saturday_check" id="byconsolewooptt_delivery_holiday_saturday_check" value="Sat" <?php if($byconsolewooptt_delivery_holiday_saturday_check=='Sat'){ ?> checked="checked" <?php } ?> style="margin-left: 25px;" /><br/><br/>

 



<?php

}



function byconsolewoopdtt_admin_national_holiday_date_setting(){?>

<script>

jQuery(document).ready(function() {

jQuery("#byconsolewoopdtt_admin_national_holiday_date").multiDatesPicker({

numberOfMonths: 1,

showButtonPanel: true,

changeMonth: true,

changeYear: false,

dateFormat: 'dd/mm'

});

} );

</script>



<input type="text" id="byconsolewoopdtt_admin_national_holiday_date" readonly="readonly" style="padding:7px; width:40%;"><span class="calendar_opentext"><?php esc_html_e('Click On Text Box To Open Calendar And Select Your National Holidays.','product-delivery-date-time-for-woocommerce'); ?>&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/"><?php esc_html_e('Get Pro Version','product-delivery-date-time-for-woocommerce'); ?></a></span>

<?php }	

function byconsolewoopdtt_admin_holiday_date_setting(){

?>

<script>

var dateToday = new Date();

jQuery(document).ready(function() {

jQuery( "#byconsolewoopdtt_admin_holiday_date" ).multiDatesPicker({

numberOfMonths: 3,

showButtonPanel: true,

dateFormat: 'dd/mm/yy'

});

});

</script>


<input type="text" id="byconsolewoopdtt_admin_holiday_date" readonly="readonly" style="padding:7px; width:40%;" /><span class="calendar_opentext"><?php esc_html_e('Click On Text Box To Open Calendar.','product-delivery-date-time-for-woocommerce'); ?>&nbsp;<a style="color: #ffa500;" href="https://www.plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/"><?php esc_html_e('Get Pro Version','product-delivery-date-time-for-woocommerce'); ?></a></span>   

<?php  }


add_action('admin_init', 'byconsolewooptt_holiday_plugin_settings_fields');

function byconsolewooptt_holiday_plugin_settings_fields(){

	add_settings_section("bycwoopttholidayoptions", "Holidays Settings:-", null, "product-holiday-theme-options");

	add_settings_field("byconsolewoopdtt_admin_national_holiday_date", "National Holidays Date:", "byconsolewoopdtt_admin_national_holiday_date_setting", "product-holiday-theme-options", "bycwoopttholidayoptions");

	add_settings_field("byconsolewoopdtt_admin_holiday_date", "Casual Holidays Date:", "byconsolewoopdtt_admin_holiday_date_setting", "product-holiday-theme-options", "bycwoopttholidayoptions");

	add_settings_field("byconsolewooptt_delivery_holiday_check", "Closing Day : ", "byconsolewooptt_delivery_holiday_option", "product-holiday-theme-options", "bycwoopttholidayoptions");

	register_setting("bycwoopttholidayoptions", "byconsolewooptt_delivery_holiday_sunday_check");

	register_setting("bycwoopttholidayoptions", "byconsolewooptt_delivery_holiday_saturday_check");

}

?>