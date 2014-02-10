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
$meta_duree = get_post_meta( get_the_ID(), 'wpap_form_duree', true );
$meta_places = get_post_meta( get_the_ID(), 'wpap_form_places', true );
$meta_inscriptions = get_post_meta( get_the_ID(), 'wpap_form_inscriptions', true );

/* Date de début */ 
$meta_date = get_post_meta( get_the_ID(), 'wpap_form_date', true );
/* formatage de la date */
$meta_date = date_i18n(get_option('date_format') ,strtotime($meta_date));
?>

<!-- la class type-formation sera ajoutée pour les formations --> 
<article <?php post_class('blog-entry rows3 clearfix'); ?>>  
	<?php
	// Show Featured Image
	if( has_post_thumbnail() ) {  ?>
	<div class="blog-entry-thumbnail">
		<a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' ); ?>" title="<?php the_title(); ?>" class="prettyphoto-link"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></a>
	</div><!-- /blog-entry-thumbnail -->
    <?php } ?>
    <div class="entry-text clearfix">
        <header>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        </header>
		<?php
        // If not empty who the post excerpt
        if( !empty($post->post_excerpt) ) {
            the_excerpt();
            } else {
                // If post excerpt empty trim the content to 20 words
               echo wp_trim_words(get_the_content(), 20); } ?>
		<ul class="entry-meta">
            <?php if($meta_date) { echo '<li><strong>Début : '.$meta_date.'</strong></li>'; } ?>
            <?php if($meta_duree) { echo '<li>Durée : '.$meta_duree.'</li>' ; } ?>
            <?php if($meta_places) { echo '<li>Nb de places : '.$meta_places.'</li>' ; } ?>
            <?php if($meta_inscriptions) { echo '<li>Inscriptions : '.$meta_inscriptions.'</li>' ; } ?>
        </ul><!-- /entry-meta -->

        <ul class="entry-meta">
            <li><strong>Mis à jour le:</strong> <?php echo get_the_date(); ?></li>
            <li><strong>Par :</strong> <?php the_author_posts_link(); ?></li>                	
        </ul><!-- /entry-meta -->
         <ul class="entry-button">
            <li>
                <?php if(comments_open()&!in_category('pourvu')) { ?>
            <a class="ap_postuler" href="<?php the_permalink(); ?>" title="Postuler">Participer</a>
        <?php } else { ?>
            <a class="ap_pourvu" href="<?php the_permalink(); ?>" title="Pourvu">Complet</a>
        <?php }?>
            </li>
        </ul>  
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->