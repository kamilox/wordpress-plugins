<?php
/**
 * Plugin Name: Gallery
 * Description: Makes your custom images gallery
 * Version: 1.0.0
 * Author: Camilo Contreras
 * Text Domain: Gallery
 */

/**
 * Gallery main plugin file.
 */

 // db Connection
require_once('inc/bd.php');
//require_once('add_default_procedures.php');

function styles(){
    wp_enqueue_style('parent-style',  plugins_url( '/inc/css/style.css', __FILE__ ) );
    wp_enqueue_script('jquery');
    wp_enqueue_script('media_uploader',  plugins_url( '/inc/js/media_uploader.js', __FILE__ ), array('jquery'), 1.0);
    wp_enqueue_script('new_image_row',  plugins_url( '/inc/js/new_image_row.js', __FILE__ ), array('jquery'), 1.0);
    wp_enqueue_script('add_procedures',  plugins_url( '/inc/js/add_procedures.js', __FILE__ ), array('jquery'), 1.0);
    wp_enqueue_script('gallery-carousel',  plugins_url( '/inc/js/gallery-carousel.js', __FILE__ ), array('jquery'), 1.0);
}
add_action('init', 'styles');

function gallery(){
    $labels = array(
        'name' => _x('All Patients Gallery', get_current_theme()),
        'singular_name' => _x('Gallery', get_current_theme()),
        'menu_name' => _x('Gallery', get_current_theme()),
        'name_admin_bar' =>  _x('Admin bar', get_current_theme()),
        'add_new' =>  _x('Add New Patient' , get_current_theme()),
        'add_new_item' =>  _x('Add new patient', get_current_theme()),
        'new_item' =>  _x('New Patient', get_current_theme()),
        'edit_item' =>  _x('Edit Patient', get_current_theme()),
        'view_item' =>  _x('View Patient', get_current_theme()),
        'all_items' =>  _x('All Patients', get_current_theme()),
        'search_item' =>  _x('Search Patient', get_current_theme()),
        'parent_item_colon' =>  _x('Parent item colon', get_current_theme()),
        'not_found' =>  _x('Patient not found ', get_current_theme()),
        'not_found_in_trash' => _x('Patient not found in trash', get_current_theme()),
    );

    $args = array(
        'labels' => $labels,
        'description' => __('Post images types', get_current_theme()),
        'public' => true,
        'publicly_qweryable' => true,
        'show_ui' => true,
        'show_in_menu' => 'photo_gallery',
        'rewrite' => array('slug' => 'gallery'),
        'capability_type' => 'post',  
        'has_archive' => true,
        'hierarchical' => true,
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'page-attributes'),
        'can_export' => true,
        'taxonomies'    => array(
            'procedures'
        )
        
    );
    register_post_type('gallery', $args);
}
add_action('init', 'gallery');
//add custom links
function add_gallery_submenu(){
    add_menu_page(
        'photo_gallery',
        'Photo gallery',
        'manage_options',
        'photo_gallery',
        'labels',
        'dashicons-admin-page', 
        6
    );

    add_submenu_page(
        'photo_gallery',//parent slug
        '', // 
        'Add new patient', //
        'manage_options', // 
        'gallery', //  
        'add_new_item' // 
    );

    add_submenu_page(
        'photo_gallery',//parent slug
        '', // 
        'Procedures', //
        'manage_options', // 
        'procedures', //  
        'procedures' // 
    );
    
    add_submenu_page(
        'photo_gallery',//parent slug
        '', // 
        'Default procedures', //
        'manage_options', // 
        'default_procedures', //  
        'default_procedures' // 
    );
}
add_action('admin_menu', 'add_gallery_submenu');

// Template 

add_filter( 'template_include', 'wpa3396_page_template' );
function wpa3396_page_template( $template )
{
    if ( $post['post_type'] = "gallery")  {
       
        $template = dirname( __FILE__ ) . '/custom-page-template.php';
    }
    return $template;
}



//

//url add new item
function add_new_item() {
    ?><script>window.location = "<?php echo admin_url('post-new.php?post_type=gallery'); ?>";</script><?php 
}

//url add new item
function procedures() {
    ?>
    <script>window.location = "<?php echo admin_url('edit-tags.php?taxonomy=procedures&post_type=gallery'); ?>";</script>
    <?php
}

function default_procedures() {
    require_once('default_procedures.php');
}


