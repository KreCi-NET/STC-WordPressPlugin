<?php
/*
Plugin Name: Subscribers Text Counter
Plugin URI: http://blog.kreci.net/code/wordpress/subscribers-text-counter-widget/
Description: Widget to show feedburner & twitter counters as text
Author: Chris Kwiatkowski
Version: 1.2
Author URI: http://blog.kreci.net/
*/

/*  Copyright 2010  Chris Kwiatkowski  (email : kreci@kreci.net)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

// Don't touch this or any line below
// unless you know exacly what you are doing
define( 'STCVERSION', '1.2' );
define( 'STCDIR', plugin_basename(dirname(__FILE__)) );
define( 'STCUPDATE', '7200' ); // You should not lower it as you can be banned by FeedBurner

function options_subscribers_text_counter() {
	$options = get_option( 'widget_subscribers_text_counter' );
	if (!is_array( $options )) {
		$options = array(
			'title'      => 'My subscribers:',
			'feedburner' => '',
			'twitter'    => '',
			'text'       => '<p>RSS subscribers: %feedburner%<br /><a href="%feedburnerlink%">Subscribe my feed</a></p>
			                 <p>Twitter followers: %twitter%<br /><a href="%twitterlink%">Follow me</a></p>'
		);
		add_option( 'widget_subscribers_text_counter_dynamic', $options );
	}
	return $options;
}

function counters_subscribers_text_counter( $options, $refresh = '0' ) {
	$counters = get_option( 'widget_subscribers_text_counter_dynamic' );
	if ( !is_array( $counters ) ) {
		$time = 0;
		$new = true;
	} else {
		$time = STCUPDATE + ( $counters['updated'] - time() );
		$new = false;
	}
	if ( $time <= 0 || $refresh ) {
		$rss_count = rss_count( $options['feedburner'] );
		$rss_count = ( $rss_count && !$new ) ? $rss_count : $counters['feedburner'];
		$followers_count = followers_count( $options['twitter'] );
		$followers_count = ( $followers_count && !$new ) ? $followers_count : $counters['twitter'];
		$counters = array(
			'updated'    => time(),
			'feedburner' => $rss_count,
			'twitter'    => $followers_count
		);
		$new ? add_option( 'widget_subscribers_text_counter_dynamic', $counters, '', 'yes' )
		     : update_option( 'widget_subscribers_text_counter_dynamic', $counters );
	  $time = STCUPDATE;
	}
	$counters['time'] = $time;
	return $counters;
}

function rss_count( $fb_id ) {
	try {
		@$xml = new SimpleXmlElement( 'https://feedburner.google.com/api/awareness/1.0/GetFeedData?uri=' . $fb_id, LIBXML_NOCDATA, TRUE );
		@$rss_count = ( string ) $xml->feed->entry['circulation'];
	} catch (Exception $e) {
		$rss_count = '0';
	}
	return $rss_count;
}

function followers_count( $twitter_id ) {
	try {
		@$xml = new SimpleXmlElement( 'http://twitter.com/users/show.xml?screen_name=' . $twitter_id, LIBXML_NOCDATA, TRUE );
		@$followers_count = ( string ) $xml->followers_count;
	} catch (Exception $e) {
		$followers_count = '0';
	}
	return $followers_count;
}

function text_subscribers_text_counter( $options ) {
	$counters = counters_subscribers_text_counter( $options );
	$text = stripslashes( $options['text'] );
	$text = str_replace( '%twitterlink%', 'http://www.twitter.com/'.$options['twitter'], $text );
	$text = str_replace( '%feedburnerlink%', 'http://feeds.feedburner.com/'.$options['feedburner'], $text );
	$text = str_replace( '%twitter%', $counters['twitter'], $text );
	$text = str_replace( '%feedburner%', $counters['feedburner'], $text );
	return $text;
}

function widget_subscribers_text_counter( $args ) {
	extract($args);
	$options = options_subscribers_text_counter();
	echo $before_widget;
	echo $before_title;
	echo $options['title'];
	echo $after_title;
	echo text_subscribers_text_counter( $options );
	echo $after_widget;
}

function control_subscribers_text_counter() {
	$options = options_subscribers_text_counter();   
	if ( $_POST['subscribers_text_counter-Submit'] ) {
		$options['title']      = htmlspecialchars( $_POST['subscribers_text_counter-Title'] );
		$options['text']       = $_POST['subscribers_text_counter-Text'];
		update_option( 'widget_subscribers_text_counter', $options );
	}
?>
	<p>
		<label for="subscribers_text_counter-Title">Title:</label><br />
		<input type="text" id="subscribers_text_counter-Title" name="subscribers_text_counter-Title" size="30" value="<?php echo $options['title'];?>" />
	</p>
	<p>
		<label for="subscribers_text_counter-Text">Your text:</label><br />
		<textarea id="subscribers_text_counter-Text" name="subscribers_text_counter-Text" rows="5" cols="25"><?php echo stripslashes( $options['text'] );?></textarea>
		<small>
		<p>
				You may use following tags:
				<ol>
					<li>%twitter% and %feedburner% to display counters</li>
					<li>%twitterlink% and %feedburnerlink% to insert links</li>
				<ol>
			</p>
		</small>
	</p>
	<input type="hidden" id="subscribers_text_counter-Submit" name="subscribers_text_counter-Submit" value="1" />
<?php
}

function get_feed_subscribers_text_counter( $feed_url ) {
  $content = file_get_contents( $feed_url );
  if ( $content ) {
    $x = new SimpleXmlElement( $content );
    echo '<ul style="background-color:#FFD953; font-size:10px; margin-left:0; padding:1px; width:240px;">';
    echo '<li style="list-style-image:none; list-style-position:outside; list-style-type:none; margin:0; padding:1px;">
						<a href="http://blog.kreci.net" target="_blank" style="background-color:#000000; color:#FFFFFF; display:block; padding:2px; text-decoration:none;">
							KreCi Development RSS FEED
						</a>
					</li>';
    foreach( $x->channel->item as $entry ) {
      echo "<li style='list-style-image:none; list-style-position:outside; list-style-type:none; margin:0; padding:1px;'><a href='$entry->link' title='$entry->title' target='_blank' style='background-color:#FFFFA4; display:block; padding:2px; text-decoration:none;'>$entry->title</a></li>";
    }
    echo '</ul>';
  }
}


function plugin_links_subscribers_text_counter($links, $file) {
	if ( $file == STCDIR.'/subscribers-text-counter.php' ) {
		$links[] = '<a href="options-general.php?page=subscribers_text_counter">' . __('Settings', 'Subscribers Text Counter') . "</a>";
		$links[] = '<a href="http://r.kreci.net/paypal">' . __('<strong>Donate</strong>', 'Subscribers Text Counter') . "</a>";
	}
	return $links;
}

function admin_subscribers_text_counter() {
	include( 'subscribers-text-counter-admin.php' );
}  

function admin_actions_subscribers_text_counter() {
	add_options_page( 'Subscribers Text Counter', 'Subscribers Text Counter', 1, 'subscribers_text_counter', 'admin_subscribers_text_counter' );
}

function subscribers_text_counter_init() {
	register_sidebar_widget( __('Subscribers Text Counter'), 'widget_subscribers_text_counter' );
	register_widget_control( 'Subscribers Text Counter', 'control_subscribers_text_counter' );
	add_action( 'admin_menu', 'admin_actions_subscribers_text_counter' );
	add_filter('plugin_row_meta', 'plugin_links_subscribers_text_counter', 10, 2);
}
add_action( 'plugins_loaded', 'subscribers_text_counter_init' );
?>
