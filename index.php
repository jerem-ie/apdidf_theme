<?php
/**
 * Index.php is the default template. This file is used when a more specific template can not be found to display your posts.
 * It is unlikely this template file will ever be used, but it's here to back you up just incase.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

get_header(); // Loads the header.php template

if (have_posts()) : ?>
<div id="blog-wrap" class="blog-isotope clearfix">   
	<?php

    // affiche les outils en page d'accueil :
    if (is_front_page() && is_user_logged_in() ){
        
        /* Pour aller plus vite, on fait le tout a la main. TODO : une vraie liste d'outils généré automatiquement. 
        // arguments pour filtrer les posts
        $args = array( 
            'post_type' => 'outils',
            'posts_per_page' => 10 
        );        
                
        // on crée une liste de post avec les arguments ci-dessus,
        $outils_query = new WP_Query($args); 
        
        // La boucle qui affiche la première serie de posts, 
        while($outils_query->have_posts()) : $outils_query->the_post();
            get_template_part( 'apdidf/_outils', get_post_format() );            
        endwhile;
        
        // remise a zero de la boucle ( sinon, ca casse tout !)
        wp_reset_postdata();
        */ 
        
        get_template_part('apdidf/icons','outils');
                
    }
        get_template_part('apdidf/icons','sites');
    // affiche les dernières formations en page d'accueil :    

    // affiche l'icone formation en premier - prends le template apdidf/icon-formation.php
        get_template_part('apdidf/icons','formation');    
        
    // arguments pour filtrer les posts
        $args = array( 
            'post_type' => 'formations',
            'posts_per_page' => 3
        );        
                
        // on crée une liste de post avec les arguments ci-dessus,
        $missions_query = new WP_Query($args);
        
        // La boucle qui affiche la première serie de posts, 
        while($missions_query->have_posts()) : $missions_query->the_post();            
            get_template_part( 'content_formations', get_post_format() );            
        endwhile;
        
        // remise a zero de la boucle ( sinon, ca casse tout !)
        wp_reset_postdata();

    // affiche l'icone formation en premier - prends le template apdidf/icon-formation.php
        get_template_part('apdidf/icons','mission'); 


    // affiche les dernières missions en page d'accueil :
    // arguments pour filtrer les posts
        $args = array( 
            'post_type' => 'missions',
            'posts_per_page' => 10
        );        
                
        // on crée une liste de post avec les arguments ci-dessus,
        $missions_query = new WP_Query($args); 
        
        // La boucle qui affiche la première serie de posts, 
        while($missions_query->have_posts()) : $missions_query->the_post();
            get_template_part( 'content_missions', get_post_format() );            
        endwhile;
        
        // remise a zero de la boucle ( sinon, ca casse tout !)
        wp_reset_postdata();




	// Loop through each post
    while (have_posts()) : the_post();
        get_template_part( 'content', get_post_format() );   
    endwhile;        	
    ?>           
</div><!-- /post -->
<?php
wpex_pagination(); // Paginate your posts
endif;
get_footer(); //get template footer ?>