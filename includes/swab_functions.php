<?php
/**
 * @package Simple WP Author Bio
 */

function psHasScheme($str)
{
    if(!preg_match('/(http|https)/i',$str)) {
        $str = 'http://'.$str;
    }

    return $str;
}

/**
 * @return mixed
 */
function swab_get_social_links()
{
    // Set the social icons
    $social = array(
        'website'      => get_the_author_meta( 'url'),
        'behance'      => get_the_author_meta( 'swab_behance'),
        'blogger'      => get_the_author_meta( 'swab_blogger'),
        'delicious'    => get_the_author_meta( 'swab_delicious'),
        'deviantart'   => get_the_author_meta( 'swab_deviantart'),
        'dribbble'     => get_the_author_meta( 'swab_dribbble'),
        'email'        => get_the_author_meta( 'swab_email'),
        'facebook'     => get_the_author_meta( 'swab_facebook'),
        'flickr'       => get_the_author_meta( 'swab_flickr' ),
        'github'       => get_the_author_meta( 'swab_github' ),
        'google'       => get_the_author_meta( 'swab_google' ),
        'instagram'    => get_the_author_meta( 'swab_instagram' ),
        'linkedin'     => get_the_author_meta( 'swab_linkedin' ),
        'myspace'      => get_the_author_meta( 'swab_myspace' ),
        'pinterest'    => get_the_author_meta( 'swab_pinterest' ),
        'rss'          => get_the_author_meta( 'swab_rss' ),
        'stumbleupon'  => get_the_author_meta( 'swab_stumbleupon' ),
        'tumblr'       => get_the_author_meta( 'swab_tumblr' ),
        'twitter'      => get_the_author_meta( 'swab_twitter' ),
        'vimeo'        => get_the_author_meta( 'swab_vimeo' ),
        'wordpress'    => get_the_author_meta( 'swab_wordpress' ),
        'yahoo'        => get_the_author_meta( 'swab_yahoo' ),
        'youtube'      => get_the_author_meta( 'swab_youtube' )
    );

    return array_filter($social);
}

function swab_validate_settings($settings)
{
    if(isset($settings['nofollow_author_links']) && $settings['nofollow_author_links']) {
        $settings['rel'] = $settings['nofollow_author_links'];
    } else {
        $settings['rel'] = 'follow';
    }

    if(isset($settings['link_target']) && $settings['link_target']) {
        $settings['target'] = $settings['link_target'];
    } else {
        $settings['target'] = '_top';
    }

    if(isset($settings['pick_icon_set']) && $settings['pick_icon_set']) {
        $settings['icon-set'] = $settings['pick_icon_set'];
    } else {
        $settings['icon-set'] = 'flat-circle';
    }

    return $settings;
}

function swab_get_email_link($email)
{
    if($email) {
        return 'mailto:'.$email;
    }

    return 'mailto:'.get_the_author_meta('user_email');
}