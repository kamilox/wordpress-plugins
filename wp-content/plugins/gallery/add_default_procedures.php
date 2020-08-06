<?php
//Face procedures
$face_procedures_childs = ($_POST['face-procedures']);
//Check if face procedures child exist & if don't exist create the category 
if($face_procedures_childs != null){
    wp_insert_term(
        'Face procedures',    //the term 
        'procedures',  //the taxonomy
        array(
            'description' => 'Face procedures',
            'slug'        => 'face-procedures',
            'parent'      => 'procedures',
            )
        );
    $parent_term_face = term_exists( 'face-procedures', 'procedures' ); // array is returned if taxonomy is given
    $parent_term_face_id = $parent_term_face['term_id'];         // get numeric term id
    foreach ($face_procedures_childs as $key => $face) {
        wp_insert_term(
            $face,   // the term 
            'procedures', // the taxonomy
            array(
            'description' => $face,
            'slug'        => strtolower(str_replace(' ','-',$face)),
            'parent'      => $parent_term_face_id,
            )
        );          
    }
}
//End Face procedures
//Breast Procedures
$breast_procedures_childs = ($_POST['breast-procedures']);
//Check if breast procedures child exist & if don't exist create the category 
if($breast_procedures_childs != null){
    wp_insert_term(
        'Breast procedures',    //the term 
        'procedures',  //the taxonomy
        array(
            'description' => 'Breast procedures',
            'slug'        => 'breast-procedures',
            'parent'      => 'procedures',
            )
        );
    $parent_term_breast = term_exists( 'breast-procedures', 'procedures' ); // array is returned if taxonomy is given
    $parent_term_breast_id = $parent_term_breast['term_id'];         // get numeric term id
    foreach ($breast_procedures_childs as $key => $breast) {
        wp_insert_term(
            $breast,   // the term 
            'procedures', // the taxonomy
            array(
            'description' => $breast,
            'slug'        => strtolower(str_replace(' ','-',$breast)),
            'parent'      => $parent_term_breast_id,
            )
        );          
    }
}
//End Breast Procedures
// Body Procedures
$body_procedures_childs = ($_POST['body-procedures']);
//Check if body procedures child exist & if don't exist create the category 
if($body_procedures_childs != null){
    wp_insert_term(
        'Body procedures',    //the term 
        'procedures',  //the taxonomy
        array(
            'description' => 'Body procedures',
            'slug'        => 'body-procedures',
            'parent'      => 'procedures',
            )
        );
    $parent_term_body = term_exists( 'body-procedures', 'procedures' ); // array is returned if taxonomy is given
    $parent_term_body_id = $parent_term_body['term_id'];         // get numeric term id
    foreach ($body_procedures_childs as $key => $body) {
        wp_insert_term(
            $body,   // the term 
            'procedures', // the taxonomy
            array(
            'description' => $body,
            'slug'        => strtolower(str_replace(' ','-',$body)),
            'parent'      => $parent_term_body_id,
            )
        );          
    }
}
// End Body Procedures
// Medical Spa Procedures
$medical_spa_procedures_childs = ($_POST['medical-spa-procedures']);
//Check if medical-spa procedures child exist & if don't exist create the category 
if($medical_spa_procedures_childs != null){
    wp_insert_term(
        'Medical spa procedures',    //the term 
        'procedures',  //the taxonomy
        array(
            'description' => 'Medical spa procedures',
            'slug'        => 'medical-spa-procedures',
            'parent'      => 'procedures',
            )
        );
    $parent_term_medical_spa = term_exists( 'medical-spa-procedures', 'procedures' ); // array is returned if taxonomy is given
    $parent_term_medical_spa_id = $parent_term_medical_spa['term_id'];         // get numeric term id
    foreach ($medical_spa_procedures_childs as $key => $medical_spa) {
        wp_insert_term(
            $medical_spa,   // the term 
            'procedures', // the taxonomy
            array(
            'description' => $medical_spa,
            'slug'        => strtolower(str_replace(' ','-',$medical_spa)),
            'parent'      => $parent_term_medical_spa_id,
            )
        );          
    }
}

if(count($_POST) > 1){
    ?>
    <script>window.location = "<?php echo admin_url('admin.php?page=default_procedures'); ?>";</script>
    <?php
}

// EndMedical Spa Procedures
// Laser Treatments
//End Laser Treatments
    
?>
