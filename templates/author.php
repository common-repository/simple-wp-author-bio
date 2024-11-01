<?php
/**
 * Simple WP Author Bio Box
 *
 * @package Simple WP Author Bio
 */
?>

<?php $settings = swab_validate_settings($settings); ?>

<div class="swab-author-bio">
    <div class="atr-bio-safe">
        <div class="autr-img"><img src="<?php echo get_avatar_url(get_the_author_meta('user_email'))?>" alt="<?php echo get_the_author();?>"></div>
        <div class="autr-txt">
            <h1><?php echo get_the_author();?></h1>
            <h3><?php echo get_the_author_meta('job-title');?></h3>
            <?php if(get_the_author_meta('description')):?>
                <p><?php echo nl2br(get_the_author_meta('description')); ?></p>
            <?php endif; ?>
            <ul class="clear">
                <?php foreach(swab_get_social_links() as $key => $social): ?>
                    <li>
                        <a href="<?php echo ($key === 'email')? swab_get_email_link($social): $social;?>"
                           class="fa"
                           rel="<?php echo $settings['rel'];?>"
                           target="<?php echo $settings['target'];?>">
                            <img src="<?php echo plugins_url("/public/assets/images/{$settings['icon-set']}/{$key}.png", __DIR__); ?>" alt="<?php echo $key;?>">
                        </a></li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>
