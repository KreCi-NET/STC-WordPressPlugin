<?php
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
?>

<div class="wrap">

	<?php
	$options = options_subscribers_text_counter();
	$refresh = ( $_POST['stextcount_hidden'] == 'cache' ) ? 1 : 0;
	$counters = counters_subscribers_text_counter( $options, $refresh );
	if ( $_POST['stextcount_hidden'] == 'settings' ) {
		$options['feedburner'] = $_POST['feedburner'];
		$options['twitter']    = $_POST['twitter'];
		update_option( 'widget_subscribers_text_counter', $options );
	?>
	<div class="updated"><p><strong>Options saved.</strong></p></div>
	<?php
	}
	?>

	<h2>Subscribers Text Counter</h2>

	<div style="float: left; width: 400px;">
		<div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
				<input type="hidden" name="stextcount_hidden" value="settings">
				<h4>Settings</h4>
				<p>
					FeedBurner feed name:<br />
					<input type="text" name="feedburner" value="<?php echo $options['feedburner']; ?>" size="20"><br />
					<small>ex: "KreCiBlogger" if url is "http://feeds.feedburner.com/KreCiBlogger"</small><br />
					<small style="color: red;">You have to enable "Awareness API" for your feed at FeedBurner account under "Publicize" tab!</small>
				</p>
				<p>
					twitter handle:<br />
					<input type="text" name="twitter" value="<?php echo $options['twitter']; ?>" size="20"><br />
					<small>ex: "KreCiDev" if url is "http://www.twitter.com/KreCiDev"</small>
				</p>
				<p class="submit">
					<input type="submit" name="Submit" value="Update Options" />
				</p>
			</form>
		</div>
	
		<div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
				<input type="hidden" name="stextcount_hidden" value="cache">
				<h4>Cached data</h4>
				<p>
				  RSS Subscribers: <strong><?php echo $counters['feedburner']; ?></strong><br />
					Twitter followers: <strong><?php echo $counters['twitter']; ?></strong><br />
					Counters will be refreshed in: <strong><?php echo $counters['time']; ?> seconds</strong>
				</p>
				<p class="submit">
					<input type="submit" name="Submit" value="Refresh Now" />
				</p>
			</form>
		</div>
	</div>

	<div style="border: 1px solid #000; background-color: rgb(204, 204, 255); padding: 5px; width: 300px; float: left; margin: 50px 25px;">
		<strong>Happy with "Subscribers Text Counter"?</strong><br />
		Show your support with a donation:<br />
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post"> <input name="cmd" type="hidden" value="_donations" /> <input name="business" type="hidden" value="TSA3SY523BSQC" /> <input name="lc" type="hidden" value="US" /> <input name="item_name" type="hidden" value="KreCi.net" /> <input name="item_number" type="hidden" value="Subscribers text counter" /> <input name="currency_code" type="hidden" value="USD" /> <input name="bn" type="hidden" value="PP-DonationsBF:btn_donate_LG.gif:NonHosted" /> <input alt="PayPal - The safer, easier way to pay&lt;br /&gt; online!" name="submit" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" type="image" /><img src="https://www.paypal.com/pl_PL/i/scr/pixel.gif" border="0" alt="" width="1" height="1" /></form>
		<br />
		<strong>Do you need Wordpress developer?</strong><br />
		If you need PHP/Wordpress developer for any work related do your blog you may
		<a href="http://blog.kreci.net/contact-me/">contact me</a> with your job details.<br />
		<br />
		<strong>Author homepage:</strong> <a href="http://blog.kreci.net">Chris Kwiatkowski</a><br />
		<strong>Documentation:</strong> <a href="http://blog.kreci.net/code/wordpress/subscribers-text-counter-widget/">Plugin Homepage</a><br />
		<strong>Follow on twitter:</strong> <a href="http://www.twitter.com/KreCiDev">@KreCiDev</a><br >
	</div>

	<div style="clear: both;">
		<hr />
		<h2>Tips</h2>
		<ol>
			<li>To install counters on your sidebar you should go to 'Appearance/Widgets' menu.</li>
			<li>To make your website faster counters refresh no more than once per 2 hours.</li>
			<li>Waving an ax can be dangerous... :)</li>
		</ol>
	</div>

</div>
