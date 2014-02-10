<?php
/**
 * Author.php loads the author pages with a listing of their posts
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

// Start loop
if(have_posts()) : ?>


	<?php
    if(isset($_GET['author_name'])) :
    $curauth = get_userdatabylogin($author_name);
    else :
    $curauth = get_userdata(intval($author));
    endif;
    ?>
    


<div id="blog-wrap" class="blog-isotope clearfix">    
	
    <!-- author bio = fisrt article --> 
    <article <?php post_class('blog-entry clearfix'); ?>>  
	<?php
    // Get resize and show featured image : refer to functions/img_defaults.php for default values
    $wpex_entry_img = aq_resize( wp_get_attachment_url( get_post_thumbnail_id(), 'full' ),  wpex_img( 'blog_entry_width' ), wpex_img( 'blog_entry_height' ), wpex_img( 'blog_entry_crop' ) );
    	//if($wpex_entry_img) {  ?>
        <div class="blog-entry-thumbnail">
            <a href="<?php echo $curauth->display_name ; ?>"><?php echo get_avatar( $curauth->ID, '45', '' ); ?></a>
        </div><!-- /blog-entry-thumbnail -->
    <?php //} ?>
    <div class="entry-text clearfix">
        <header>
            <h2><?php the_author_posts_link(); ?></h2>
        </header>
		<?php echo wp_trim_words(($curauth->description), 20);?>
    </div><!-- /entry-text -->
    </article><!-- /blog-entry -->
    <!-- / author bio -->

    
    <?php
    while (have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );   
    endwhile;        	
    ?>
</div><!-- /post -->

<?php
wpex_pagination(); // Paginate your posts
endif; 
get_footer(); //get template footer ?>