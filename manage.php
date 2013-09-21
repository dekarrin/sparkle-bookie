<?php require 'include/common.php'; ?>
<?php require 'include/lib/page_manage.php'; ?>
<?php $page = get_page_variables(); ?>
<html>
	<head>
		<title>Sparkle Bookie :: Management</title>
<?php include 'include/template/head.html'; ?>
	</head>
	<body>
<?php include 'include/template/navbar.html'; ?>
		<hr />
		<div id="sidebar">
			<ul>
				<li><a href="manage.php?tab=home" class="<?php echo get_section_display_class('home'); ?>">Management</a></li>
				<li><a href="manage.php?tab=account" class="<?php echo get_section_display_class('account'); ?>">Accounts</a></li>
				<li><a href="manage.php?tab=owner" class="<?php echo get_section_display_class('owner'); ?>">Owners</a></li>
			</ul>
		</div>
		<div id="main">
			<h2><?php echo $page['section']; ?>Management</h2>
			<p><?php echo $page['intro'];?></p>
<?php
if ($page['tab'] != 'home') {
?>
			<hr />
<?php
	if ($page['has_items']) {
		$type = $page['item_type'];
?>
			<table>
				<caption>Current <?php echo $page['item_type_plural']; ?></caption>
				<tr>
					<th><!-- Delete column -->&nbsp;</th>
					<th>Name</th>
					<th><!-- Edit column-->&nbsp;</th>
				</tr>
<?php
		foreach ($page['items'] as $item) {
			$id = $item['id'];
			$name = $item['name'];
?>
				<tr>
					<td><a href="submit.php?action=delete&type=<?php echo $type; ?>&id=<?php echo $id; ?>">X</a></td>
					<td><?php echo $name; ?></td>
					<td><a href="edit.php?type=<?php echo $type; ?>&id=<?php echo $id; ?>">Edit</a></td>
				</tr>
<?php
		}
?>
			</table>
<?php
	} else {
?>
			<p class="no_items">There are currently no <?php echo $page['item_type_plural']; ?>.</p>
<?php
	}
?>
	<a href="submit.php?action=create&type=<?php echo $type; ?>">Add</a>
<?php
}
?>
		</div>
	</body>
</html>
