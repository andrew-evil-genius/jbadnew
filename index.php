<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
require_once "db/db.php";
require_once "common/functions.php";

session_start();
$debug = true;
$authorized = array_key_exists("username", $_SESSION) ? true : false;
$roles = array_key_exists("roles", $_SESSION) ? $_SESSION["roles"] : "";
$flash = array_key_exists("flash", $_SESSION) ? $_SESSION["flash"] : false;
$page = filter_input(INPUT_GET, "page") == null ? "home" : filter_input(INPUT_GET, "page");
$sidebar = filter_input(INPUT_GET, "side") == null ? $page."_sidebar" : filter_input(INPUT_GET, "side");
$nav = filter_input(INPUT_GET, "nav") == null ? $page : filter_input(INPUT_GET, "nav");
$widget_style = "classic";

?>
<!-- Header -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>JB Advertising</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/main-style.css" type="text/css" />
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="js/jqwidgets/styles/jqx.<?php echo $widget_style; ?>.css" type="text/css" />
    <link rel="stylesheet" href="css/dropzone.css" type="text/css" />
    <script type="text/javascript" src="js/jquery/jquery.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxwindow.js"></script>
    <script type="text/javascript" src="js/jqwidgets/jqxvalidator.js"></script>
</head>
<body>
    <div id="container">
	<div id="header">
            <h1><a href="#">JB Advertising</a></h1>
            <h3>Campaign Management System</h3>
  	</div>
  
<!-- Start Main Navigation -->
  	<ul id="nav">
            <li><a href="index.php"  <?php echo checkActiveLink("home", $page); ?>>Home</a></li>
<?php 
    if ($authorized) {
        require_once("home/home_navigation.php");
	echo "<li><a href='db/logout.php'>Logout</a></li>";
    }
?>
	</ul>
  	<br class="clear" />
<!-- End Main Navigation -->
  
<!-- Start Sidebar -->
  	<div id="sidebar">
<?php 
if ($authorized) {
    require_once "$nav/$sidebar.php";
} else {
    require_once "login/login_sidebar.php"; 
}
	
if ($debug): ?>
        <div id="sidebar_bottom"></div>
<?php endif; ?>
 	</div>
<!-- End Sidebar -->  
  		
<!-- Start Content -->
  	<div id="content">
<?php 
if ($authorized) {
    require_once "$nav/$page.php";
} else {
    require_once "login/login.php"; 
}
?>
  	</div>
    </div>
<!-- End Content -->
	
<!-- Start Footer -->
    <div id="footer">
        <p> Site created by <a href="http://andrewcooperonline.com">Andrew Cooper.</a>.<br>
        &copy; 2014 JB Advertising Ventures </p>
    </div>
<!-- End Footer -->

    <div id="dialog">
        <div>
            Dialog Window
        </div>
        <div>
            <div id="dialog_content">
                Please click "OK", "Cancel" or the close button to close the modal window. 
            </div>
            <div>
            <div style="float: right; margin-top: 15px;">
                <input type="button" id="ok" value="OK" style="margin-right: 10px" />
                <input type="button" id="cancel" value="Cancel" />
            </div>
            </div>
        </div>
    </div>

<!-- Start index.php javascript -->
    <script content-type="text/javascript">
	var userRoles = "<?php echo $roles; ?>";
        
	$(document).ready(function() {
            if (typeof(contentReady) !== "undefined") {
                contentReady();
            }

            createDialog();
	});

	function createDialog() {
            $('#dialog').jqxWindow({
                theme: "<?php echo $widget_style; ?>", 
                maxHeight: 150, 
                maxWidth: 280, 
                minHeight: 30, 
                minWidth: 250, 
                height: 145, 
                width: 270,
                resizable: false, 
                isModal: true, 
                modalOpacity: 0.3,
                okButton: $('#ok'), 
                cancelButton: $('#cancel'),
                autoOpen: false,
                initContent: function () {
                    $('#ok').jqxButton({ width: '65px' });
                    $('#cancel').jqxButton({ width: '65px' });
                    $('#ok').focus();
                }
            });
        }

        function flash(text) {
            $("#sidebar_bottom").html(text);
            $("#sidebar_bottom").fadeIn(400);
            $("#sidebar_bottom").fadeOut(5000);
        }

        function checkRole(rolesToCheck) {
            if (rolesToCheck.indexOf(userRoles) > -1) return true;
            return false;
        }
    </script>
<!-- End index.php javascript -->
</body>
</html>

<?php 

// index.php PHP functions.

function checkActiveLink($link, $page) {
    if ($link == "home" && !$page) {
	return "class='active'";
    }
	
    if ($link == $page) {
	return "class='active'";
    }
    return "";	
}