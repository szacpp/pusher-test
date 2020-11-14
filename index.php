<?php
  require __DIR__ . '/vendor/autoload.php';

 $options = array(
    'cluster' => 'us3',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '8b5a81058a97b180edc3',
    'f49c43a0bd075f4911d6',
    '1107253',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('my-channel', 'my-event', $data);
?>