<?php
require_once ('include/lib/config.php');
require_once ('include/lib/database.php');

$db = new Database($config['host'] . ':' . $config['port']);
$db->connect($config['user'], $config['pass'], $config['db']);

require_once('include/queries.php');

require_once('include/lib/sparkle_bookie.php');
require_once('include/lib/input.php');
?>
