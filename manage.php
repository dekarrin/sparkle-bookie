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
				<li><a href="manage.php?tab=category" class="<?php echo get_section_display_class('category'); ?>">Category</a></li>
				<li><a href="manage.php?tab=user" class="<?php echo get_section_display_class('user'); ?>">Users</a></li>
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
?>
			<table>
				<caption>Current <?php echo $page['item_type']; ?></caption>
				<tr>
					<th><!-- Deletion column -->&nbsp;</th>
					<th><?php echo $page['item_title']; ?></th>
					<th><!-- Actions column -->&nbsp;</th>
				</tr>
			</table>
<?php
	} else {
?>
			<p class="no_items">There are currently no <?php echo $page['item_type']; ?></p>
<?php
	}
}
?>
		</div>
	</body>
</html>
