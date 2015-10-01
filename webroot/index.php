
<?php
/*
 * index.php
 * Simple code example to show how Clog can work. Also see src/Test/Test.php to see where the timestamps are made.
 */


//MAKE SURE ERRORS ARE SHOWN... MIGHT WANT TO TURN THIS OFF ON A PUBLIC SERVER
error_reporting(E_ALL);
ini_set('display_errors', 'On');
require_once('../autoloader.php');

$Clog = new Eden\Log\Clog();

$testLogger = new Eden\Test\Test(4, 2, $Clog);

$test1 = $testLogger->test1();
$test2 = $testLogger->test2();

$log = $Clog->renderLog();
?>

<!doctype html>
<html>
<head>
<meta charset=utf8>
<title>Simple Clog example</title>
</head>
<body>
<h1>Clog is up and running</h1>
<p><?php echo $test1 ?></p>
<p><?php echo $test2 ?></p>
<?php echo $log ?>
</body>
</html>
