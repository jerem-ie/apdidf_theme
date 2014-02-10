<?php
/**
 * Default file for single regular posts.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
get_header(); // Loads the header.php template
if (have_posts()) : while (have_posts()) : the_post();
?>

<?php
// Video oEmbed
if ( get_post_format() == 'video' ){
	echo '<div id="post-video" class="fitvids">' . wp_oembed_get( get_post_meta( get_the_ID(), 'wpex_post_video', true ) ) . '</div>';
}

// Image & Audio Player
elseif ( get_post_format() == 'audio' ){
	
	// Get Audio Meta
	$wpex_post_audio_mp3 = get_post_meta($post->ID, 'wpex_post_audio_mp3', true);
	$wpex_post_audio_ogg = get_post_meta($post->ID, 'wpex_post_audio_ogg', true);
	
	// Show Audio Player if the meta options aren't blank
	if($wpex_post_audio_mp3 || $wpex_post_audio_ogg) {
		
		// Get audio player scripts
		wp_enqueue_script('jplayer', get_template_directory_uri() .'/js/jquery.jplayer.min.js', array('jquery'), '2.1.0', true);
		wp_enqueue_style( 'wpex-audioplayer', WPEX_CSS_DIR .'/audioplayer.css' );
		?>
	
		<script type="text/javascript">
		jQuery(function($){
			jQuery(document).ready(function($){
				if( $().jPlayer ) {
					  $("#jquery_jplayer_<?php echo $post->ID; ?>").jPlayer({
						  ready: function () {
							  $(this).jPlayer("setMedia", {
									poster: "<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' ); ?>",
									mp3: "<?php echo $wpex_post_audio_mp3; ?>",
									oga: "<?php echo $wpex_post_audio_ogg; ?>"
							  });
							  },
						  cssSelectorAncestor: "#jp_interface_<?php echo $post->ID; ?>",
						  swfPath: "<?php echo get_template_directory_uri(); ?>/js",
						  supplied: "<?php if($wpex_post_audio_ogg) echo 'oga'; ?><?php if($wpex_post_audio_mp3 && $wpex_post_audio_ogg) echo','; ?><?php if($wpex_post_audio_mp3) echo 'mp3'; ?>"
					  });
				  
				  }
			  });
		  });
		</script>
		<div id="single-post-audio-wrap">
			<img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_width' ), wpex_img( 'blog_height' ), wpex_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>" />
			<div id="jquery_jplayer_<?php echo $post->ID; ?>" class="jp-jplayer"></div>
			<div id="jp_container_<?php echo $post->ID; ?>" class="jp-audio">
				<div id="jp_interface_<?php echo $post->ID; ?>" class="jp-gui jp-interface">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
						<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
				</div><!-- /jp_interface_<?php echo $post->ID; ?> -->
			</div><!-- .jp-jplayer -->
		</div><!-- /single-post-audio-wrap -->
	<?php } ?>

	<?php }
    // Quote Style
    elseif ( get_post_format() == 'quote' ){ /* No Media needed */ }
    
    // Image & Audio Player
    elseif ( get_post_format() == 'gallery' ){ ?>
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('#single-post-slider').imagesLoaded( function() {
            $("#single-post-slider").flexslider({
                animation: 'slide',
                slideshow: true,
                controlNav: false,
                prevText: '<span class="wpex-icon-chevron-left"></span>',
                nextText: '<span class="wpex-icon-chevron-right"></span>',
                smoothHeight: true,
                start: function(slider) {
                    slider.container.click(function(e) {
                        if( !slider.animating ) {
                            slider.flexAnimate( slider.getTarget('next') );
                        }
                    
                    });
                }
            });
        });
    });
    </script>
    
    <div class="flexslider-container">
        <div id="single-post-slider" class="flexslider">
            <ul class="slides">
                <?php
                // Get Attachments
                $wpex_single_gallery_attachments = get_posts(
                array(
                    'orderby' => 'menu_order',
                    'post_type' => 'attachment',
                    'post_parent' => get_the_ID(),
                    'post_mime_type' => 'image',
                    'post_status' => null,
                    'posts_per_page' => -1
                )
            ); 
                // Loop through attachments
                foreach ( $wpex_single_gallery_attachments as $wpex_single_gallery_attachment ) :
                
                // Include image in slider/gallery
                if( get_post_meta($wpex_single_gallery_attachment->ID, 'be_rotator_include', true) !== '1' ) {
                ?>
                <li class="slide"><img src="<?php echo aq_resize( wp_get_attachment_url( $wpex_single_gallery_attachment->ID, 'full' ),  wpex_img( 'blog_width' ), wpex_img( 'blog_height' ), wpex_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></li>
                <?php } endforeach; ?>
            </ul><!-- /slides -->
        </div><!-- /flexslider -->
    </div>
			
		<?php }
		// Image With Lightbox
		elseif( get_post_format() == 'image' ){ ?>
        	<div id="post-thumbnail"><a href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'full' )?>" tile="<?php _e('View Full-Size','wpex'); ?>" class="prettyphoto-link"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_width' ), wpex_img( 'blog_height' ), wpex_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></a></div>
        <?php } else {
            if( has_post_thumbnail() ) { ?>
            <div id="post-thumbnail"><img src="<?php echo aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_width' ), wpex_img( 'blog_height' ), wpex_img( 'blog_crop' ) ); ?>" alt="<?php echo the_title(); ?>" /></div>
        <?php }
        } ?>

