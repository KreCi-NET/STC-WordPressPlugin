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
	$stcHidden = ( isset( $_POST['stextcount_hidden'] ) ) ? $_POST['stextcount_hidden'] : "nada";
	$reset = ( $stcHidden == 'reset' ) ? 1 : 0;
	$options = options_subscribers_text_counter( $reset );
	$refresh = ( $stcHidden == 'cache' ) ? 1 : 0;
	$counters = counters_subscribers_text_counter( $options, $refresh );
	if ( $stcHidden == 'settings' ) {
		$options['feedburner'] = $_POST['feedburner'];
		$options['twitter']    = $_POST['twitter'];
		$options['facebook']   = $_POST['facebook'];
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
						If you find this plugin useful I would be very glad for any amount donations!<br />
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
					<li>To display counters use following tags: <strong>'twitter', 'feedburner', 'facebook', 'youtube', 'wordpress', 'all'</strong></li>
					<li>To display links use following tags: <strong>'twitterlink', 'feedburnerlink', 'feedburneremail', 'facebooklink', 'youtubelink'</strong></li>
					<li>In widget area use tags like this: <strong>%twitter%</strong></li>
					<li>In post/page content use tags like this: <strong>[stcounter type="twitter"]</strong></li>
					<li>In templates use tags like this: <strong><&#63;php echo stcounter('twitter') &#63;></strong></li>
				</ol>
			</p>
			<p>
				<strong>Did you know?</strong>
				<ol style="font-size: 12px;">
					<li>You may change the look of the widget and icons at Appearance/Widget!</li>
					<li>You may find some great social bookmark icons and other design elements at <a href="http://refer.istockphoto.com/ta.php?lc=055869042431004653&atid=104295%7CBannerID%3D104295%7CReferralMethod%3DLink&url=http%3A%2F%2Fwww.istockphoto.com"><img src="http://refer.istockphoto.com/traffic_record.php?lc=055869042431004653&atid=104295%7CBannerID%3D104295%7CReferralMethod%3DLink" border="0"/>iStockphoto</a>!</li>
					<li>Don't know how to edit the widget design? <a href="http://recommended.by.kreci.net/freelancer">Hire a freelancer!</a></li>	
				</ol>		
			</p>
			</div>

			<div style="clear: both;">
				<br />
			</div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
			<input type="hidden" name="stextcount_hidden" value="settings">
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>twitter settings</strong><br />
					<p />
					twitter handle:
					<input type="text" name="twitter" value="<?php echo $options['twitter']; ?>" size="20"><br />
					<small>ex: "KreCiDev" if url is "<a href="http://www.twitter.com/KreCiDev" target="_blank">http://www.twitter.com/KreCiDev</a>"</small>
				</div>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>Feedburner settings</strong><br />
					<p>
                                                <div style="color: red; font-size: 12px;">
                                                To use all features, you need to enable following services for your feed at FeedBurner account under "Publicize" tab:
                                                <ol style="padding: 5px 0 0 0; font-size: 12px; color: red;">
                                                        <li>"Awareness API" to enable counter</li>
                                                        <li>"Subscribtions via Email" to enable email subscribtions</li>
                                                </ol>
                                                </div>
					</p>
					FeedBurner feed name:
					<input type="text" name="feedburner" value="<?php echo $options['feedburner']; ?>" size="20"><br />
					<small>ex: "KreCiBlogger" if url is "<a href="http://feeds.feedburner.com/KreCiBlogger" target="_blank">http://feeds.feedburner.com/KreCiBlogger</a>"</small><br />
				</div>
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>Facebook settings</strong><br />
					<p />
					Page ID or Name:
					<input type="text" name="facebook" value="<?php echo $options['facebook']; ?>" size="20"><br />
					<small>ex: "271624005427" if url is "<a href="http://www.facebook.com/pages/KreCi-Development/271624005427" target="_blank">http://www.facebook.com/pages/KreCi-Development/271624005427</a>"</small><br />
					<small>or: "IndependentDevelopment" if url is "<a href="http://www.facebook.com/IndependentDevelopment" target="_blank">http://www.facebook.com/IndependentDevelopment</a>"</small>
					
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
				<p class="submit" style="text-align: right;">
					<input type="submit" name="Submit" value="Update Settings" />
				</p>
			</form>
		</div>
		<div>
			<form name="stextcount_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI'] ); ?>">
				<input type="hidden" name="stextcount_hidden" value="cache">
				<div style="background-color: #fff; padding: 10px; margin: 2px; border: 1px solid #E0E0E0;">
					<strong>Cached data</strong>
					<p>
						RSS Subscribers: <strong><?php echo $counters['feedburner']; ?></strong><br />
						twitter followers: <strong><?php echo $counters['twitter']; ?></strong><br />
						Facebook fans: <strong><?php echo $counters['facebook']; ?></strong><br />
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
			<strong>Facebook:</strong> <a href="http://facebook.com/IndependentDevelopment">Independent Development</a><br />
			<strong>twitter:</strong> <a href="http://www.twitter.com/KreCiDev">@KreCiDev</a><br /><br />
			<strong>Social Icons Design:</strong> <a href="http://www.instantshift.com/2010/12/07/socialshift-icon-set-246-free-social-networking-icons/">Manuel López</a> (thanks!)<br />
		</div>
		</div>
	</div>
</div>
