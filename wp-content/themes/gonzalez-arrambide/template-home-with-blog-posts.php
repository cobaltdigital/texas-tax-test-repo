<?php
/*
*	Template Name: Home with blog posts
*/ 
get_header(); 


?><div class="header-img">
 <?php
		$image_id = get_post_thumbnail_id();
		$featured_image = wp_get_attachment_image_src( $image_id,'' );
		echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
		 
?>													
															
</div>
                        
        <?php get_template_part('sections/slogan'); ?><div class="clearfix"></div>
        
           <hgroup class="page-head"> 
                    <?php
                        $page_title = get_post_meta($post->ID,'page_title',true);
                        if(empty($page_title))
                        {
                            $page_title = get_the_title();
                        }
                        $page_sub_title = get_post_meta($post->ID,'page_sub_title',true);
                    ?>                       		
                    <h1><?php echo $page_title; ?></h1>
                   
            </hgroup>
        
        
                          <div id="container">
                        		
                                 <div id="content" class="full-width">								
                                    <?php
                                    if ( have_posts() ) :
                                    while ( have_posts() ) : 
                                    the_post();																
                                      
									  the_content();  
									  
                                    endwhile;											 																										
                                    endif; 
                                    ?>										
                                </div>
                                
                                
                                <div class="official clearfix">
                                		
                                        <div class="home-left-side">                                        
                                                <?php echo do_shortcode("[pt_view id=24680f9fe9]"); ?>
                                                                                      
                                        </div><!-- home left side -->                                        
                                        
                                        <?php get_sidebar('home'); ?>                                        
                                                                       
                                </div> <!-- end of official -->
                                
							                             
								
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>