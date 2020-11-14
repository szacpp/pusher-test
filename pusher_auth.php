<?php
//Start the session again so we can access the username and userid
session_start();
 
//include the pusher publisher library
require __DIR__ . '/vendor/autoload.php';
 
//These values are automatically POSTed by the Pusher client library
$socket_id = $_POST['socket_id'];
$channel_name = $_POST['channel_name'];
 
//You should put code here that makes sure this person has access to this channel
/*
if( $user->hasAccessTo($channel_name) == false ) {
    header('', true, 403);
    echo( "Not authorized" );
    exit();
}
*/
 
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
 
//Any data you want to send about the person who is subscribing
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