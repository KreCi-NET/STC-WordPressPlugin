=== Subscribers Text Counter ===
Contributors: kreci
Donate link: http://r.kreci.net/paypal
Tags: twitter, rss, feedburner, facebook, subscribers, followers, fans, counter, widget
Requires at least: 2.8
Tested up to: 2.9
Stable tag: 1.4

FeedBurner rss subscribers, Facebook fans and  twitter followers raw text counters widget. Very easy to customize to
your website design. It makes your blog faster and more unique than with external third party buttons/scripts.

== Description ==

This plugin let you create your customized twitter followers, Facebook fans and FeedBurner RSS subscribers counters.
It creates widget that can display these counters as raw text. You may customize widget design with your own HTML/CSS.
It is as easy as standard WordPress text widget but you can use `%twitter%`, `%facebook%` and `%feedburner%` tags to
display your counters.

With this plugin you will not need any more third party buttons or scripts as it connects directly to FeedBurner,
Facebook and twitter. This plugin should speed up your blog as counters are cached in your database and are refreshed
no more than once per 2 hours. With third party buttons every page load gets all counter data from external websites
that slow down you blog.

Additionally it is much easier to link to your accounts as you may use tags `%twitterlink%`, `%feedburnerlink%`,
`%feedburneremail` and `%facebooklink%` to put urls to your profiles and rss feeds.

This plugin require PHP in version 5 or higher!

== Installation ==

1. Upload `subscribers-text-counter` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Update your your setting with 'Settings/Subscriber Text Counter' menu in WordPress and click Refresh to load counters
   (to set all counters read the instructions on settings page)
4. Put 'Subscriber Text Counter' widget on your sidebar through 'Appearance/Widgets' menu in WordPress
5. Optionally you may customize widget text and title. Use `%twitter%`, `%facebook%` and `%feedburner%` tags to display
   counters and `%twitterlink%`, `%feedburnerlink%`, `%feedburneremail%` and `%facebooklink%` to display links (you
   don't have to use all tags)

== Frequently Asked Questions ==

= Why counters refresh only once per 2 hours? =

To speed up your website and to avoid bans for to many API calls.

= What are Facebook API and secret and how to get it? =

These are access keys to Facebook remote functions. It is described on the settings page how to get it.

== Screenshots ==

1. Widget in action (default template)
2. Part of plugin configuration page
3. Widget configuration window

== Changelog ==

= 1.4 =
* Better looking default template (see screenshot)
* New tags %facebooklink% and %feedburneremail%
* Possibility to reset plugin and template in settings panel
* Improved compatibility (with diffrent PHP configurations)

= 1.3 =
* Facebook fans counter added
* Some code clean up

= 1.2 =
* Optimized configuration page
* Some code clean up

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

= 1.4 =
New features and improved compatibility

= 1.3 =
New features and optimized configuration page

= 1.2 =
Optimized configuration page

= 1.1 =
Upgrade to this version to avoid displaying 'N/A' message instead of counter

= 1.0.1 =
You should upgrade to this version to avoid FeedBurner API lock

= 1.0 =
First stable release. Any beta versions should be upgraded immiedietly.
