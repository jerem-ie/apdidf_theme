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
// Les images sont dans le dossier image du thème
$img_url = 'http://test.apdidf.org/wp-content/themes/Tetris_c/images/icone_mission.png';
?>


<article <?php post_class('blog-entry rows3 mission clearfix'); ?>>  


        <div class="blog-entry-thumbnail">
            <a href="http://test.apdidf.org/mission/" title="Lien vers la catégorie toute les formations"><img src="<?php echo $img_url; ?>" alt="icone de la catégorie" /></a>
            <h2>LES MISSIONS</h2>
        </div><!-- /blog-entry-thumbnail -->

    <div class="entry-icone">        

        <ul class="entry-meta">
        	<li><a href="http://test.apdidf.org/mission/" title="Lien vers la catégorie toute les formations">Voir toutes les missions &rarr;</a></li>
            <li><a href="http://test.apdidf.org/mission/" title="Lien vers la catégorie toute les formations">Proposer un projet &rarr;</a></li>
        </ul><!-- /entry-meta -->
    </div><!-- /entry-text -->
</article><!-- /blog-entry -->