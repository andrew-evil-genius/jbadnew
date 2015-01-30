<h1>
<?php echo $_SESSION["user"]; ?>
</h1>
<br>
<ul>
<?php if ($_SESSION["admin"]) { ?>
	<li> Administrator </li>
<?php } ?>
	<li> Campaign: <?php echo $_SESSION["curr_campaign"]; ?>
</ul>