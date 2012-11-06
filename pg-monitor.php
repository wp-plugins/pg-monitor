<?php
/*
Plugin Name: PG Monitor
Plugin URI: http://www.peoplesgeek.com/plugins/pg-monitor/
Description: This plugin provides a virtual target for your monitoring services that does not invoke other plugins (specifically avoiding the google analytics plugins so that your statistics are not skewed by monitoring calls)<br/>The two targets provided for the monitoring service are:<br/><a href="/monitor.htm">monitor.htm</a> - via .htaccess and does not use WordPress (but does use PHP)<br/><a href="/monitorWP.htm">monitorWP.htm</a> - via WP and so tests the Database etc is working<br/>
Author: PeoplesGeek
Version: 1.1.0
Author URI: http://www.peoplesgeek.com

with the assistance of an article in http://wordpress.stackexchange.com/questions/9870/how-do-you-create-a-virtual-page-in-wordpress
*/

load_plugin_textdomain( 'pgeek-mon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

add_action( 'init', 'pgeek_mon_init_external' );
function pgeek_mon_init_external()
{
    global $wp_rewrite;
    $plugin_url = plugins_url( 'monitor-external.php', __FILE__ );
    $plugin_url = substr( $plugin_url, strlen( home_url() ) + 1 );
    // The pattern is prefixed with '^'
    // The substitution is prefixed with the "home root", at least a '/'
    // This is equivalent to appending it to `non_wp_rules`
    $wp_rewrite->add_external_rule( 'monitor.htm$', $plugin_url );
}


add_action( 'init', 'pgeek_mon_init_internal' );
function pgeek_mon_init_internal()
{
    add_rewrite_rule( 'monitorWP.htm$', 'index.php?pgeek_monitor_called=1', 'top' );
}

add_filter( 'query_vars', 'pgeek_mon_query_vars' );
function pgeek_mon_query_vars( $query_vars )
{
    $query_vars[] = 'pgeek_monitor_called';
    return $query_vars;
}

add_action( 'parse_request', 'pgeek_mon_parse_request' );
function pgeek_mon_parse_request( &$wp )
{
    if ( array_key_exists( 'pgeek_monitor_called', $wp->query_vars ) ) {
        include 'monitor-internal.php';
        exit();
    }
    return;
}

register_activation_hook(__FILE__, 'pgeek_mon_activation');
function pgeek_mon_activation(){
	pgeek_mon_init_external();
	pgeek_mon_init_internal();
	flush_rewrite_rules(TRUE);
}

register_deactivation_hook(__FILE__, 'pgeek_mon_deactivation');
function pgeek_mon_deactivation(){
	add_action('generate_rewrite_rules', 'pgeek_mon_delete_ext_rule' );
	flush_rewrite_rules(TRUE);
}
/**
 * 
 * This function is only used in the deactivation hook to remove the entry from .htaccess as the rules are rewritten
 * @param unknown_type $rewrite_rules is a passed instance of $wp_rewrite from the add_action('generate_rewrite_rules'...
 */
function pgeek_mon_delete_ext_rule( $rewrite_rules ){
	//There is no method to remove a rule once added so we have to change the internal variable
	$trimedrules = array();
	foreach ( (array) $rewrite_rules->non_wp_rules as $match => $query) {
		if ($match != 'monitor.htm$' )
		$trimedrules[$match]=$query;
	}
	$rewrite_rules->non_wp_rules = $trimedrules;
}

