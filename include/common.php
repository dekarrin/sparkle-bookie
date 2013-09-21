<?php
require_once ('include/lib/config.php');
require_once ('include/lib/database.php');

$db = new Database($config['db']['host'] . ':' . $config['port']);
$db->connect($config['user'], $config['pass'], $config['db']);

// done with db config; clear it for security
$config = null;

require_once('include/queries.php');

require_once('include/lib/sparkle_bookie.php');
require_once('include/lib/input.php');
?>
