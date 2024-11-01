<?php

/**
 * Primary class file for the Simple WP Author Bio plugin.
 *
 * @package Simple WP Author Bio
 */

Class SWAB_Author_Bio extends SWAB_Helper
{
    /**
     * Instance of this class.
     */
    protected static $instance;

    public function __construct()
    {
        add_action('admin_menu', array($this, 'admin_menu'));

        add_filter( 'user_contactmethods',  array($this, 'contact_methods'), 10, 1 );
        add_action( 'admin_init', array( $this, 'plugin_settings' ) );
        add_filter( 'the_content', array( $this, 'display' ), 9999 );
        add_action( 'wp_enqueue_scripts', array($this, 'add_scripts') );

        // Author Signature Info
        add_action( 'show_user_profile', array($this,'author_signature_info_fields') );
        add_action( 'edit_user_profile', array($this, 'author_signature_info_fields') );

        add_action( 'personal_options_update', array($this,'save_author_signature_info_fields'));
        add_action( 'edit_user_profile_update', array($this,'save_author_signature_info_fields') );
    }

    /**
     * Generate Instance
     */
    public static function getInstance()
    {
        // If the single instance hasn't been set, set it now.
        if ( null === self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
     * Create Admin Menu
     */
    public function admin_menu()
    {
        add_menu_page(__('SWP Author Bio'),'SWP Author Bio','manage_options','swab_author_bio',array($this, 'about_template'),'dashicons-chart-pie', 72);
        add_submenu_page('swab_author_bio','Simple WP Author Bio About','About','manage_options','swab_author_bio',array($this, 'about_template'));
        add_submenu_page('swab_author_bio','Settings','Settings','manage_options','swab_author_bio_setting',array($this, 'setting_template'));
    }

    /**
     * @param $methods
     * @return mixed
     */
    public function contact_methods($methods ) {
        // Add new methods.
        $methods['swab_behance']     = __( 'Behance URL', 'swab-author-bio' );
        $methods['swab_blogger']     = __( 'Blogger URL', 'swab-author-bio' );
        $methods['swab_delicious']   = __( 'Delicious URL', 'swab-author-bio' );
        $methods['swab_deviantart']  = __( 'DeviantArt URL', 'swab-author-bio' );
        $methods['swab_dribbble']    = __( 'Dribbble URL', 'swab-author-bio' );
        $methods['swab_email']       = __( 'Email Address', 'swab-author-bio' );
        $methods['swab_facebook']    = __( 'Facebook URL', 'swab-author-bio' );
        $methods['swab_flickr']      = __( 'Flickr URL', 'swab-author-bio' );
        $methods['swab_github']      = __( 'GitHub URL', 'swab-author-bio' );
        $methods['swab_google']      = __( 'Google+ URL', 'swab-author-bio' );
        $methods['swab_instagram']   = __( 'Instagram URL', 'swab-author-bio' );
        $methods['swab_linkedin']    = __( 'LinkedIn URL', 'swab-author-bio' );
        $methods['swab_myspace']     = __( 'MySpace URL', 'swab-author-bio' );
        $methods['swab_pinterest']   = __( 'Pinterest URL', 'swab-author-bio' );
        $methods['swab_rss']         = __( 'RSS Feed URL', 'swab-author-bio' );
        $methods['swab_stumbleupon'] = __( 'StumbleUpon URL', 'swab-author-bio' );
        $methods['swab_tumblr']      = __( 'Tumblr URL', 'swab-author-bio' );
        $methods['swab_twitter']     = __( 'Twitter URL', 'swab-author-bio' );
        $methods['swab_vimeo']       = __( 'Vimeo URL', 'swab-author-bio' );
        $methods['swab_wordpress']   = __( 'WordPress URL', 'swab-author-bio' );
        $methods['swab_yahoo']       = __( 'Yahoo! URL', 'swab-author-bio' );
        $methods['swab_youtube']     = __( 'YouTube URL', 'swab-author-bio' );

        return $methods;
    }

    /**
     * Get Author Bio By Shortcode
     * @return string
     */
    public static function get_SWAB_Author_Bio()
    {
        $settings = get_option( 'swauthorbio_settings' );
        return static::getInstance()->view($settings);
    }

    /**
     * @param string $content
     * @return string
     */
    public function display($content = '')
    {
        $settings = get_option( 'swauthorbio_settings' );
        if ( $this->is_display( $settings ) ) {
            return $content . $this->view( $settings );
        }

        return $content;
    }

    /**
     * @param $settings
     * @return string
     */
    public function view($settings)
    {
        ob_start();
        $this->loadTemplate('author', compact('settings'));
        return ob_get_clean();
    }

    /**
     * @param $settings
     * @return bool
     */
    protected function is_display($settings ) {
        switch( @$settings['display'] ) {
            case 'posts':
                return 'post' === get_post_type();
                break;
            case 'page_posts':
                return (is_single() && 'post' === get_post_type()) || is_page();
                break;

            default:
                return false;
                break;
        }
    }

    /**
     * @param $user
     */
    public function author_signature_info_fields($user)
    {
        $this->loadTemplate('author_signature', compact('user'));
    }

    /**
     * @param $user_id
     * @return bool
     */
    public function save_author_signature_info_fields($user_id)
    {
        if ( !current_user_can( 'edit_user', $user_id ) ) { return false; }

        update_user_meta( $user_id, 'job-title', sanitize_text_field($_POST['job-title']) );
        update_user_meta( $user_id, 'company', sanitize_text_field($_POST['company']));
        update_user_meta( $user_id, 'company-website-url', sanitize_text_field($_POST['company-website-url']) );
    }

    /**
     * Add Default or Custom Css
     */
    public function add_scripts()
    {
        wp_enqueue_style( 'sw-author-bio', SWAB_URL. '/public/assets/css/style.css');
        wp_enqueue_style( 'sw-author-bio-font', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700');
        $settings = get_option( 'swauthorbio_settings' );
        if(isset($settings['custom_css_link']) && $settings['custom_css_link']) {
            wp_enqueue_style( 'sw-custom-author-bio', $settings['custom_css_link']);
        }
    }

}