<div id="single-post-content" class="sidebar-bg container clearfix">
    
    <div id="post" class="clearfix">
    
		<?php
        // Show header on all post formats except quotes


        // get the meta for further use 

        $meta_date = get_post_meta( get_the_ID(), 'wpap_miss_date', true );
        $meta_coordo = get_post_meta( get_the_ID(), 'wpap_miss_coordo', true );
        $meta_contact = get_post_meta( get_the_ID(), 'wpap_miss_contact', true );
        $meta_lieux = get_post_meta( get_the_ID(), 'wpap_miss_lieux', true );
        $meta_seances = get_post_meta( get_the_ID(), 'wpap_miss_seances', true );
        $meta_public = get_post_meta( get_the_ID(), 'wpap_miss_public', true );


        if( get_post_format() !== 'quote' ) { ?>
            <header id="post-header">
                <h1><?php the_title(); ?></h1>
                <?php if(!comments_open() OR in_category('pourvu')) { ?>
                <ul class="ap_post_pourvu">
                    <li><strong>Désolé, il n'est pas possible de participer à cette mission pour le moment !</strong></li>
                </ul>
                <?php } ?>
                <ul class="meta clearfix">
            		<li><strong>Démarre le : </strong> <?php if($meta_date){ echo $meta_date; } else { echo 'à voir ensemble !';} ?></li>
            		<li><strong>Projet coordonné par : </strong>
                        <?php if($meta_coordo && $meta_contact){ ?>        
                           <a href="mailto: <?php echo $meta_contact ; ?>" title="envoyer un email à <?php echo $meta_coordo ; ?>">
                                <?php echo $meta_coordo ; ?>
                           </a>
                        <?php } else { ?> 
                            <?php the_author_posts_link(); ?> 
                        <?php } ?>
                    </li>
                </ul>
                
                
                
                
                
            </header><!-- /post-header -->
        <?php } ?>
        
        <!-- Entry Content Start -->
        <article <?php post_class('entry clearfix fitvids'); ?>>
        	<div class="inner-post">
            	<?php the_content(); // This is your main post content output ?>
            </div><!-- /inner-post -->    
        </article><!-- /entry -->
        <!-- Entry Content End -->
        <div>            
            <h4 class="display_line"><span class="heading">Détails</span></h4>
            <ul class="meta">
                <?php if( $meta_lieux ) { ?>
                <li>
                    Emplacement :
                    <a href="http://nominatim.openstreetmap.org/search.php?q=<?php echo $meta_lieux ; ?>" title="lien vers une carte">
                        <?php echo $meta_lieux; ?>
                    </a>
                </li>
                <?php } ?>
                <li>
                <?php if( $meta_seances ) {echo 'Nb de Séances : '.$meta_seances ;} ?>
                <?php if( $meta_seances && $meta_public ){ echo ' - '; } ?>
                <?php if( $meta_public ) {echo 'Public : '.$meta_public;} ?>
                </li>
                
                <?php if(comments_open()) { ?>
                <li>
                    Nb de propositions : <?php comments_popup_link(__('La mission est disponible', 'wpex'), __('1 proposition', 'wpex'), __('% propositions', 'wpex'), 'voir les propositions' ); ?>
                </li>
                <?php } ?>
                                
                <li>Publié le : <?php echo get_the_date(); ?> par : <?php the_author_posts_link(); ?></li>
                            
            </ul>
    </div>
                
                
                <?php if( get_post_format() == 'quote' ){ ?><div class="quote-author">&#8211; <?php the_title(); ?></div><?php } ?>
            
        
        

        <?php wp_link_pages(); // Paginate pages when <!- next --> is used ?>
        
        <?php the_tags('<div id="post-tags" class="clearfix">','','</div>'); ?>
        
        <?php
		// Show author bio on all post formats except quotes
		if( get_post_format() !== 'quote' ) { ?>
            <div id="single-author" class="clearfix">
                <h4 class="heading"><span><?php the_author_posts_link(); ?></span></h4>
                <div id="author-image">
                   <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '45', '' ); ?></a>
                </div><!-- author-image --> 
                <div id="author-bio">
                    <p><?php the_author_meta('description'); ?></p>
                </div><!-- author-bio -->
            </div><!-- /single-author -->
        <?php } ?>
        
        <?php comments_template(); ?>
            
    </div><!-- /post -->
    
    <?php
    //end post loop
    endwhile; endif;
    
    //get template sidebar
    get_sidebar(); ?>
    
</div><!--/container -->
<?php
//get template footer
get_footer(); ?>