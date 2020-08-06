<?php
    //save data
    function save_data(){

       if(isset($_POST['post_type']) && 'gallery' == $_POST['post_type']){
         // print_r($_POST);
         // exit();
         // die();
           
         $refer = explode('=', $_REQUEST['_wp_http_referer']) ;
         $type = end($refer);

         if($type == 'gallery'){
           global $wpdb;   
           $table = 'post_gallery';
           //define values
           $id = $_POST['post_ID'];
           $created_date = date("Y-m-d H:i:s"); 
           $case_details = sanitize_text_field($_POST['gcase_details']);
           $case_notes = sanitize_text_field($_POST['gcase_notes']);
           $surgeon = sanitize_text_field($_POST['surgeon']);
           $hide_from_live = sanitize_text_field($_POST['hide_from_live_hidden']);
           $feature_category = sanitize_text_field($_POST['feature_category_hidden']);
           $height = sanitize_text_field($_POST['gheight']);
           $weight = sanitize_text_field($_POST['gweight']);
           $age = sanitize_text_field($_POST['age']);
           $implant_size_left = sanitize_text_field($_POST['implant_size_left']);
           $implant_size_right = sanitize_text_field($_POST['implant_size_right']);
           $cup_size_before = sanitize_text_field($_POST['cup_size_before']);
           $cup_size_after = sanitize_text_field($_POST['cup_size_after']);
           $images = sanitize_text_field($_POST['images']);
           // define fields
           $data = array(
               'post_id' => $id,
               'created_date' => $created_date,
               'gcase_details' => $case_details,
               'gcase_notes' => $case_notes,
               'surgeon' => $surgeon,
               'hide_from_live' => $hide_from_live,
               'feature_category' => $feature_category,
               'gheight' => $height,
               'gweight' => $weight,
               'age' => $age,
               'implant_size_left' => $implant_size_left,
               'implant_size_right' => $implant_size_right,
               'cup_size_before' => $cup_size_before,
               'cup_size_after' => $cup_size_after,
               'images' => $images,
           );
           // define format fields
           $format = array(
               '%d', //post_id
               '%s',//'date'
               '%s',//'gcase_details'
               '%s',//'gcase_notes'
               '%s',//'surgeon'
               '%s',//'hide_from_live'
               '%s',//'feature_category'
               '%s',//'gheight'
               '%s',//'gweight'
               '%s',//'age'
               '%s',//'implant_size_left'
               '%s',//'implant_size_right'
               '%s',//'cup_size_before'
               '%s',//'cup_size_after'
               '%s', //images
           );
           $wpdb->insert($table, $data, $format);

         }else{

           //update values
           global $wpdb;   
           $table = 'post_gallery';

           $id = $_POST['post_ID'];
           $updated_date = date("Y-m-d H:i:s"); 
           $case_details = sanitize_text_field($_POST['gcase_details']);
           $case_notes = sanitize_text_field($_POST['gcase_notes']);
           $surgeon = sanitize_text_field($_POST['surgeon']);
           $hide_from_live = sanitize_text_field($_POST['hide_from_live_hidden']);
           $feature_category = sanitize_text_field($_POST['feature_category_hidden']);
           $height = sanitize_text_field($_POST['gheight']);
           $weight = sanitize_text_field($_POST['gweight']);
           $age = sanitize_text_field($_POST['age']);
           $implant_size_left = sanitize_text_field($_POST['implant_size_left']);
           $implant_size_right = sanitize_text_field($_POST['implant_size_right']);
           $cup_size_before = sanitize_text_field($_POST['cup_size_before']);
           $cup_size_after = sanitize_text_field($_POST['cup_size_after']);
           $images = sanitize_text_field($_POST['images']);

           $wpdb->update(
               //1° table
               $table,
               // 2° fields
               array(
                   'updated_date' => $updated_date,
                   'gcase_details' => $case_details,
                   'gcase_notes' => $case_notes,
                   'surgeon' => $surgeon,
                   'hide_from_live' => $hide_from_live,
                   'feature_category' => $feature_category,
                   'gheight' => $height,
                   'gweight' => $weight,
                   'age' => $age,
                   'implant_size_left' => $implant_size_left,
                   'implant_size_right' => $implant_size_right,
                   'cup_size_before' => $cup_size_before,
                   'cup_size_after' => $cup_size_after,
                   'images' => $images,
               ),
               //3° key
               array(
                   'post_id' => $id
               ),
               // 4° format
               array(
                   '%s',//'date'
                   '%s',//'gcase_details'
                   '%s',//'gcase_notes'
                   '%s',//'surgeon'
                   '%s',//'hide_from_live'
                   '%s',//'feature_category'
                   '%s',//'gheight'
                   '%s',//'gweight'
                   '%s',//'age'
                   '%s',//'implant_size_left'
                   '%s',//'implant_size_right'
                   '%s',//'cup_size_before'
                   '%s',//'cup_size_after'
                   '%s',// Images
               ),
               //5° fotmat key
               array(
                   '%d' //post_id
               )
           );
         //   $redirect = site_url().'/wp-admin/edit.php?post_type=gallery';
         //   wp_redirect($redirect);
         //   exit();
         }   
      }
   }
    add_action('init', 'save_data');  
?>