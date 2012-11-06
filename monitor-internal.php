<?php
/*
 * This file is called by WordPress during the parse_request action
 * WordPress has been initialised and so the DB and other features are operational
 */

echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">';
echo '<html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
echo '<title>' . esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . __('Site Internal Monitoring Page', 'pgeek-mon') .'</title>';
echo '</head>';
echo '<body>';
echo '<p>' . __('This is a page that exists purely to be the target of website monitoring programs', 'pgeek-mon') .'</p>';
$siteLink = '<a href="' . home_url( '/' ) .'" title="'. esc_attr( get_bloginfo( 'name', 'display' ) ).'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>';
echo '<p>' . sprintf(__('If you are seeing this page then a number of important core components of the %s website are working', 'pgeek-mon'), $siteLink ). '</p>';
echo '<p>' . sprintf(__('The current time is %s', 'pgeek-mon') , date("r") ) . '</p>';
echo '</body>';
echo '</html>';



?>