//add taxonomies
function type_taxonomies(){
    register_taxonomy(
        'procedures',
        'gallery',
        array(
            'hierarchical' => true,
            'label' => 'Procedures',
            'sort' => true,
            'args' => array('orderby' => 'term_order'),
            'rewrite' => array('slug' => 'procedures')
        )
    ); 
    
}
add_action('init', 'type_taxonomies');
// add submenu fields

require_once('image-taxonomy.php');

//add fields
function add_custom_fields() {
    $page = 'gallery';
    $context = 'normal';
    $priority = 'high';

    add_meta_box( 'case-details', 'Case Details', 'case_details',$page, $context, $priority );
    add_meta_box( 'surgeon', 'Surgeon', 'surgeon', $page, $context, $priority );
    add_meta_box( 'display_options', 'Display Options', 'display_options', $page, $context, $priority );
    add_meta_box( 'patient_information', 'Patient Information', 'patient_information', $page, $context, $priority );
    add_meta_box( 'patient_images', 'Patient pictures', 'patient_images', $page, $context, $priority );
}
add_action( 'add_meta_boxes', 'add_custom_fields' );

function case_details($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$id.'');
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="case_details">Case Title*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_details" id="gcase_details" value="<?php echo $result[0]->gcase_details ?>" required />
            </div>
            <div class="custom-fields-title">
                <label for="case_details">Case Notes*:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gcase_notes" id="gcase_notes" value="<?php echo $result[0]->gcase_notes ?>" required />
            </div>
        </div>
    <?php
}

function surgeon($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$id.'');
   
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="surgeon">Surgeon:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="surgeon" id="surgeon" value="<?php echo $result[0]->surgeon ?>" />
            </div>
        </div>    
        <p>If empty, surgeon name from Gallery Settings will display at front.</p>
    <?php

}
function display_options($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$id.'');
    
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="display_options">Hide from live site:</label>
            </div>
            <div class="custom-fields-input">
                <input type="checkbox" name="hide_from_live" id="hide_from_live" value="" />
                <input type="hidden" name="hide_from_live_hidden" id="hide_from_live_hidden" value="<?php echo $result[0]->hide_from_live ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="display_options">Feature within category:</label>
            </div>
            <div class="custom-fields-input">
                <input type="checkbox" name="feature_category" id="feature_category" value="" />
                <input type="hidden" name="feature_category_hidden" id="feature_category_hidden" value="<?php echo $result[0]->feature_category ?>" />
            </div>
        </div>
    <?php
}

function patient_information($post){
    //recover data from db to edit
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$id.'');
    
    ?>
        <div class="custom-fields">
            <div class="custom-fields-title">
                <label for="patient_information">Height:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gheight" id="gheight" value="<?php echo $result[0]->gheight ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Weight:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="gweight" id="gweight" value="<?php echo $result[0]->gweight ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Age:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="age" id="age" value="<?php echo $result[0]->age ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Left:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_left" id="implant_size_left" value="<?php echo $result[0]->implant_size_left ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Implant Size Right:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="implant_size_right" id="implant_size_right" value="<?php echo $result[0]->implant_size_right ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size Before:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_before" id="cup_size_before" value="<?php echo $result[0]->cup_size_before ?>" />
            </div>
            <div class="custom-fields-title">
                <label for="patient_information">Cup Size After:</label>
            </div>
            <div class="custom-fields-input">
                <input type="text" name="cup_size_after" id="cup_size_after" value="<?php echo $result[0]->cup_size_after ?>" />
            </div>
        </div>
        
    <?php
}

