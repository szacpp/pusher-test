<?php 
require __DIR__ . '/vendor/autoload.php';


  
  $options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '0c145819fd68522617a7',
    '0bfab6280425b25bd344',
    '1107265',
	
    $options
  );
  $auth = $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
  echo $auth;
  
?>