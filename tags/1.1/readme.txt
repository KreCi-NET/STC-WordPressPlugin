=== Subscribers Text Counter ===
Contributors: kreci
Donate link: http://recommended.by.kreci.net/paypal
Tags: twitter, rss, feedburner, counter, widget
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 1.1

FeedBurner rss subscribers and twitter followers raw text counter widget. Very easy to customize to your website design.

== Description ==

This plugin let you create your customized twitter followers and FeedBurner RSS subscribers counters. It creates widget
that can display these counters as raw text. You may customize widget design with your own HTML/CSS. It is as easy as
standard WordPress text widget but you can use `%twitter%` and `%feedburner%` tags to display your subscriber counters.

With this plugin you will not need any more third party buttons or scripts as it connects directly to FeedBurner
and twitter. This plugin should speed up your blog as counters are cached in your database and are refreshed no more
than once per 2 hours. With third party buttons every page load gets all counter data from external websites. It may
slow down your website a lot.

Additionally it is much easier to link to your accounts as you may use tags `%twitterlink%` and `%feedburnerlink%` to
put urls to your twitter profile and rss feed.

== Installation ==

1. Upload `subscribers-text-counter` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Activate 'Awareness API' through 'Publicize' tab on your FeedBurner account (required only if you want RSS counter)
4. Update your FeedBurner feed name and twitter handle through the 'Settings/Subscriber Text Counter' menu in WordPress
   and click Refresh to load counters
5. Put 'Subscriber Text Counter' widget on your sidebar through 'Appearance/Widgets' menu in WordPress
6. Optionally you may customize widget text and title. Use `%twitter%` and `%feedburner%` tags to display counters and
   `%twitterlink%` and `%feedburnerlink%` to display links (you don't have to use all tags)

== Frequently Asked Questions ==

= Won't this plugin slow down page loading of my blog =

No as all data is saved in database and refreshed only once per 2 hours

== Screenshots ==

1. Sample customized widget in action
2. Plugin configuration page
3. Widget configuration window

== Changelog ==

= 1.1 =
* If twitter or FeedBurner API return error, counters keep old value instead of 'N/A' message
* Improved plugin compatibility
* Improved error handling
* Optimized code

= 1.0.1 =
* Increased counter update interval

= 1.0 =
* First Release

== Upgrade Notice ==

= 1.1 =
Upgrade to this version to avoid displaying 'N/A' message instead of counter

= 1.0.1 =
You should upgrade to this version to avoid FeedBurner API lock

= 1.0 =
First stable release. Any beta versions should be upgraded immiedietly.