<?php
/**
 * Create meta options for the post post type
 * @package Tetris WordPress Theme
 * @since 1.0
 * @author AJ Clarke : http://wpexplorer.com
 * @copyright Copyright (c) 2012, AJ Clarke
 * @link http://wpexplorer.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
 
// change field name for wpms instead of wpex
$prefix = 'wpap_';

$wpex_meta_box_post_settings = array(
    // Ajoute les champs spéciaux aux type outil - le type est défini plus bas dans la section adding cutom post type. 
    array(        
        'id' => 'apdidf-post-meta-box-outil',
        'title' =>  __('Complements', 'wpexuagraphite').'<a href="'.site_url().'/aide_privee" target="_blank">'. __('Aide', 'wpap').'</a>',
        'page' => 'outils',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(     
            array(
                'name' => __('Url de la ressource', 'wpap'),
                'id' => $prefix . 'post_url',
                'desc' =>  __('Entrer l\'adresse de la ressource', 'wpap') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Type d\'accès', 'wpap'),
                'id' =>  $prefix . 'post_access',
                'desc' =>  __('l\'accèss est il public ou privé', 'wpap') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Identifiants', 'wpap'),
                'id' =>  $prefix . 'post_id',
                'desc' =>  __('Avec quels identifiants faut-il se logguer', 'wpap') .' <a href="http://codex.wordpress.org/Embeds" target="_blank">'. __('Learn More', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),       
        ),
    ),

    // Ajoute les champs spéciaux aux type outil - le type est défini plus bas dans la section adding cutom post type  
    array(    
        'id' => 'apdidf-post-meta-box-mission',
        'title' =>  __('Détails de la Mission ', 'wpexuagraphite').'<a href="'.site_url().'/aide_privee" target="_blank">'. __('Aide', 'wpap').'</a>',
        'page' => 'missions',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(
            array(
                'name' => __('Qui peux postuler ?', 'wpap'),
                'id' => $prefix . 'miss_date',
                'desc' =>  __('Choisir qui peux postuler', 'wpap'),
                'std' => '',
                'type' => 'select',
                'options' => array(
                                'member' => __('Seulement les membres de l\'association', 'wpap'),
                                'tous'=> __('Tout le monde peux postuler', 'wpap'),
                                'personne'=> __('Personne ne peux postuler', 'wpap'),
                            ),
            ),            
            array(
                'name' => __('Début', 'wpap'),
                'id' => $prefix . 'miss_date',
                'desc' =>  __('Choisir la date de démarrage du projet', 'wpap'),
                'std' => '',
                'type' => 'date',
            ),
            array(
                'name' => __('Contact différent', 'wpap'),
                'id' =>  $prefix . 'miss_coordo',
                'desc' =>  __('Permet de donner des informations de contacts supplémantaires - il est possible de changer l\'auteur ailleurs', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Email', 'wpap'),
                'id' =>  $prefix . 'm de ce contactiss_contact',
                'desc' =>  __('email du contact ci-dessus', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Emplacement', 'wpap'),
                'id' =>  $prefix . 'miss_lieux',
                'desc' =>  __('Ne pas mettre l\'adresse exacte mais la ville ou le quartier', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Durée', 'wpap'),
                'id' =>  $prefix . 'miss_seances',
                'desc' =>  __('Durée du projet, nb de séances, ...', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Public', 'wpap'),
                'id' =>  $prefix . 'miss_public',
                'desc' =>  __('Public concerné', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            
        ),
    ),
    
     // Ajoute les champs spéciaux aux type formation - le type est défini plus bas dans la section adding cutom post type  
    array(
        'id' => 'apdidf-post-meta-box-formation',
        'title' =>  __('Détails de la formation ', 'wpexuagraphite').'<a href="'.site_url().'/aide_privee" target="_blank">'. __('Aide', 'wpap').'</a>',
        'page' => 'formations',
        'context' => 'normal',
        'priority' => 'high',
        'fields' => array(     
            array(
                'name' => __('Début', 'wpap'),
                'id' => $prefix . 'form_date',
                'desc' =>  __('Début de la formation :', 'wpap'),
                'std' => '',
                'type' => 'date',
            ),
           array(
                'name' => __('Durée', 'wpap'),
                'id' =>  $prefix . 'form_duree',
                'desc' =>  __('Durée de cette formation :', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Lieux', 'wpap'),
                'id' =>  $prefix . 'form_places',
                'desc' =>  __('Ou se déroule la formation : ', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),            
            array(
                'name' => __('Inscription', 'wpap'),
                'id' =>  $prefix . 'form_inscriptions',
                'desc' =>  __('Détails sur l\'inscription', 'wpap'),
                'std' => '',
                'type' => 'text',
            ),            
        ),
    ),
);

    
    


/*-----------------------------------------------------------------------------------*/
// Display meta box in edit post page
/*-----------------------------------------------------------------------------------*/

