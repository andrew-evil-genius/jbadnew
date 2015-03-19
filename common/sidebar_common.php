<h1>
<?php echo $_SESSION["user"]; ?>
</h1>
<br>
<ul>
<?php if (checkRole("admin")): ?>
	<li> Administrator </li>
<?php elseif (checkRole("sales")): ?>
        <li> Sales </li>
<?php elseif (checkRole("collections")): ?>
        <li> Collections </li>
<?php endif; ?>        
	<li> Campaign: <span id="current_campaign"><?php echo $_SESSION["curr_campaign"]; ?></span>
</ul>