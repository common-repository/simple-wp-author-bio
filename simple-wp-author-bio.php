<?php
/**
 * Plugin Name:  Simple WP Author Bio
 * Plugin URI:   https://wordpress.org/plugins/simple-wp-author-bio/
 * Description:  Simple WP Author Box is a modestly framed plugin to display the author info. The plugin is fully mobile responsive and allows creating of over 22 social site profiles. You can add a picture by creating an author gravatar, add a short biography, display the social icons at the bottom after the post.
 * Version:      2.0
 * Author:       Freelance Web Designer
 * Author URI:   http://www.freelancewebdesigner.biz/
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  freelancewebdesigner.biz
 * Domain Path:  /languages
 */


// Plugin Folder Path
if (!defined('SWAB_PATH')) {
    define('SWAB_PATH', plugin_dir_path(__FILE__));
}

// Plugin Folder URL
if (!defined('SWAB_URL')) {
    define('SWAB_URL', plugin_dir_url(__FILE__));
}

require_once SWAB_PATH . '/includes/swab_functions.php';
require_once SWAB_PATH . '/includes/class-swab-helper.php';
require_once SWAB_PATH . '/includes/class-swab-author-bio.php';

function get_SWAB_Author_Bio() {
    return SWAB_Author_Bio::get_SWAB_Author_Bio();
}

add_shortcode( 'swab_author_bio','get_SWAB_Author_Bio');

add_action('plugins_loaded', array('SWAB_Author_Bio', 'getInstance'));
