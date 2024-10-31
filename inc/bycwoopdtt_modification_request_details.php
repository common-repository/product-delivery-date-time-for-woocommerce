<?php



function byconsolewooptt_admin_custom_modification_settings_form(){ ?>



<div class="wrap">



<h1><?php esc_html_e('Product delivery date time for WooCommerce','product-delivery-date-time-for-woocommerce'); ?></h1>



<?php



settings_fields("modificationrequest");



do_settings_sections("byconsolewoopddt_modificationrequest_options"); ?> 



</div>



<?php



}



function byconsolewoopddt_custom_modification_request_form(){



	$admin_email = get_option( 'admin_email' );



	if(isset($_REQUEST['byconsolewoopddt_new_customer_details_send'])){



		$byconsolewoopddt_current_website_url = esc_url_raw($_REQUEST['byconsolewoopddt_current_website_url']);



		$byconsolewoopddt_new_customer_name = sanitize_text_field($_REQUEST['byconsolewoopddt_new_customer_name']);



		$byconsolewoopddt_new_customer_email = sanitize_email($_REQUEST['byconsolewoopddt_new_customer_email']);



		$byconsolewoopddt_new_customer_details = sanitize_text_field($_REQUEST['byconsolewoopddt_new_customer_details']);





		$headers  = "MIME-Version: 1.0\r\n";



		$headers .= "Content-Type: text/html; charset=UTF-8";



		$headers .= "From: {$byconsolewoopddt_new_customer_name} <{$byconsolewoopddt_new_customer_email}>\r\n";



		$headers .= "Cc: Developer <developer.byconsole@gmail.com>";



		



		



		$to = 'support@byconsole.com';



		



		$message = '<b>Site Url:</b>&nbsp;'.$byconsolewoopddt_current_website_url.'<br />';



		$message .= '<b>Name:</b>&nbsp;'.$byconsolewoopddt_new_customer_name.'<br />';



		$message .= '<b>Email:</b>&nbsp;'.$byconsolewoopddt_new_customer_email.'<br />';



		$message .= '<b>Details:</b>&nbsp;'.$byconsolewoopddt_new_customer_details;



		



		



		if(wp_mail( $to, 'This mail for a new customization request.', $message, $headers )){



			echo '<p class="success_mail_send">'.esc_html(__('We will get back to you soon regarding your request. Alternatively you can query about your request by emailing to support@byconsole.com/developer.byconsole@gmail.com', 'product-delivery-date-time-for-woocommerce')).'</p><br />';



		}else{



		echo '<p>Unable to send support request email, please send emial manually to support@byconsole.com/developer.byconsole.com</p>';



			}	



		



	}



	?>



    <style>



		#form_url



		{



			width:85%;



			height:40px;



			border:1px #ffa500 solid;



			background:transparent;



			font-size:14px;



			padding:0 5px;



			float:none;



		}



		#form_name



		{



			width:85%;



			height:40px;



			border:1px #ffa500 solid;



			background:transparent;



			font-size:14px;



			padding:0 5px;



			float:none;



		}



		



		#form_mail



		{



			width:85%;



			height:40px;



			border:1px #ffa500 solid;



			background:transparent;



			font-size:14px;



			padding:0 5px;



			float:none;



		}



		



		#form_txt



		{



			width:85%;



			height:200px;



			border:1px #ffa500 solid;



			background:transparent;



			font-size:14px;



		}



		



		#form_submit



		{



			width:25%;



			height:40px;



			background:#ffa500;



			font-size:16px;



			border:0;



			color:#fff;



			float:right;



			margin-right: 10px;



			cursor:pointer;



		}	



		.form-group {



			margin-bottom: 1rem;



		}



		.form-group label[for=customer_name]{margin-right: 12px;}



		.form-group label[for=site_url]{margin-right: 4px;}



		.form-group label[for=customer_email]{margin-right: 16px;}



		.form-group label[for=customer_details]{vertical-align: top;margin-right: 10px;}



		.customer_details_form_container{width:50%;}



		.success_mail_send{background-color: #ffa500;width: 50%;padding: 10px;text-align: center;color: #000;}



	</style>

<script type="text/javascript" language="javascript">

jQuery(document).ready(function(){


	jQuery('#byconsolewoopddt_current_user_form_validation').submit(function () {

		var bycwooodt_form_name = jQuery.trim(jQuery('#form_name').val());

		var bycwooodt_form_mail = jQuery.trim(jQuery('#form_mail').val());

		var bycwooodt_form_txt = jQuery.trim(jQuery('#form_txt').val());
	
		if (bycwooodt_form_name  === '') {



			alert('<?php echo esc_html( __('Please enter your name', 'product-delivery-date-time-for-woocommerce'));?>');



			jQuery('#form_name').focus();



			return false;



		}



		if (bycwooodt_form_mail  === '') {



			alert('<?php echo esc_html( __('Please enter your email', 'product-delivery-date-time-for-woocommerce'));?>');	



			jQuery('#form_mail').focus();		



			return false;



		}



		if (bycwooodt_form_txt  === '') {



			alert('<?php echo esc_html( __('Please enter modification details', 'product-delivery-date-time-for-woocommerce'));?>');



			jQuery('#form_txt').focus();



			return false;



		}


		if(jQuery("#byconsolewoopddt_customer_agree").prop("checked") == true){



            }

        else if(jQuery("#byconsolewoopddt_customer_agree").prop("checked") == false){

			alert("<?php echo esc_html( __('Please check the checkbox before sending your information', 'product-delivery-date-time-for-woocommerce'));?>");

			return false;

        }

	});

});

</script>



    <div class="customer_details_form_container">

	<form name="frm" method="post" id="byconsolewoopddt_current_user_form_validation" >

    <div class="form-group">

      <label for="site_url"><?php echo esc_html( __('Site Url', 'product-delivery-date-time-for-woocommerce'));?>:</label>

      <input type="text" class="form-control" name="byconsolewoopddt_current_website_url" id="form_url" readonly="readonly" value="<?php echo esc_url( get_site_url());?>"/>

    </div>



    



    <div class="form-group">

    <label for="customer_name"><?php echo esc_html( __('Name', 'product-delivery-date-time-for-woocommerce'));?>:</label>

      <input type="text" class="form-control" name="byconsolewoopddt_new_customer_name" id="form_name" value=""/>

    </div>



    <div class="form-group">

      <label for="customer_email"><?php echo esc_html( __('Email', 'product-delivery-date-time-for-woocommerce'));?>:</label>

      <input type="email" class="form-control" name="byconsolewoopddt_new_customer_email" id="form_mail" value="<?php echo esc_html($admin_email);?>"/>

    </div>



    <div class="form-group">

   	  <label for="customer_details"><?php echo esc_html( __('Details', 'product-delivery-date-time-for-woocommerce'));?>:</label>

      <textarea class="form-control" name="byconsolewoopddt_new_customer_details" rows="5" id="form_txt"></textarea>

    </div>



    <div class="form-group">

   	  <input type="checkbox" class="form-control" name="byconsolewoopddt_customer_agree" id="byconsolewoopddt_customer_agree" value="yes" />

      <label for="customer_details"><b><?php echo esc_html( __('I agree to send above informations to ByConsole Support Team', 'product-delivery-date-time-for-woocommerce') );?>.</b></label>

    </div>


    <input type="submit" class="byconsolewoopddt_new_customer_details_send" name="byconsolewoopddt_new_customer_details_send" id="form_submit" value="<?php echo esc_html( __('Send', 'product-delivery-date-time-for-woocommerce'));?>">



    </form>



	</div>

	<?php	



}

add_action('admin_init', 'byconsolewoopddt_custom_modification_request_settings_fields');

function byconsolewoopddt_custom_modification_request_settings_fields(){

	add_settings_section("modificationrequest", "", null, "byconsolewoopddt_modificationrequest_options");

	add_settings_field("byconsolewoopddt_current_website_url", "Send your details:", "byconsolewoopddt_custom_modification_request_form", "byconsolewoopddt_modificationrequest_options", "modificationrequest");

}

?>