function patient_images($post){
    global $wpdb;
    $id = get_the_ID();
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$id.'');
    $images = $result[0]->images;
    $arrayImages = explode(",", $images);
    foreach ($arrayImages as $key => $value) {
        $rowId[$key] = explode('*', $value);
    }?>
        <div class="gallery">
            <div class=" messages"></div>
            <?php
    if($images != ""){
            $count = count($rowId) / 2;
        
            for ($i=1; $i < $count  ; $i++) { 
                if($rowId[$i][2] === $rowId[$i][2]){
                    $before = $rowId[$i];
                    $after =  $rowId[$i+1];
                ?>
            <div class="gallery-container" id="<?php echo 'id-'.$i ?>">
                <input type="button" class="close-div" value="x" onclick="closeDiv('close-div')"  id='close'/>
                <div class="gallery-item gallery-before">
                    <H3>Before</H3>
                    <div class="image-container">
                        <img src="<?php echo $before[0] ?>" id="image-before-<?php echo $i; ?>"  class="picture-before">
                    </div>
                    <div class="button-container">
                        <input type="button" class="button update_image_before" id="button-before-<?php echo $i; ?>" value="Update image" onclick="updateImage('id-<?php echo $i; ?>','x', 0,'<?php echo $before[0]  ?>' ,'indexId')"/>
                        <input type="hidden" id="image_before_hidden-<?php echo $i; ?>" class='profile_picture_before' value = "<?php echo $before[0] ?>" />
                    </div>
                </div>
                <div class="gallery-item gallery-after">
                    <H3>After</H3>
                    <div class="image-container">
                        <img src="<?php echo $after[0] ?>" id="image-after-<?php echo $i; ?>" class="picture-after">
                    </div>
                    <div class="button-container">
                        <input type="button" class="button button-secondary button-load-after" id="button-after-<?php echo $i; ?>"  value="Upload File" onclick="updateImage('id-<?php echo $i; ?>','y', 0,'<?php echo $before[0]  ?>', 'indexId')"/>
                        <input type="hidden" id="image_after_hidden-<?php echo $i; ?>" class='profile_picture_after' value = "<?php echo $after[0] ?>" />
                    </div>
                </div>
            </div>
            <?php  
                }//end if
            }// end for
    }else{ ?>
            <div class="gallery-container" id="id-1">
                <input type="button" class="close-div" value="x" onclick="closeDiv('close-div')"  id='close'/>
                <div class="gallery-item gallery-before">
                    <H3>Before</H3>
                    <div class="image-container">
                        <img src="" id="image-before-1"  class="picture-before">
                    </div>
                    <div class="button-container">
                        <input type="button" class="button button-secondary button-load-before" id="button-before-1" value="Upload File" onclick="imageBefore('button-load-before','x', 0, 'indexId')"/>
                        <input type="hidden" id="image_before_hidden-1" class='profile_picture_before' value = "" />
                    </div>
                </div>
                <div class="gallery-item gallery-after">
                    <H3>After</H3>
                    <div class="image-container">
                        <img src="" id="image-after-1" class="picture-after">
                    </div>
                    <div class="button-container">
                        <input type="button" class="button button-secondary button-load-after" id="button-after-1"  value="Upload File" onclick="imageAfter('button-load-after','y', 0, 'indexId')"/>
                        <input type="hidden" id="image_after_hidden-1" class='profile_picture_after' value = "" />
                    </div>
                </div>
            </div>
    <?php 
    } ?>
        </div><!-- end gallery-->
        <div class="new-row">
            <input type="hidden" name="images" id="images" value="<?php echo $images ?>" />
            <input type="button"  class="button button-secondary" id="new-row" name="new-row" value= "Add new row" onclick="addNewRow($('.gallery-container').last().attr('id'))">
        </div>
    <?php
}
add_filter( 'wp_nav_menu_items', 'your_custom_menu_item', 10, 2 );
function your_custom_menu_item ( $items, $args ) {
    if (is_single() && $args->theme_location == 'primary') {
        $items .= '<li>Show whatever</li>';
    }
    return $items;
}

//customize view all patients
function custom_list_admin_patients($column){
    $columns = array(
        'cb' => '<input type="checkbox" / >',
        'ID' => 'ID',
        'feature_thumb'=> 'Photo',
        'title' => 'Title',
        'case_notes' => 'Case Notes',
        'category' => 'Category',
        'author' => 'Author',
        'date' => 'Date'
    );
    return $columns;
}
add_filter('manage_edit-gallery_columns', 'custom_list_admin_patients');

//send data to each field in view all patients

function send_data($columns, $post_id){
    global $post;
    global $wpdb;
    $result = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$post_id.'');
    switch($columns){
        case 'feature_thumb':
            echo '<a href="'.get_edit_post_link().' " >';
            echo the_post_thumbnail('thumbnail');
            echo '</a>';
        break;
     
        case 'ID':
            echo $post_id;
        break;

        case 'case_notes':
            echo  $result[0]->gcase_notes ;
        break;
        case 'category':
            the_taxonomies($post_id);
        break;
        
    default;
    break;
    }

}
add_action('manage_gallery_posts_custom_column', 'send_data', 10, 2);
// add procedures

//Short code Gallery
//[gallery-patients]
function carousel(){
    return require_once('gallery-images.php');;
}
add_shortcode( 'gallery-patients', 'carousel' );
?>

