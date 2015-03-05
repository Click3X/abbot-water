<?php 
    global $ts_ariva;
 ?>
<div id="filters-portfolio" class="cbp-l-filters-alignCenter">
    <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">
        <?php echo __('All', 'themestudio') ?>
    </div>
    <?php
        $portfolio_terms = array();
        $args = array(
            'orderby'           => 'id',
        ); 
         $portfolio_terms  =  get_terms("portfolio_cats",$args); 
            foreach( $portfolio_terms as $portfolio_cat ){
                echo '<div class="cbp-filter-item" data-filter=".'. $portfolio_cat->slug .'">'. $portfolio_cat->name .'</div>';
            }

    ?>
</div>