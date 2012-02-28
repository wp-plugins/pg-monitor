<?php
/*
 * This file is called by WordPress during the parse_request action
 * WordPress has been initialised and so the DB and other features are operational
 */

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
echo '<html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">';
echo '<title>' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | Site Internal Monitoring Page</title>';
echo '</head>';
echo '<body>';
echo '<p>This is a page that exists purely to be the target of website monitoring programs</p>';
echo '<p>If you are seeing this page then a number of important core components of the <a href="'. home_url( '/' ) .'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ).'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a> website are working</p>';
echo '<p>The current time is ' . date("r") . '</p>';
echo '</body>';
echo '</html>';



?>