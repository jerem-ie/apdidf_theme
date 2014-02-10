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
$meta_url = get_post_meta( get_the_ID(), 'wpap_post_url', true );
$meta_access = get_post_meta( get_the_ID(), 'wpap_post_access', true );
$meta_id = get_post_meta( get_the_ID(), 'wpap_post_id', true );
?>

<article <?php post_class('blog-entry rows5 clearfix'); ?>>  
	<?php
    // Get resize and show featured image : refer to functions/img_defaults.php for default values
    $wpex_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) );
    	if($wpex_entry_img) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php echo $meta_url; ?>" title="<?php the_title(); ?>"><img src="<?php echo $wpex_entry_img; ?>" alt="<?php echo the_title(); ?>" /></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text">        
        <?php if(! $wpex_entry_img) { ?>
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
         <?php }
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
               echo wp_trim_words(get_the_content(), 20); } ?>
        <ul class="entry-meta">
        	<?php if( $meta_url ) {?>
            <li><a href="<?php echo $meta_url; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <?php } ?>
            <?php if($meta_access == 'Privé') {
                echo '<li>Accès :'.$meta_access ;
                if($meta_id){echo ' - '.$meta_id;}
                echo '</li>';} ?>
            <li class="ap_pour">
            <?php if(in_category('animateurs')){?><a href="<?php echo home_url(); ?>/categorie/animateurs/" title="animateurs">Animateurs</a><?php } ?>
            <?php if(in_category('animateurs')&&in_category('permanents')){echo ' - ';}?>   
            <?php if(in_category('permanents')){?><a href="<?php echo home_url(); ?>/categorie/animateurs/" title="permanents">Permanents</a><?php } ?>    
                
            </li>
        </ul><!-- /entry-meta -->
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->