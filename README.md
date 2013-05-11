rtcamp_assignment
=================

PHP based web dev assignment for RTcamp.

=================
File Structure:

rtcode_php_feed
|-- css
|   `-- style.css
|-- img
|   |-- btns-next-prev.png
|   |-- pagination.png
|   `-- placeholder.png
|-- includes
|   |-- footer.php
|   |-- header.php
|   |-- nav.php
|   |-- sidebar.php
|   `-- WkHtmlToPdf.php
|-- index.php
|-- js
|   |-- jquery-latest.min.js
|   `-- jquery.slides.min.js
|-- pdf_print.php
|-- print_pdf.php
|-- README.md
|-- rss_read.php
`-- wkhtmltopdf-i386



===================
Usage:

On the first page, landing page, A user is prompted for feed url to be fed in, by default, 
the required url is taken up, http://devilsworkshop.org/feed.
Then rss_read.php will read url, validate and parse it. And display the posts as a jquery slideshow.
Below slideshow, there is a Print as PDF button that will
render another page with title and images of posts in the blog feed provided and print it as PDF, that gets downloaded.
Here, for generating PDF, wkhtmltopdf is used, and a binding PHP library is used - WkHtmlToPdf.php, 
which is located at includes folder.
For the assignment purpose, the pdf rendered is always that of the url - http://devilsworkshop.org/feed, 
as it is hardcoded.  Otherwise in a database managed website, the url can be stored and retrieved from the database.
