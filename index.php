<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<title>RT Camp assignment</title>
	</head>
	<body>
		<div id="wrapper">
<?php include('includes/header.php'); ?>
<?php include('includes/nav.php'); ?>
<div id="content">
<form action="rss_read.php" method="post">
		Feed URL: <input type="text" value="http://devilsworkshop.org/feed/" style="width:200px" name="rss_url"> <br/>
		<input type="submit">
	</form>
</div> <!-- end #content -->
<?php include('includes/sidebar.php'); ?>
<?php include('includes/footer.php'); ?>
		</div> <!-- End #wrapper -->
	</body>
</html>
