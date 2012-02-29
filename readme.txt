=== PG Monitor ===
Contributors: peoplesgeek
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EEEJAFQMKUQJG
Tags: monitor, uptime
Requires at least: 3.2
Tested up to: 3.3.1
Stable tag: 1.0.0

A virtual target file to be read by monitoring services instead of using a static HTML page.

== Description ==

Monitoring services like www.siteuptime.com or www.montastic.com require a page on your website to monitor.

This plugin provides a virtual target for your monitoring services that does not invoke other plugins (specifically avoiding the Google analytics plugins so that your statistics are not skewed by monitoring calls)
The two targets provided for the monitoring service are:

* monitor.htm - via .htaccess and does not use WordPress (but does use PHP)
* monitorWP.htm - via WP and so tests the Database etc is working

== Installation ==

* Upload the entire pg-monitor folder to your plugins directory
* Activate pg-monitor from the plugin page
* Refresh your permalink settings

Use either www.yourdomain.com/monitor.htm or www.yourdomain.com/monitorWP.htm when you set up your monitoring service

== Frequently Asked Questions ==

= Why do I get a page not found error =

Depending on your configuration you may need to visit the Permalink settings page and simply click save. This will refresh the permalink settings and the page will be found.
You may have to repeat this process if you disable or delete this plugin.

= Can I monitor WordPress and my host separately =

There are two virtual target files supplied that will appear as if they are in the root of your website (although there is no physical file there)

* monitor.htm  This file will be available even if WordPress is down (it does require PHP to be working)
* monitorWP.htm  This file uses much of the WordPress infrastructure and will return failure if there is a database connectivity issue (unlike the first file)

= Where do I see my monitoring results =

This plugin does not perform monitoring of your site - you need a monitoring service for this. You configure the external monitoring service to point to one of the two virtual files that this plugin creates.


== Screenshots ==

1. Typical page presented by the plugin. There is not much to see.

== ChangeLog ==

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
This initial version gets you started and keeps your root directory clear of monitoring files.