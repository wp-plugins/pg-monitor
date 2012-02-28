<?php
/*
 * This file is called by a .htaccess redirect.
 * It does not access any part of WordPress and so it can be seen even if the site is experiencing other issues such as database outages
 */
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
echo '<html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">';
echo '<title>PeoplesGeek Monitoring Page</title>';
echo '</head>';
echo '<body>';
echo '<p>This is a page that exists purely to be the target of website monitoring programs</p>';
echo '<p>If you are seeing this page then .htaccess is being parsed by Apache and the redirects are working, but it does not prove any other parts of the website (such as your content) are available</p>';
echo '<p>To test further you should try to access the page for <a href="monitorWP.htm">WordPress monitoring</a></p>';
echo '</body>';
echo '</html>';
?>