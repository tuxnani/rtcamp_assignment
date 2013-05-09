<?php
require_once('includes/WkHtmlToPdf.php');

$pdf = new WkHtmlToPdf;

// Add a HTML file, a HTML string or a page from a URL
$pdf->addPage($_SERVER['SERVER_NAME']."/rtcode_php_feed/pdf_print.php");
if(!$pdf->send('PdfOfBlog.pdf'))
          throw new Exception('Could not create PDF: '.$pdf->getError());
?>
