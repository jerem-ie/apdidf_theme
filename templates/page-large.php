<?php
/**
 * Page.php is used to render your regular pages.
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/*
Template Name: Page Privé
*/

get_header(); // Loads the header.php template

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->

 <?php if (! is_user_logged_in()) : ?>
        
        <h3 class="comments-title"><span>Comment Participer ?</span></h3>
        <p>Pour participer,il faut être membre actif de l'association des Petits Débrouillards Ile-de-France</p>
        <p>Je ne suis pas membre de l'association,<a href="<?php echo site_url(); ?>/adherer" title="lien vers la page d'adhésion"> comment vous rejoindre ?</a>
        <br />
        Je suis membre de l'association, je me connecte via ce formulaire &rarr;</p>
        <?php wp_login_form(); ?>
        <p>Les identifiants sont ceux du débrouillonet, que vous avez reçu sur votre adresse email lors de votre adhésion au Petits Débrouillards. Si cela ne vous dit rien, vous trouverez de l'aide <a href="<?php echo site_url(); ?>/identifiant" title="lien vers la page d'aide">sur cette page.</a></p>
            
        
    
    <?php else : ?>

        <div id="single-page-content" class="container clearfix">
            <div class="entry clearfix">	
                <?php the_content(); ?>
            </div><!-- /entry -->
        </div><!-- /container -->

<?php endif;

    endwhile; endif;
get_footer(); // Loads the footer.php file ?>