<?php get_header(); ?>

<hgroup class="page-head">
    <?php
    $current_term = get_term_by( 'slug', get_query_var('term') ,'gallery-item-type' );
    ?>
    <h1><span><?php echo $current_term->name; ?></span> <?php _e('Gallery Items', 'framework') ?></h1>
</hgroup>

<div id="container" class="clearfix">

    <div id="content" class="full-width">


        <?php
        global $gallery_name;
        $gallery_name = 'gallery-4-columns';

        global $gallery_image_size;
        $gallery_image_size = 'gallery-4-columns';

        $gallery_layout = get_option('theme_gallery_layout');

        if(!empty($gallery_layout)){
            switch($gallery_layout){
                case '2-columns':
                    $gallery_name = 'gallery-2-columns';
                    $gallery_image_size = 'gallery-2-columns';
                    break;
                case '3-columns':
                    $gallery_name = 'gallery-3-columns';
                    $gallery_image_size = 'three-columns-services';
                    break;
                case '4-columns':
                    $gallery_name = 'gallery-4-columns';
                    $gallery_image_size = 'gallery-4-columns';
                    break;
            }
        }
        ?>

        <div id="gallery-container" class="<?php echo $gallery_name; ?> isotope clearfix">
            <?php


            while ( have_posts() ) :
                the_post();

                $term_list = '';
                $terms =  get_the_terms( $post->ID, 'gallery-item-type' );

                if ( $terms && !is_wp_error( $terms ) ) :
                    foreach( $terms as $term )
                    {
                        $term_list .= $term->slug;
                        $term_list .= ' ';
                    }
                endif;

                if(has_post_thumbnail()):
                    ?>
                    <div <?php post_class("gallery-item isotope-item $term_list"); ?> >
                        <?php
                        $image_id = get_post_thumbnail_id();
                        $featured_image = wp_get_attachment_image_src( $image_id, $gallery_image_size );
                        $full_image_url = wp_get_attachment_url($image_id);
                        ?>
                        <a class="pretty-photo" href="<?php echo $full_image_url;  ?>"><?php echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'" >'; ?></a>
                        <h5 class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a></h5>
                        <?php
                        if ( $terms && !is_wp_error( $terms ) ):
                            $i = 0;
                            $count = count($terms);
                            echo '<span class="item-type-link">';
                            foreach($terms as $term)
                            {
                                $i++;
                                echo '<a href="'. get_term_link($term->slug, 'gallery-item-type' ).'">'.$term->name .'</a>';
                                if ($count != $i)
                                    echo ', ';
                            }
                            echo '</span>';
                        endif;
                        ?>
                    </div>
                    <?php
                endif;

            endwhile;
            ?>
        </div><!-- end of gallery container -->

    </div><!-- end of content -->

    <?php get_template_part('sections/twitter'); ?>

</div><!-- end of container -->

<?php get_footer(); ?>