<?php

/**
 * Helper class file for the Simple WP Author Bio plugin.
 *
 * @package Simple WP Author Bio
 */

Class SWAB_Helper
{

    /**
     * Unique plugin Identifier.
     */
    public $plugin_slug = 'sw-author-bio';

    /**
     * Load About Template
     */
    public function about_template()
    {
        $this->loadTemplate('about');
    }

    /**
     * Loading Setting Template
     */
    public function setting_template()
    {
        $this->loadTemplate('setting');
    }



    /**
     * Responsible to handle all loads
     * @param $template_name
     * @param array $attributes
     */
    public function loadTemplate($template_name, array $attributes = [])
    {
        extract($attributes, null);
        require SWAB_PATH. '/templates/' . $template_name . '.php';
    }

    /**
     * Sets default settings.
     * Setting Page
     */
    protected function default_settings() {

        $settings = array(
            'settings' => array(
                'title' => __( 'Functionality', $this->plugin_slug ),
                'type' => 'section',
                'menu' => 'swauthorbio_settings'
            ),
            'display' => array(
                'title' => __( 'Display in', $this->plugin_slug ),
                'default' => 'posts',
                'type' => 'select',
                'description' => sprintf( __( 'You can display the box directly into your theme using: %s', $this->plugin_slug ), '<br /><code>&lt;?php if ( function_exists( \'get_SWAB_Author_Bio\' ) ) echo get_SWAB_Author_Bio(); ?&gt;</code><br />You can also use this shortcode:<br /><code>[swab_author_bio]</code>' ),
                'section' => 'settings',
                'menu' => 'swauthorbio_settings',
                'options' => array(
                    'posts' => __( 'Only in Posts', $this->plugin_slug ),
                    'page_posts' => __( 'Page and Posts', $this->plugin_slug ),
                    'none' => __( 'None', $this->plugin_slug ),
                )
            ),
            'nofollow_author_links' => array(
                'title' => __( 'Nofollow Links', $this->plugin_slug ),
                'default' => 'follow',
                'type' => 'select',
                'description' => sprintf( __( 'Toggle Author Bio links between follow and nofollow', $this->plugin_slug ) ),
                'section' => 'settings',
                'menu' => 'swauthorbio_settings',
                'options' => array(
                    'follow' => __( 'FOLLOW Links', $this->plugin_slug ),
                    'nofollow' => __( 'NOFOLLOW Links', $this->plugin_slug ),
                )
            ),
            'link_target' => array(
                'title' => __( 'Link Target', $this->plugin_slug ),
                'default' => '_blank',
                'type' => 'select',
                'description' => sprintf( __( 'Set Author Bio links to open in current window or in a new window', $this->plugin_slug ) ),
                'section' => 'settings',
                'menu' => 'swauthorbio_settings',
                'options' => array(
                    '_top' => __( 'Same window', $this->plugin_slug ),
                    '_blank' => __( 'New window', $this->plugin_slug ),
                )
            ),
            'custom_css_link' => array(
                'title' => __( 'Custom css link', $this->plugin_slug ),
                'default' => 64,
                'type' => 'text',
                'section' => 'settings',
                'description' => __( 'Custom css link to override the default css', $this->plugin_slug ),
                'menu' => 'swauthorbio_settings'
            ),
            'pick_icon_set' => [
                'title' => __( 'Pick Social Icon Set', $this->plugin_slug ),
                'default' => 'flat-square',
                'type' => 'select',
                'section' => 'settings',
                'description' => __( '<div style="background-color:#ffffff;padding:20px;border:solid 1px #eee;width:100%;max-width:1100px;"><img id="sab-icon-set" src="'.plugins_url().'/simple-wp-author-bio/public/assets/images/social-icon-sets.png" style="width: 100%;max-width:1100px;"></div>', $this->plugin_slug ),
                'menu' => 'swauthorbio_settings',
                'options' => [
                    'flat-square'         => __( 'Flat Squares', $this->plugin_slug ),
                    'flat-square-rounded' => __( 'Flat Squares Rounded', $this->plugin_slug ),
                    'shadow-square'       => __( 'Shadow Squares', $this->plugin_slug ),
                    'flat-circle'         => __( 'Flat Circles', $this->plugin_slug ),
                    'shadow-circle'       => __( 'Shadow Circles', $this->plugin_slug )
                ]
            ]
        );

        return $settings;

    }

    /**
     * Plugin settings form fields.
     * Setting Page
     */
    public function plugin_settings() {
        $settings = 'swauthorbio_settings';

        foreach ( $this->default_settings() as $key => $value ) {

            switch ( $value['type'] ) {
                case 'section':
                    add_settings_section(
                        $key,
                        $value['title'],
                        '__return_false',
                        $value['menu']
                    );
                    break;

                case 'text':
                    add_settings_field(
                        $key,
                        $value['title'],
                        array( $this, 'text_element_callback' ),
                        $value['menu'],
                        $value['section'],
                        array(
                            'menu' => $value['menu'],
                            'id' => $key,
                            'class' => 'small-text',
                            'description' => isset( $value['description'] ) ? $value['description'] : ''
                        )
                    );
                    break;
                case 'textarea':
                    add_settings_field(
                        $key,
                        $value['title'],
                        array( $this, 'textarea_element_callback'),
                        $value['menu'],
                        $value['section'],
                        array(
                            'menu' => $value['menu'],
                            'id' => $key,
                            'class' => 'large-text',
                            'description' => isset( $value['description'] ) ? $value['description'] : ''
                        )
                    );
                    break;
                case 'checkbox':
                    add_settings_field(
                        $key,
                        $value['title'],
                        array( $this, 'checkbox_element_callback' ),
                        $value['menu'],
                        $value['section'],
                        array(
                            'menu' => $value['menu'],
                            'id' => $key,
                            'class' => 'checkbox',
                            'description' => isset( $value['description'] ) ? $value['description'] : ''
                        )
                    );
                    break;
                case 'select':
                    add_settings_field(
                        $key,
                        $value['title'],
                        array( $this, 'select_element_callback' ),
                        $value['menu'],
                        $value['section'],
                        array(
                            'menu' => $value['menu'],
                            'id' => $key,
                            'description' => isset( $value['description'] ) ? $value['description'] : '',
                            'options' => $value['options']
                        )
                    );
                    break;
                case 'color':
                    add_settings_field(
                        $key,
                        $value['title'],
                        array( $this, 'color_element_callback' ),
                        $value['menu'],
                        $value['section'],
                        array(
                            'menu' => $value['menu'],
                            'id' => $key,
                            'description' => isset( $value['description'] ) ? $value['description'] : ''
                        )
                    );
                    break;

                default:
                    break;
            }

        }

        // Register settings.
        register_setting( $settings, $settings, array( $this, 'validate_options' ) );
    }


    /**
     * Select field fallback.
     */
    public function select_element_callback( $args ) {
        $menu = $args['menu'];
        $id   = $args['id'];

        $options = get_option( $menu );

        // Sets current option.
        if ( isset( $options[ $id ] ) ) {
            $current = $options[ $id ];
        } else {
            $current = isset( $args['default'] ) ? $args['default'] : '';
        }

        $html = sprintf( '<select id="%1$s" name="%2$s[%1$s]">', $id, $menu );
        foreach( $args['options'] as $key => $label ) {
            $key = sanitize_title( $key );

            $html .= sprintf( '<option value="%s"%s>%s</option>', $key, selected( $current, $key, false ), $label );
        }
        $html .= '</select>';

        // Displays the description.
        if ( $args['description'] ) {
            $html .= sprintf( '<p class="description">%s</p>', $args['description'] );
        }

        echo $html;
    }

    /**
     * Text element fallback.
     * @param $args
     */
    public function text_element_callback( $args ) {
        $menu  = $args['menu'];
        $id    = $args['id'];
        $class = isset( $args['class'] ) ? $args['class'] : 'small-text';

        $options = get_option( $menu );

        if ( isset( $options[ $id ] ) ) {
            $current = $options[ $id ];
        } else {
            $current = isset( $args['default'] ) ? $args['default'] : '';
        }

        $html = sprintf( '<input style="width:200px;" type="text" id="%1$s" name="%2$s[%1$s]" value="%3$s" class="%4$s" />', $id, $menu, $current, $class );

        // Displays option description.
        if ( isset( $args['description'] ) ) {
            $html .= sprintf( '<p class="description">%s</p>', $args['description'] );
        }

        echo $html;
    }
}