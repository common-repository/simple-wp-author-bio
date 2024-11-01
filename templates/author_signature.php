<?php
/**
 * Author signature info fields
 *
 * @package Simple WP Author Bio
 */
?>

<h3><?php _e('Author Signature Info', 'blank'); ?></h3>

<table class="form-table">
    <tr>
        <th><label for="job-title"><?php _e('Job Title'); ?></label></th>
        <td>
            <input type="text"
                   name="job-title"
                   id="job-title"
                   value="<?php echo esc_attr( get_the_author_meta( 'job-title', $user->ID ) ); ?>"
                   class="regular-text" /><br />
            <span class="description"><?php _e('Please enter your job title.'); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="company"><?php _e('Company'); ?></label></th>
        <td>
            <input type="text"
                   name="company"
                   id="company"
                   value="<?php echo esc_attr( get_the_author_meta( 'company', $user->ID ) ); ?>"
                   class="regular-text" /><br />
            <span class="description"><?php _e('Please enter your company.'); ?></span>
        </td>
    </tr>
    <tr>
        <th><label for="company-website-url"><?php _e('Company Website URL'); ?></label></th>
        <td>
            <input type="text"
                   name="company-website-url"
                   id="company-website-url"
                   value="<?php echo esc_attr( get_the_author_meta( 'company-website-url', $user->ID ) ); ?>"
                   class="regular-text" /><br />
            <span class="description"><?php _e("Please enter your company's website URL."); ?></span>
        </td>
    </tr>
</table>