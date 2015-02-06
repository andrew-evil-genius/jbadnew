<h1>
<?php echo $_SESSION["user"]; ?>
</h1>
<br>
<ul>
<?php if (checkRole("admin")): ?>
	<li> Administrator </li>
<?php endif; ?>
	<li> Campaign: <?php echo $_SESSION["curr_campaign"]; ?>
</ul>