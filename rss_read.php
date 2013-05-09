<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<script src="js/jquery-latest.min.js"></script>
	<script src="js/jquery.slides.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

	<title>RT Camp assignment</title>
<script>
  $(function() {
    $('#slides').slidesjs({
      width: 940,
      height: 528,
      play: {
        active: true,
        auto: true,
        interval: 4000,
        swap: true,
        pauseOnHover: true,
        restartDelay: 2500
      }
    });
  });
</script>
</head>
<body>
	<div id="wrapper">
		<?php include('includes/header.php'); ?>
		<?php include('includes/nav.php'); ?>
		<div id="content">
		<div id='slides'>

<?php
	if (isset($_POST['rss_url'])) {
		$rss_url = $_POST['rss_url'];
		$content = file_get_contents($rss_url); 
		try { $rss = new SimpleXmlElement($content); }
		catch(Exception $e){ /* the data provided is not valid XML */ return false; }
		$rss_split = array();
		$i = 0;
		$placeholder = "img/placeholder.png";
		foreach ($rss->channel->item as $item) {
		  $title = (string) $item->title; // Title
		  $link = (string) $item->link; // Url Link            
		  $content = $item->children('content', true)->encoded;
		  preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $content, $image);
		  $image = substr($image['src'], 0, strpos($image['src'], '"'));
		  $rss_split[$i]['title'] = $title;
		  $rss_split[$i]['link'] = $link;
		  $rss_split[$i]['image'] = $image?$image:$placeholder;
		  $i++;
		}
		$number_of_posts = ($i<10)?$i:10;
		for ($i=0; $i<$number_of_posts; $i++) {
		  foreach($rss_split[$i] as $key => $value) {
			if ($key == "title") {echo "<li class='slide'><div>".$value."</div>";}
			if ($key == "image") {echo "<div><img style='height:350;width:675;' src='".$value."'></div></li>";}
		   }
		}
	}	
	//try { $print_pdf = shell_exec("./wkhtmltopdf-i386 http://localhost/rtcode_php_feed/pdf_print.php PdfOfBlog.pdf");}
	//catch(Exception $e){ /* Some problem with PDF creation */ return false; }
?>
</ul>
</div>
<br/><br/><br/><br/>
<center><form action="print_pdf.php" method="post">
	<input value="Print as PDF" type="submit">
</form></center>
</div><br/>

 <!-- end #content -->
<?php include('includes/sidebar.php'); ?>
<?php include('includes/footer.php'); ?>
		</div> <!-- End #wrapper -->

	</body>
</html>

