=== Simple WP Author Bio ===
Contributors: sajupp
Tags: simple author bio, wordpress author bio, author bio plugin, simple author box, wordpress author plugin
Requires at least: 3.8
Tested up to: 4.9.8
Stable tag: 1.5.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html


== Description ==

Simple WP Author Box is a modestly framed plugin to display the author info. The plugin is fully mobile responsive and allows creating of over 22 social site profiles. You can add a picture by creating an author gravatar, add a short biography, display the social icons at the bottom after the post.

== Main Features ==

Displays Author Gravatar, name, job title, company name, business URL, short bio description and social media icons

Customize it to match your theme design in color, size, font, text etc.

Elegant and stylish across all devices - desktop, laptop, tablet or mobile phones

Integrate all major social media networks- Google+, Facebook, Instagram, LinkedIn, Pinterest, Tumblr, Twitter etc.

Automatic pull gravatar image, link to all your recent posts.

== About Us ==

An experienced freelance web designer, and a WordPress enthusiast with fervor to build WordPress website design, custom website layout design, brand/ graphic design, logo design. The WP aficionado also offers WooCommerce and Magento e-commerce development services.

= WP Author Bio Box Shortcode =
`
[swab_author_bio]
`

= PHP Functions =

<strong>Use the following PHP code to render Simple WP Author Bio wherever PHP is supported:</strong>

`
<?php 
	if ( function_exists( 'get_SWAB_Author_Bio' ) ) {
        echo get_SWAB_Author_Bio();
    }
?>
`

= PHP Variables =

<strong>Use the following PHP variables to render specific Simple WP Author Bio data:</strong>

`
<?php
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
?>
` 

= Add the box directly =

Use this shortcode:

	[swab_author_bio]

...or this function:

	<?php 
		if ( function_exists( 'get_SWAB_Author_Bio' ) ) {
            echo get_SWAB_Author_Bio();
        }
	?>
