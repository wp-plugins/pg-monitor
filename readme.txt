=== PG Monitor ===
Contributors: peoplesgeek
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=EEEJAFQMKUQJG
Tags: monitor, uptime
Requires at least: 3.2
Tested up to: 3.4.2
Stable tag: 1.1.0

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

Use either www.example.com/monitor.htm or www.example.com/monitorWP.htm when you set up your monitoring service

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

1. The monitoring plugin showing the WordPress version of the target
2. The monitoring plugin showing the non WordPress version of the target

== ChangeLog ==

= 1.1.0 =
* Corrected problem where permalinks did not register on activation for the internal page
* Enabled i18n on the internal page (External page does not use WordPress so can't access WordPress translations)
* Changed charset from ISO-8859-1 to UTF-8 to fix problem with translations in the monitorWP.htm target file
* included POT files and an attempt at Spanish translation (I apologise for any errors and corrections / new languages are welcome)
* Translation on the external monitor.htm that does not use WordPress is coming if there is enough interest - I expect it is used less

= 1.0.1 =
* Correcting missing screenshots in repository

= 1.0.0 =
* Initial release

== Upgrade Notice ==

= 1.0 =
This initial version gets you started and keeps your root directory clear of monitoring files.