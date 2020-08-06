<?php
/*
* Template Name: Galleries
*/
get_header();
global $wp, $wpdb, $post;
$url = (explode('/',$_SERVER["PHP_SELF"]));
$url_count = count($url);
$url_name = strval($url[$url_count-2]);

$result = $wpdb->get_results('SELECT * FROM wp_posts WHERE post_name ='.'"'.$url_name.'"'.'');
$id = $wpdb->get_results('SELECT * FROM post_gallery WHERE post_id ='.$result[0]->ID.'');
$post = get_post($result[0]->ID);

?>
<body>
    <div class="container">
        <div class="container-gallery">
            <div class="row">
                <div class="navigator">
                <?php $prev = get_previous_post_link( '%link', '<span class="meta-nav">' .     
                    _x( '&#9668; Previous', 'Previous post link','category' ,TRUE ) . '</span>' ); ?>
                    <?php if ($prev) : ?>
                    <div class="nav-previous"><?php echo $prev ?></div>
                    <? endif; ?>

                    <?php $next = get_next_post_link( '%link', '<span class="meta-nav">' . _x( 'Next &#9658; ', 'Next post link', 'category',TRUE ) . '</span>' ); ?>
                    <?php if ($next) : ?>
                    <div class="nav-next"><?php echo $next ?> </div>
                    <?php endif; ?>
                    <div class="nav-next">
                        <a href="#" name="btn-gallery" id="btn-gallery" class="btn-nav">Gallery</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 gallery-title">
                    <h3><?php echo the_title() ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-4 gallery-image">
                    <a href="#" name="btn-contact-us" id="btn-contact-us" class="btn-nav">Contact us</a>
                    <div class="gallery-patient-terms">
                        <?php 
                        if(get_the_terms($post->ID, 'procedures') != null){
                            $terms = get_the_terms( $post->ID, 'procedures' ); 
                            foreach($terms as $term) {
                            echo $term->name .'<br>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="col-8 gallery-image gallery-image-master">
                    <?php
                        if(get_the_post_thumbnail()){
                            echo get_the_post_thumbnail();
                        }else{
                            $images = explode(',',$id[0]->images);
                            $imageFirst = array_shift($images);
                            $imageExplode = explode('*', $imageFirst);
                            echo '<img src="'.$imageExplode[0].'" >';
                        }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 gallery-carusel">
                    <?php 
                        echo get_the_post_thumbnail();
                        $images = explode(',',$id[0]->images);
                        foreach ($images as $key => $value) {
                            $image = explode('*',$value);
                            if($image[0] != null){
                                echo '<img src="'.$image[0].'" class="img-gallery-item" />';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
get_footer();
?>
