<?php

add_action( 'wp_ajax_byconsolewooptt_get_time_slot_by_date_using_ajax','byconsolewooptt_get_time_slot_by_date_using_ajax' );

add_action( 'wp_ajax_nopriv_byconsolewooptt_get_time_slot_by_date_using_ajax','byconsolewooptt_get_time_slot_by_date_using_ajax' );

function byconsolewooptt_get_time_slot_by_date_using_ajax(){

function generateTimeSlots($duration, $start, $end, $breakTimeStart, $breakTimeEnd){

        $start = new DateTime($start);

        $end = new DateTime($end);

		$breakTimeStart = new DateTime($breakTimeStart);

        $breakTimeEnd = new DateTime($breakTimeEnd);

        $start_time = $start->format('H:i');

        $end_time = $end->format('H:i');

		$break_start = $breakTimeStart->format('H:i'); // break start

		$break_end   = $breakTimeEnd->format('H:i'); // break end

        $i=0;

        while(strtotime($start_time) <= strtotime($end_time)){

			$start = $start_time;

            $end = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));

            $start_time = date('H:i',strtotime('+'.$duration.' minutes',strtotime($start_time)));

            $i++;

            if(strtotime($start_time) <= strtotime($end_time)){

				if(strtotime($break_start) >= strtotime($end)  || strtotime($break_end) < strtotime($end)){

					$time[] = date("G:i", strtotime($start)) . ' - ' . date("G:i", strtotime($end)); //24 hour

				}

            }

        }

        return $time;

}

$serviceing_start_time=sanitize_text_field($_POST['bycwooptt_delivery_start_time']);

$serviceing_end_time=sanitize_text_field($_POST['bycwooptt_delivery_end_time']);

$serviceing_time_slot=sanitize_text_field($_POST['bycwooptt_delivery_time_duration']);

//$serviceing_breck_time_start='15:00';
//$serviceing_breck_time_end='15:00';

$bycwooptt_wp_curtime=date( 'H:i', current_time( 'timestamp'));

$bycwooptt_selected_product_date=sanitize_text_field($_POST['bycwooptt_selected_product_date']);

$byc_current_date=date("d/m/Y");

if($byc_current_date==$bycwooptt_selected_product_date){

$bycwooptt_wp_curtime_explode=explode(":",$bycwooptt_wp_curtime);

if($bycwooptt_wp_curtime_explode[1]>= 1 && $bycwooptt_wp_curtime_explode[1]<= 59){

$byc_sameday_minimum_hours=1;

$byc_curtime_add_hour = date("H:i",strtotime("+".$byc_sameday_minimum_hours. "hour", strtotime($bycwooptt_wp_curtime)));

}

$bycwooptt_wp_curtime_add=explode(":",$byc_curtime_add_hour);

$bycwooptt_wp_curtime1=$bycwooptt_wp_curtime_add[0].":00";

$byc_sameday_alert_hours=1;

$byc_curtime_alert_remove_hour = date("H:i",strtotime("-".$byc_sameday_alert_hours. "hour", strtotime($serviceing_end_time)));

$serviceing_alert_time = strtotime($byc_curtime_alert_remove_hour);

$bycwooptt_wp_curtime_alert = strtotime($bycwooptt_wp_curtime);

if($serviceing_alert_time<=$bycwooptt_wp_curtime_alert){

if(get_option('byconsolewooptt_product_sameday_cutoff_lable')==''){

echo '<p style="color:red; margin:0;">'.esc_html_e('Hurry up! Ordering time for today is ending in less than an hour!','product-delivery-date-time-for-woocommerce').'</p>';

}else{

echo '<p style="color:red; margin:0;">'.esc_html(get_option('byconsolewooptt_product_sameday_cutoff_lable')).'</p>';		

}

$start  = date("g:iA", strtotime($bycwooptt_wp_curtime1));	

}else{	

$start  = date("g:iA", strtotime($bycwooptt_wp_curtime1));	

}

}else{

$start  = date("g:iA", strtotime($serviceing_start_time));

}

$serviceing_end_time1=sanitize_text_field($_POST['bycwooptt_delivery_end_time']);

$end=date("g:iA", strtotime($serviceing_end_time1));

$breakTimeStart='12:00';

$breakTimeEnd='12:00';

if($serviceing_time_slot==''){

$duration=60;

}else{

$duration=$serviceing_time_slot;

}

?>

<select name="bycwooptt_pickup_delivery_time" id="bycwooptt_pickup_delivery_time" style="width:50%; padding:5px;">

<option value="0"><?php esc_html_e('~~select a time~~','product-delivery-date-time-for-woocommerce'); ?></option>

<?php foreach(generateTimeSlots($duration, $start, $end, $breakTimeStart, $breakTimeEnd ) as $slot ){ ?>

<option value="<?php esc_html_e($slot); ?>"><?php esc_html_e($slot); ?></option>

<?php } ?>

</select>

<?php 

wp_die();

}

?>