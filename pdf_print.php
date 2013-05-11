<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<title>RT Camp assignment</title>
</head>
	<body>
		<div id="wrapper">
<?php include('includes/header.php'); ?>
<div id="content">
<?php
$rss_url = "http://devilsworkshop.org/feed/";
if (isset($rss_url)) {
$content = file_get_contents($rss_url); 
try { $rss = new SimpleXmlElement($content); }
catch(Exception $e){ /* the data provided is not valid XML */ return false; }
$rss_split = array();
$i = 0;
echo "<h1>".$rss->channel->title."</h1>";
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
foreach($rss_split[$i] as $key => $value)
    {
	if ($key == "title") {echo "<p><div><h2>".$value."</h2></div>";}
	if ($key == "image") {echo "<div><img src='".$value."'></div></p>";}
    }
}
}
?>
 </div><!-- end #content -->
<?php include('includes/footer.php'); ?>
		</div> <!-- End #wrapper -->
	</body>
</html>
