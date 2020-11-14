<?php 
require __DIR__ . '/vendor/autoload.php';


  
  $options = array(
    'cluster' => 'ap2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'b30844e740b312ff5290',
    'ff26023b253b780392b2',
    '1107230',
	
    $options
  );
  $auth = $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
  echo $auth;
  
?>