<?php
/*
Template Name: groupware
*/
?>
<?php get_header(); ?>
</div>
</div>


    <?php 
    /* recupere les variabes */
    $frame_url = get_post_meta($post->ID, 'frame_url', true);
    echo $frame_url;
    $frame_name = get_post_meta($post->ID, 'frame_name', true);
    if (!$frame_name){$frame_name = 'default_frame' ;}
    $frame_height = get_post_meta($post->ID, 'frame_height', true);
    if (!$frame_height){$frame_height='1550';}
    $frame_scroll = get_post_meta($post->ID, 'frame_scroll', true);
    if (!$frame_scroll){$frame_scroll='NO';}?>

    <!-- affiche les astuces !-->
    <div id="frame_tip"><p>Vous pouvez acceder directement au site que vous êtes en train d'utiliser en passant par cette adresse :
            <a href="<?php echo $frame_url; ?>"><?php echo $frame_url; ?></a></p></div>
    <div id="frame_holder">

    <?php // publie l'iframe si l'url est bonne
    if(valid_url($frame_url)){
        echo '<iframe name="'.$frame_name.'" src="'.$frame_url.'" width="100%" height="'.$frame_height.'" frameborder="NO" scrolling="'.$frame_scroll.'" id="iframe" class="egw"></iframe>';
    } else {    
        echo "<h1>l'adresse fournie dans le champs 'frame_url' n'est pas renseignée ou mal formatée.</h1><h3>contenu du champs frame_url :".$frame_url." </h3>";
    } ?>
    </div>
</div>
<div class="clearfix"></div>
<div id="footer" class="groupware">
    <div id="footer_wrap">
        <div class="left">
            <p>Vous visualisez une page externe depuis le site <a href="http://apdidf.org/">apdidf.org</a>.</p>
        </div>
        <div class="right">
            <p>Vous pouvez acceder directement au site que vous êtes en train d'utiliser en passant par cette adresse :
            <a href="<?php echo $frame_url; ?>"><?php echo $frame_url; ?></a></p>
        </div>
        <!-- <div class="last clear"></div>  -->
    </div>
</div><!-- end #footer -->

<?php wp_footer(); ?>

</body></html>