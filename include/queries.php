<?php
$db->prepare('get_owner_count', 'SELECT COUNT(*) FROM Owners');
$db->prepare('get_all_owners', 'SELECT * FROM Owners');
$db->prepare('get_account_count', 'SELECT COUNT(*) FROM Accounts');
$db->prepare('get_all_accounts', 'SELECT * FROM Accounts');
?>
