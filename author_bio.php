<?php
/**
 * This file is used for your standard post entry
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
?>

<article <?php post_class('blog-entry clearfix'); ?>>  
	<?php
    // Get resize and show featured image : refer to functions/img_defaults.php for default values
    $wpex_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) );
    	if($wpex_entry_img) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '45', '' ); ?></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
            <h2><a href="<?php the_author_posts_link(); ?>">Contact</a></h2>
        </header>
		<?php echo wp_trim_words(the_author_meta('description'), 20);?>
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->