=== Subscribers Text Counter ===
Contributors: kreci
Donate link: http://r.kreci.net/paypal
Tags: twitter, rss, facebook, youtube, wordpress, members, subscribers, followers, fans, counter, widget
Requires at least: 2.8
Tested up to: 3.5.2
Stable tag: 1.7

Facebook fans, twitter followers, YouTube subscribers and WordPress members raw text counters to use as a widget,
in post/page content or in blog template. Very easy to customize to your website design. It makes your blog faster and more unique
than with external third party buttons/scripts.

== Description ==

This plugin let you create your customized twitter followers, Facebook fans, YouTube Subscribers,
WordPress members counters. It creates widget or let you display these counters as raw text anywhere in your template
or post/page content. You get it as a text so you may customize design with your own HTML/CSS. All design and icons
may be easily customized.

With this plugin you will not need any more third party buttons or scripts as it connects directly to
Facebook, twitter and YouTube APIs. This plugin should speed up your blog as counters are cached in your database
and are refreshed no more than once per 2 hours. With third party buttons every page load gets all counter data from
external websites that slow down you blog.

Quick howto:

1. To display counters use following tags: `twitter`, `facebook`, `youtube`, `wordpress`, `all`
2. To display links use following tags: `twitterlink`, `facebooklink`, `youtubelink`
3. In widget area use it like this: %twitter%
4. In post/page content use it like this: [stcounter type="twitter"]
5. In templates use it like this: <&#63;php echo stcounter('twitter') &#63;>

This plugin require PHP in version 5 or higher!

== Installation ==

1. Upload `subscribers-text-counter` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Update your setting with 'Settings/Subscriber Text Counter' menu in WordPress and click Refresh to load counters
   (to set all counters read the instructions on settings page)
4. You may put 'Subscriber Text Counter' widget on your sidebar through 'Appearance/Widgets' menu in WordPress
5. Display your counters as described on top of 'Settings/Subscriber Text Counter' page

== Frequently Asked Questions ==

= Why counters refresh only once per 2 hours? =

To speed up your website and to avoid bans for to many API calls.

= My links are not working after upgrade =

Please refresh counters with "Refresh Counters Now" on "Settings/Subscribers Text Counter" page

= What is `all` counter? =

It displays sum of all your subscribers counters

== Screenshots ==

1. Widget in action (with default template)
2. Part of plugin configuration page
3. Widget configuration window

== Changelog ==

= 1.7 =
* Fixed twitter counter (please update your settings!)
* Removed depracted Feedburner support

= 1.6.4 =
* Fixed ID of widget to keep it compatible with your previous CSS

= 1.6.2 =
* Updated depracted code

= 1.6.1 =
* Fixed default new look (closed tag)

= 1.6 =
* easier Facebook integration (only handle/id required)
* added WordPress Members counter
* added YouTube counter
* new twitter, youtube and other icons
* fixed twitter counter
* fixed feedburner counter
* display settings screen only to admin

= 1.5.4 =
* Fixed update problem with `all` counter - you don't have to reset plugin anymore

= 1.5.3 =
* Fixed `all` counter in widget

= 1.5.2 =
* New counter `all` that is showing summ of all subscribers
* Fixed reset of the counter when your account data is removed from settings

= 1.5.1 =
* Fixed cache (counters have been showing 0 on fetch error - fixed to show last correct value)
* Fixed title display when it had special character

= 1.5 =
* Counters may be used outside of the widget (template and post/page content)

= 1.4 =
* Better looking default template
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

= 1.6.4 =
Fixed ID of widget to keep it compatible with your previous CSS

= 1.6.2 =
Updated depracted code

= 1.6.1 =
One small bug fix (closed tag)

= 1.6 =

Mandatory update! Many bug fixes and new features!

= 1.5.4 =
One bug fix (1.5.2 => 1.5.3 update problem)

= 1.5.3 =
One bug fix

= 1.5.2 =
One bug fix and one new feature

= 1.5.1 =
Two no critical bug fixes

= 1.5 =
Should be upgrade to use counters outside of the widget area

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
