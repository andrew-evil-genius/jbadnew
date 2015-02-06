<li><a href="index.php?page=campaigns" <?php echo checkActiveLink("campaigns", $nav); ?>>Campaigns</a></li>
<li><a href="index.php?page=leads" <?php echo checkActiveLink("leads", $nav); ?>>Leads</a></li>
<!--<li><a href="index.php?page=messages" <?php echo checkActiveLink("messages", $nav); ?>>Messages</a></li>
<li><a href="index.php?page=account" <?php echo checkActiveLink("account", $nav); ?>>My Account</a></li> -->
<?php if (checkRole("admin")): ?>
    <li><a href="index.php?page=users" <?php echo checkActiveLink("users", $nav); ?>>Users</a></li>
    <!-- <li><a href="index.php?page=settings" <?php echo checkActiveLink("settings", $nav); ?>>Settings</a></li> -->
<?php endif; ?>