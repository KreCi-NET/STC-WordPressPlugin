<?php
/*  Copyright 2012  Chris Kwiatkowski  (email : kreci@kreci.net)

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
$nonce_field = wp_nonce_field( 'subscribers_text_counter_update', 'subscribers_text_counter_nonce' );

// Check if sending data and valid nonce
$stcHidden = ( isset( $_POST['stextcount_hidden'] ) 
			&& wp_verify_nonce( $_POST['subscribers_text_counter_nonce'], 'subscribers_text_counter_update' ) )
					? $_POST['stextcount_hidden']
					: "nada";

$reset = ( $stcHidden == 'reset' ) ? 1 : 0;
$options = options_subscribers_text_counter( $reset );
$refresh = ( $stcHidden == 'cache' ) ? 1 : 0;
$counters = counters_subscribers_text_counter( $options, $refresh );

if ( $stcHidden == 'settings' ) {
	//$options['feedburner'] = $_POST['feedburner'];
	$options['twitter']    = $_POST['twitter'];
	$options['twitterk']   = $_POST['twitterk'];
	$options['twitters']   = $_POST['twitters'];
	$options['twittert']   = $_POST['twittert'];
	$options['twitterts']   = $_POST['twitterts'];
	//$options['facebook']   = $_POST['facebook'];
	$options['youtube']    = $_POST['youtube'];
	$options['wordpress'] = ( $_POST['wordpressCheckBox'] == '1' ) ? 1 : 0;
	//$options['facebookk']   = $_POST['facebookk'];
	//$options['facebooks']   = $_POST['facebooks'];
	update_option( 'widget_subscribers_text_counter', $options );
	?>
	<div class="updated"><p><strong>Options saved.</strong></p></div>
	<?php
}
$checked = ($options['wordpress']) ? "checked=\"checked\"" : "";
?>

	<h2>Subscribers Text Counter <?php echo STCVERSION; ?></h2>

	<div style="width: 600px;">
		<div>
		
            	<div style="background-color: #DFF2BF; padding: 10px 10px 10px 10px; margin: 3px; border: 2px solid green;">
                                        <strong>Please Donate</strong>
                                        <p>
						If you find this plugin useful I would be very glad for any amount donations!
						</p><p>
						Via PayPal:<br />
						<a href="http://r.kreci.net/paypal"><img style="margin: 15px 0 0 0;" src="<?php echo STCURL; ?>/paypal.gif"></a>
                                        </p>
                        Your donations motivate me to maintain and expand this plugin!
                </div>
                		
			<div style="float: left; width: 590px; padding: 0 10px 0 5px;">
			<p>
				<strong>Quick howto:</strong>
				<ol style="font-size: 12px;">
					<li>To make your website faster and avoid bans, counters refresh no more than once per 2 hours</li>
					<li>If you don't need all counters, just leave the settings fields empty</li>
					<li>To install counters on your sidebar you should go to 'Appearance/Widgets' menu</li>
					<li>To display counters use following tags: <strong>'twitter', 'youtube', 'wordpress', 'all'</strong></li>
					<li>To display links use following tags: <strong>'twitterlink', 'youtubelink'</strong></li>
					<li>In widget area use tags like this: <strong>%twitter%</strong></li>
					<li>In post/page content use tags like this: <strong>[stcounter type="twitter"]</strong></li>
					<li>In templates use tags like this: <strong><&#63;php echo stcounter('twitter') &#63;></strong></li>
				</ol>
			</p>
			</div>

			<div style="clear: both;">
				<br />
			</div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
			<input type="hidden" name="stextcount_hidden" value="settings">
			<?php echo $nonce_field; ?>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>twitter settings</strong><br />
					<p>
                                                <div style="color: red; font-size: 12px;">
                                                To get your consumer key, secret and token key and secret you need to:
                                                <ol style="padding: 5px 0 0 0; font-size: 12px; color: red;">
                                                        <li>Go to <a href="https://dev.twitter.com/apps">https://dev.twitter.com/apps</a> and login with your twitter credentials</li>
                                                        <li>Create a new application & project</li>
                                                        <li>Fill in the simple form (use your website name)</li>
                                                        <li>Copy & paste key, secret, token & token secret</li>
                                                </ol>
                                                </div>
					</p>
					Consumer key:
					<input type="text" name="twitterk" value="<?php echo $options['twitterk']; ?>" size="20"><br />
					Consumer secret:
					<input type="text" name="twitters" value="<?php echo $options['twitters']; ?>" size="20"><br />
					Access token:
					<input type="text" name="twittert" value="<?php echo $options['twittert']; ?>" size="20"><br />
					Access token secret:
					<input type="text" name="twitterts" value="<?php echo $options['twitterts']; ?>" size="20">
				</div>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>YouTube settings</strong><br />
					<p />
					YouTube username:
					<input type="text" name="youtube" value="<?php echo $options['youtube']; ?>" size="20"><br />
					<small>ex: "KreCiBlogger" if url is "<a href="http://www.youtube.com/user/KreCiBlogger" target="_blank">http://www.youtube.com/user/KreCiBlogger</a>"</small>
				</div>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>WordPress members settings</strong><br />
					<p />
					<input type="checkbox" name="wordpressCheckBox" value="1" <?php echo $checked; ?> /> Count WordPress members<br />
					<small>If you tick the checkbox, counter %wordpress% will be available and sum added to %all% counter</small>
				</div>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>Feedburner</strong><br />
					<p>
                        <div style="color: red; font-size: 12px;">
                        Sorry but Feedburner is no longer supported due new Google policy!<br />You may generate counter button at you Feedburner account.
                        </div>
					</p>
				</div>
				<p class="submit" style="text-align: right;">
					<input type="submit" name="Submit" value="Update Settings" />
				</p>
			</form>
		</div>
		<div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
				<input type="hidden" name="stextcount_hidden" value="cache">
				<?php echo $nonce_field; ?>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>Cached data</strong>
					<p>
						<?php
						 /*RSS Subscribers: <strong><?php echo $counters['feedburner']; ?></strong><br />*/
						?>
						twitter followers: <strong><?php echo $counters['twitter']; ?></strong><br />
						YouTube fans: <strong><?php echo $counters['youtube']; ?></strong><br />
						WordPress members: <strong><?php echo $options['wordpress'] ? $counters['wordpress'] : "N/A"; ?></strong><br />
						All subscribers: <strong><?php echo $counters['all']; ?></strong><br />
						Counters will be refreshed in: <strong><?php echo $counters['time']; ?> seconds</strong>
					</p>
				</div>
				<p class="submit" style="text-align: right;">
					<input type="submit" name="Submit" value="Refresh Counters Now" />
				</p>
			</form>
		</div>
                <div>
                        <form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
                                <input type="hidden" name="stextcount_hidden" value="reset">
								<?php echo $nonce_field; ?>
                                <div style="background-color: #E8CFCF; padding: 10px; margin: 2px; border: 1px solid red;">
                                        <strong>Reset settings</strong>
                                        <p>
						Push button under this box to reset settings & widget area to default values.<br />
						Be warned that this operation can not be undone!
                                        </p>
                                </div>
                                <p class="submit" style="text-align: right;">
                                        <input type="submit" name="Submit" value="Reset" />
                                </p>
                        </form>
                </div>
                
	</div>

	<div style="width: 600px;">
		<div style="float: left; margin: 0 0 10px 0;">
			<?php get_feed_subscribers_text_counter("http://feeds.kreci.net/KreCiBlogger"); ?>
		</div>
		<div style="float: left;">

		<div style="border: 1px solid #000; background-color: rgb(204, 204, 255); padding: 5px; width: 300px; margin: 15px 0 10px 10px;">
			<strong>Author homepage:</strong> <a href="http://www.kreci.net">Chris Kwiatkowski</a><br />
			<strong>Documentation:</strong> <a href="http://www.kreci.net/code/wordpress/subscribers-text-counter-widget/">Plugin Homepage</a><br />
			<strong>GitHub:</strong> <a href="https://github.com/KreCi-NET/STC-WordPressPlugin">Plugin code</a><br />
			<strong>Facebook:</strong> <a href="http://facebook.com/IndependentDevelopment">Independent Development</a><br />
			<strong>twitter:</strong> <a href="http://www.twitter.com/KreCiDev">@KreCiDev</a><br /><br />
			<strong>Social Icons Design:</strong> <a href="http://www.instantshift.com/2010/12/07/socialshift-icon-set-246-free-social-networking-icons/">Manuel López</a> (thanks!)<br />
		</div>
		</div>
	</div>
</div>
