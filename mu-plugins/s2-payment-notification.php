<?php
    add_action('init', 's2_payment_notification'); 
    
    function s2_payment_notification()
    {
    if(!empty($_GET['s2_payment_notification'])) // what was used on notification url.
    {
    if(!empty($_GET['access']) && !empty($_GET['ip'])) // Will use this two values.
    {
    
     $useimR = $_GET['access'];
     $userIP = $_GET['ip'];

file_put_contents(WP_CONTENT_DIR.'/plugins/s2member-logs/links.log', $useimR."\n", FILE_APPEND);
file_put_contents(WP_CONTENT_DIR.'/plugins/s2member-logs/ip.log', $userIP."\n", FILE_APPEND);


   
   
    }
    
    exit; // We can exit here. 
    }
    
    }
    
    
add_shortcode( 'sps2', 'sps2_function' );

function sps2_function( $atts ) {


//Only For Logs
//var_dump($iptrimmed);

//echo end($trimmed)."\n"; 

//echo end($iptrimmed)."\n"; 
//Only For Logs

    $a = shortcode_atts( array(
        'name' => 'No Thanks!',
        'id' => 21242,
        'error' => 'NOT AVAILABLE',
      ), $atts );



$trimmed = file(WP_CONTENT_DIR.'/plugins/s2member-logs/links.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$iptrimmed = file(WP_CONTENT_DIR.'/plugins/s2member-logs/ip.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

/*Use 'Only For Logs' Here*/
if (end($iptrimmed)==$_SERVER["REMOTE_ADDR"]) {
  
  return "<a id='".$a['id']."' href='".end($trimmed)."'>".$a['name']."</a>";

} else {

  return $a['error'];

}

}

