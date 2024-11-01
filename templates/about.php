<?php
/**
 * About plugin shortcode and usable php function ,
 *
 * @package Simple WP Author Bio
 */
?>

<div class="wrap">
    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    <div style="float:left;width:80%;">
        <div>
            <h3>Shortcode</h3>
            <p>Use the following shortcode to render Simple WP Author Bio wherever shortcodes are supported:</p>
            <pre style="margin: 0;display: inline-block;background: #fff;border: 1px solid #dedee3;padding: 11px;font-size: 12px;line-height: 1.3em;overflow: auto;">[swab_author_bio]</pre>
        </div>
        <div>
            <h3>PHP Function</h3>
            <p>Use the following PHP code to render Simple WP Author Bio wherever PHP is supported:</p>
            <pre style="display: inline-block;background: #fff;border: 1px solid #dedee3;padding: 11px;font-size: 12px;line-height: 1.3em;overflow: auto;">
if ( function_exists( 'get_SWAB_Author_Bio' ) ) {
    echo get_SWAB_Author_Bio();
}
</pre>
            <h3>PHP Variables</h3>
            <p>Use the following PHP variables to render specific Simple WP Author Bio data:</p>
            <pre style="display: inline-block;background: #fff;border: 1px solid #dedee3;padding: 11px;font-size: 12px;line-height: 1.3em;overflow: auto;">
//Author Name:
echo get_the_author();

//Job Title:
echo get_the_author_meta('job-title');

//Company Name:
echo get_the_author_meta('company');

//Company Website URL:
echo get_the_author_meta('company-website-url');

//Social Network URLs:
echo get_the_author_meta( 'swab_behance' );
echo get_the_author_meta( 'swab_blogger' );
echo get_the_author_meta( 'swab_delicious' );
echo get_the_author_meta( 'swab_deviantart' );
echo get_the_author_meta( 'swab_dribbble' );
echo get_the_author_meta( 'swab_email' );
echo get_the_author_meta( 'swab_facebook' );
echo get_the_author_meta( 'swab_flickr' );
echo get_the_author_meta( 'swab_github' );
echo get_the_author_meta( 'swab_google' );
echo get_the_author_meta( 'swab_instagram' );
echo get_the_author_meta( 'swab_linkedin' );
echo get_the_author_meta( 'swab_myspace' );
echo get_the_author_meta( 'swab_pinterest' );
echo get_the_author_meta( 'swab_rss' );
echo get_the_author_meta( 'swab_stumbleupon' );
echo get_the_author_meta( 'swab_tumblr' );
echo get_the_author_meta( 'swab_twitter' );
echo get_the_author_meta( 'swab_vimeo' );
echo get_the_author_meta( 'swab_wordpress' );
echo get_the_author_meta( 'swab_yahoo' );
echo get_the_author_meta( 'swab_youtube' );
</pre>
        </div>
    </div>
</div>