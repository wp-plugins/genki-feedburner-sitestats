<?php
/* 
Plugin Name: Genki Feedburner SiteStats
Version: 1.0
Plugin URI: http://ericulous.com/2007/05/10/wp-plugin-genki-feedburner-sitestats/
Description: Insert Feedburner SiteStats code (without FeedFlares) for a speed boost
Author: Genkisan
Author URI: http://ericulous.com
*/

add_action ('admin_menu', 'genki_feedburner_sitestats_menu');
add_action ('wp_footer', 'genki_feedburner_sitestats_footer');

function genki_feedburner_sitestats_menu() {
	add_option('genki_feedburner_sitestats_id', '');

	if (function_exists('add_management_page')) {
		add_options_page('Feedburner SiteStats', 'Feedburner SiteStats', 8, __FILE__, 'genki_feedburner_sitestats_manage');
	}
}

function genki_feedburner_sitestats_manage() {
if (isset($_POST['update_message'])) {

	?><div id="message" class="updated fade"><p><strong><?php

	update_option('genki_feedburner_sitestats_id', $_POST['feedburner_id']);

	echo "Options Updated!";

	?></strong></p></div><?php
}

$feedburner_id = get_option('genki_feedburner_sitestats_id');
?>
	<div class=wrap>
	<h2>Feedburner SiteStats</h2>
		<form name="formamt" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
			<fieldset class="options">
				<legend>Enter your Feedburner Feed ID e.g ericulous. Not http://feeds.feedburner.com/ericulous
					<p><input name="feedburner_id" id="feedburner_id" type="text" value="<?php echo $feedburner_id  ?>" />
					</p>
				</legend>
			</fieldset>
			<p class="submit">
				<input type="submit" name="update_message" value="Update Options &raquo;" />
			</p>
		</form>
	</div>
<?php
}

function genki_feedburner_sitestats_footer() {
	if (get_option('genki_feedburner_sitestats_id') != '') {
		echo '<script src="http://feeds.feedburner.com/~s/' . get_option('genki_feedburner_sitestats_id') . '" type="text/javascript" charset="utf-8"></script>';
	}
}

?>