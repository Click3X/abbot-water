<?php
    /**
    * front-page.php
    * The main post loop in ARIVA
    * @author Vulinhpc
    * @package ARIVA
    * @since 1.0.0
    */

    get_header();
    global $ts_ariva;
?>

    <!-- Main content -->
    <div id="main-content">

        <!-- HOME -->
        <div id="page-home" class="row tile vh-full">
            <div class="container">
                <?php
                while ( have_posts() ) : the_post();
                    // $logo = get_field('logo')['url'];
                 $logo = get_field('logo')['sizes']['logo'];
                    // echo $logo;
                endwhile;

                wp_reset_postdata(); 
                ?>
                
                <div class="logo-container">
                    <div class="logo-holder"><img src="<?php echo $logo; ?>"></div>
                    <h1><?php bloginfo('title'); ?></h1>
                    <h2><?php bloginfo('description'); ?></h2>
                </div>
                
            </div>
        </div>

        
        <!-- BIO -->
        <div id="page-bio" class="row">
            <div class="container">
                <?php
                    $args = array( 'page_id' => 8 );
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            
                            $name = get_field('name');
                            $title = get_field('title');
                            $image = get_field('image');

                            echo '<h1 class="page-title">'.get_the_title().'</h1>';

                            echo '<div class="half">';
                                echo '<h2>'.$name.'</h2>';
                                echo '<h3>'.$title.'</h3>';
                                echo '<img src="'.$image['url'].'" class="bio-img">';
                            echo '</div>';

                            echo '<div class="half">';
                                the_content();
                            echo '</div>';
                        }
                    } 
                    wp_reset_postdata();
                ?>                
            </div>
        </div>


        <!-- PHILOSOPHY -->
        <div id="page-philosophy" class="row">
            <div class="container">
                <?php
                    $args = array( 'page_id' => 10 );
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();

                            echo '<h1 class="page-title">'.get_the_title().'</h1>';
                            echo '<div class="whole">';
                                the_content();
                            echo '</div>';
                        }
                    } 
                    wp_reset_postdata();
                ?>                
            </div>
        </div>


        <!-- SERVICES -->
        <div id="page-services" class="row">
            <div class="container">
                <?php
                    $args = array( 'page_id' => 12 );
                    // The Query
                    $the_query = new WP_Query( $args );
                    // The Loop
                    if ( $the_query->have_posts() ) {
                        while ( $the_query->have_posts() ) {
                            $the_query->the_post();
                            echo '<h1 class="page-title">'.get_the_title().'</h1>';
                            echo '<div class="whole">';
                                the_content();
                            echo '</div>';
                        }
                    } 
                    wp_reset_postdata();
                ?>                
            </div>
        </div>

    </div>
    <!-- End / Main content -->

<?php get_footer();