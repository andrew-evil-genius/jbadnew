<h1>Login</h1>
<form action="db/login.php" method="POST">
	<input name="username" type="text" placeholder="Username" /><br><br>
	<input name="password" type="password" placeholder="Password" /><br><br>
	<input id="login_submit" type="submit" value="Login"/>
</form>

<script type="text/javascript" src="js/jqwidgets/jqxbuttons.js"></script>
<script type="text/javascript">
function contentReady() {
    $("#login_submit").jqxButton({ 
    	theme: "<?php echo $widget_style; ?>",
    	width: '150', 
    	height: '25'
    });
}
</script>