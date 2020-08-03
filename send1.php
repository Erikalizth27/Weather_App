<?php
require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
$connection = new AMQPStreamConnection('localhost',5672, 'guest', 'guest');
$channel = $connection->channel();
$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Somebody Login to the APP');
$channel->basic_publish($msg, '', 'hello');

//echo " [x] Sent 'Somebody Login to the APP'\n";
//$channel->close();
//$connection->close();


require_once('connection.php');
require_once('login.php');
$email = $_POST['email'];
$pass = $_POST['password'];
$hashed = sha1($pass);
if ($_POST){
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$hashed'";
    $result = $con->query($sql);
    if ($result->fetch_array()){
        // "ok";
        header('Location: loggedin.php');
    } else {
        header('Location: login.php?sent=true');
    }
}
$con->close();

?>
