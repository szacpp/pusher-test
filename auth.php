<?php 
session_start();
require __DIR__ . '/vendor/autoload.php';

$socket_id = $_POST['socket_id'];
$channel_name = $_POST['channel_name'];
  
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
  //$auth = $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id']);
  //echo $auth;
  //Any data you want to send about the person who is subscribing
$username = $_GET['username'];
$_SESSION['username'] = $username;
$_SESSION['userid'] = md5(time() . '_' . $username . '_' . session_id());
$presence_data = array(
    'username' => $_SESSION['username']
);
 
echo $pusher->presence_auth(
    $channel_name, //the name of the channel the user is subscribing to 
    $socket_id, //the socket id received from the Pusher client library
    $_SESSION['userid'],  //a UNIQUE USER ID which identifies the user
    $presence_data //the data about the person
);
exit();
  
?>