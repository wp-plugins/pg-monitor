<?php
/*
 * This file is executed during uninstall and does a last refresh of the redirects to ensure all traces are gone
 */

//If uninstall is not called from WordPress then exit
if( !defined( 'WP_UNINSTALL_PLUGIN') )
	exit();
	
// Refresh the redirection tables and .htaccess file
flush_rewrite_rules(TRUE);

?>