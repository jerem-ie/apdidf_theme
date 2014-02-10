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

<?php 
// get the meta for further use - now useless with custom post
/*
$meta_coordo = get_post_meta( get_the_ID(), 'wpms_post_coordo', true );
$meta_mail = get_post_meta( get_the_ID(), 'wpms_post_coordo_mail', true );
$meta_place = get_post_meta( get_the_ID(), 'wpms_atelier_lieux', true );
$meta_seances = get_post_meta( get_the_ID(), 'wpms_atelier_seances', true );
$meta_public = get_post_meta( get_the_ID(), 'wpms_atelier_public', true );
*/
?>

<article <?php post_class('blog-entry rows3 clearfix'); ?>>  
	<?php
    // Get resize and show featured image : refer to functions/img_defaults.php for default values
    $wpex_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) );
    	if($wpex_entry_img) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $wpex_entry_img; ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
		<?php
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
               echo wp_trim_words(get_the_content(), 20); } ?>
        <ul class="entry-meta">
        	<li><strong>Publié le :</strong> <?php echo get_the_date(); ?></li>     
            <li>Contact : <?php if( $meta_coordo ) {echo $meta_coordo;} else {the_author_posts_link();} ?></li>
            <?php if(comments_open()) { ?><li class="comment-scroll"><strong>Réactions:</strong> <?php comments_popup_link(__('0 Comments', 'wpex'), __('1 Comment', 'wpex'), __('% Comments', 'wpex'), 'comments-link' ); ?></li><?php } ?>
            
        </ul><!-- /entry-meta -->        
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->