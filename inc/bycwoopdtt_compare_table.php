<?php

function byconsolewooptt_admin_compare_plugins_settings_form(){ ?>

<div class="wrap">

<h1><?php esc_html_e('Product delivery date time for WooCommerce','product-delivery-date-time-for-woocommerce'); ?></h1>

<?php

settings_fields("comparetable");

do_settings_sections("byconsolewoopddt_comparetable_options"); ?> 

</div>

<?php

}

function byconsolewoopddt_compare_table_form(){ ?>

<html>

<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
	
<style>
table { border-collapse: collapse; border-spacing: 0; width: 100%; border: 1px solid #ffa500;}

th, td {text-align: center;padding: 16px;}

th:first-child, td:first-child {text-align: left;}

tr:nth-child(even) { background-color: #ccc;}	
	
</style>	

</head>

<body>

<h2>Comparison between <span style="color:#0051ff;">WooPDDT Lite</span> <span style="color:red;">Vs</span> <a target="_blank" href="https://plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/" style="color:#ffa500;">WooPDDT Pro</a> </h2>

<table>

  <tr>

    <th style="text-align:center;">SL No</th>

    <th style="width:50%; text-align:center;">Features</th>

    <th style="text-align:center;">WooPDDT Lite</th>

    <th style="text-align:center;"><a href="https://plugins.byconsole.com/product/delivery-date-per-product-for-woocommerce/" target="_blank">WooPDDT Pro</a></th>

  </tr>


  <tr>

  <td style="text-align:center;">1</td>

  <td style="text-align:left;"><?php echo esc_html( __('Delivery time setup','product-delivery-date-time-for-woocommerce'));?></td>
  
  <td style="color:green;">&#10004;</td>
  <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

    <td style="text-align:center;">2</td>

    <td style="text-align:left;"><?php echo esc_html( __('Pickup time setup','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">3</td>

  <td style="text-align:left;"><?php echo esc_html( __('Pre order day','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:green;">&#10004;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">4</td>

  <td style="text-align:left;"><?php echo esc_html( __('Closing Day','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:green;">&#10004;</td>

   <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">5</td>

  <td style="text-align:left;"><?php echo esc_html( __('Pre order day restriction(Pickup & Delivery','product-delivery-date-time-for-woocommerce') );?>)</td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">6</td>

  <td style="text-align:left;"><?php echo esc_html( __('Delivery Charges','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">7</td>

  <td style="text-align:left;"><?php echo esc_html( __('Minimum cart Price(One Day Delivery)','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">8</td>

  <td style="text-align:left;"><?php echo esc_html( __('Maximum cart Price(All Day Delivery)','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  	<td style="text-align:center;">9</td>

    <td style="text-align:left;"><?php echo esc_html( __('Every product in cart can have its own delivery/pickup days','product-delivery-date-time-for-woocommerce' ));?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  <tr>

    <td style="text-align:center;">10</td>

    <td style="text-align:left;"><?php echo esc_html( __('Custom delivery slot for each product category','product-delivery-date-time-for-woocommerce') );?></td>

   <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  <tr>

  	<td style="text-align:center;">11</td>

    <td style="text-align:left;"><?php echo esc_html( __('Product wise cut off time for same day & next day delivery/pickup','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  <tr>

  	<td style="text-align:center;">12</td>

    <td style="text-align:left;"><?php echo esc_html( __('Option to mark certain products as pickup only','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  <tr>

    <td style="text-align:center;">13</td>

    <td style="text-align:left;"><?php echo esc_html( __('Every product in cart can have its own delivery date and slot or pickup date & slot','product-delivery-date-time-for-woocommerce') );?></td>

   <td style="color:red;">&#10008;</td>

   <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">14</td>

  <td style="text-align:left;"><?php echo esc_html( __('Date picker on product details page. ( In order to add a product to cart, a date and time slot selection is mandatory, you can exclude some product category as well)','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">15</td>

  <td style="text-align:left;"><?php echo esc_html( __('Option to disable date & time slot for chosen calendar date range','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">16</td>

  <td style="text-align:left;"><?php echo esc_html( __('Show available products for todays delivery/pickup with a short code','product-delivery-date-time-for-woocommerce') );?></td>

   <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">17</td>

  <td style="text-align:left;"><?php echo esc_html( __('Show available products for tomorrows delivery/pickup with a short code','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">18</td>

  <td style="text-align:left;"><?php echo esc_html( __('Short code to search products availability by date and time','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">19</td>

  <td style="text-align:left;"><?php echo esc_html( __('Option to manage Weekly off day','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">20</td>

  <td style="text-align:left;"><?php echo esc_html( __('Option to manage yearly holidays(repeated on each year automatically). Also casual holidays(Applied to current year only)','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">21</td>

  <td style="text-align:left;"><?php echo esc_html( __('Each product can have only fixed calendar dates for delivery & pickup (like some product can be delivered only on 25th of December)','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

  

  <tr>

  <td style="text-align:center;">22</td>

  <td style="text-align:left;"> <?php echo esc_html( __('Report generation for upcoming deliveries/pickups by calendar date search','product-delivery-date-time-for-woocommerce') );?></td>

    <td style="color:red;">&#10008;</td>

    <td style="color:green;">&#10004;</td>

  </tr>

 
</table>

</body>

</html>

<?php }


add_action('admin_init', 'byconsolewoopddt_compare_table_settings_fields');

function byconsolewoopddt_compare_table_settings_fields(){

	add_settings_section("comparetable", "", null, "byconsolewoopddt_comparetable_options");

	add_settings_field("byconsolewoopddt_compare_table_form", "", "byconsolewoopddt_compare_table_form", "byconsolewoopddt_comparetable_options", "comparetable");



}



?>