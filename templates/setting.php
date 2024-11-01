<?php
/**
 * Setting page
 *
 * @package Simple WP Author Bio
 */
?>

<div class="wrap">
    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
    <div style="float:left;width:80%;">
        <div class="notice notice-warning is-dismissible">
            <p><a href="<?php echo admin_url('profile.php'); ?>">Click here</a> to update your author details.</p>
        </div>
        <form method="post" action="options.php">
            <?php
            settings_fields( 'swauthorbio_settings' );
            do_settings_sections( 'swauthorbio_settings' );
            submit_button();
            ?>
        </form>
    </div>
</div>