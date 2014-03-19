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
Template Name: Page Large
*/

get_header(); // Loads the header.php template

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="page-heading">
	<h1><?php the_title(); ?></h1>	
</div><!-- /page-heading -->


        <div id="single-page-content" class="container clearfix">
            <div class="entry clearfix">	
                <?php the_content(); ?>
            </div><!-- /entry -->
        </div><!-- /container -->

<?php    endwhile; endif;
get_footer(); // Loads the footer.php file ?>