add_action('admin_menu', 'wpex_add_box_post_settings');

function wpex_add_box_post_settings() {
	global $wpex_meta_box_post_settings;
	
    foreach ($wpex_meta_box_post_settings as $wpex_settings) {
        
	add_meta_box($wpex_settings['id'], $wpex_settings['title'], 'wpex_show_box_post_settings', $wpex_settings['page'], $wpex_settings['context'], $wpex_settings['priority']);
    }
}
/*-----------------------------------------------------------------------------------*/
// adding custom post type
/*-----------------------------------------------------------------------------------*/
/*

you will find them in the function.php file 

*/
/*-----------------------------------------------------------------------------------*/
//	Callback function to show fields in meta box
/*-----------------------------------------------------------------------------------*/

function wpex_show_box_post_settings() {
	global $wpex_meta_box_post_settings, $post;
	
	// Use nonce for verification
	echo '<input type="hidden" name="wpex_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
	echo '<table class="form-table">';
    
    // parse post_type custom settings array
    foreach ($wpex_meta_box_post_settings as $wpex_settings) {
        
        // checking if a custom post type exist
        if ($wpex_settings['page'] == get_post_type($post)) {    
    
            // parse all fields
            foreach ($wpex_settings['fields'] as $field) {
                
                // get current post meta data & set default value if empty
                $meta = get_post_meta($post->ID, $field['id'], true);
                
                if (empty ($meta)) {
                    $meta = $field['std']; 
                }
                
                switch ($field['type']) {
                    
                    //If Text		
                    case 'text':
                    
                    echo '<tr style="border-top:1px solid #eeeeee;">',
                        '<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
                        '<td>';
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
                    
                    break;
                    
                     //If date		
                    case 'date':
                    
                        echo '<tr style="border-top:1px solid #eeeeee;">',
                            '<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#777; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
                            '<td>';
                        echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta :
                        stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
                        ?>
                        <script>
                            jQuery(document).ready(function(){        
                                jQuery.datepicker.setDefaults(jQuery.datepicker.regional["fr"]);
                                jQuery("input[name='<?php echo $field['id']; ?>']" ).datepicker({dateFormat: 'yy-mm-dd', numberOfMonths: 2, firstDay: 1 });
                                jQuery( "#ui-datepicker" ).hide();
                            });
                        </script>
                        <?php
                        // end of date case
                    break;
                    
                     //If select	
                    case 'select':
                        echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                        foreach ($field['options'] as $option) {
                            
                            echo '<option value="', $option['value'], '"', $meta == $option['value'] ? ' selected="selected"' : '', '>', $option['id'], '</option>';
                        }
                        echo '</select>';
                                            
                    break;
        
                }
        
            }
        }
    }
 
	echo '</table>';
}
 
add_action('save_post', 'wpex_save_data_post');

/*-----------------------------------------------------------------------------------*/
//	Save data when post is edited
/*-----------------------------------------------------------------------------------*/
 
function wpex_save_data_post($post_id) {
	global $wpex_meta_box_post_settings;
	
	if(!isset($_POST['wpex_meta_box_nonce'])) $_POST['wpex_meta_box_nonce'] = "undefine";
 
	// verify nonce
	if (!wp_verify_nonce($_POST['wpex_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}
 
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}
 
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
 
    
    // parse post_type custom settings array
    foreach ($wpex_meta_box_post_settings as $wpex_settings) {
        
        // checking if a custom post type exist
        if ($wpex_settings['page'] == get_post_type($post)) {    
    
            // parse all fields
            foreach ($wpex_settings['fields'] as $field) {
    
            // old loop Save fields
            //foreach ($wpex_meta_box_post_settings['fields'] as $field) {
                
                $old = get_post_meta($post_id, $field['id'], true);
                $new = $_POST[$field['id']];
 
                if ($new && $new != $old) {
                    update_post_meta($post_id, $field['id'], stripslashes(htmlspecialchars($new)));
                } elseif ('' == $new && $old) {
                    delete_post_meta($post_id, $field['id'], $old);
                }
	       }
        }
    }

}

//Register datepicker ui for properties
function admin_homes_for_sale_javascript(){
    global $post;
    if(is_admin()) {       
        wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('jquery-ui-datepicker-fr', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/i18n/jquery.ui.datepicker-fr.js'); 
    }
}
add_action('admin_print_scripts', 'admin_homes_for_sale_javascript');


// Register ui styles for properties
function admin_homes_for_sale_styles(){
    global $post;
    if(is_admin()) {
        wp_enqueue_style('jquery-style', 'http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css'); 
    }
}
add_action('admin_print_styles', 'admin_homes_for_sale_styles');






?>