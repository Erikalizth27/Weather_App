<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
$connection = new AMQPStreamConnection('172.20.10.9',5672, 'erika', 'erika');
$channel = $connection->channel();

$channel->queue_declare('hello', false, false, false, false);


 

echo " [*] Waiting for messages. To exit press CTRL+C\n";
$callback = function ($msg) {
    
     
    echo ' [x] Received:', $msg->body, "\n";
    
    
  };
  
  $channel->basic_consume('hello', '', false, true, false, false, $callback);
  
  while (count($channel->callbacks)) {
    $channel->wait();
    
    
  }
        

    

  $con->close();

?>
