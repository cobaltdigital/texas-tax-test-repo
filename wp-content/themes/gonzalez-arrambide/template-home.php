<?php
/*
*	Template Name: Home
*/ 
get_header(); 

get_template_part('sliders/slider'); 

?>
  <?php get_template_part('sections/slogan'); ?> 
  <h2>&nbsp;</h2>
    <div id="container"> <div id="content" class="full-width">  <?php
                                    if ( have_posts() ) :
                                    while ( have_posts() ) : 
                                    the_post();																
                                      
									  the_content();  
									  
                                    endwhile;											 																										
                                    endif; 
                                    ?>		  </div> </div> <div class="clearfix"></div>  <h2>&nbsp;</h2>
  <div class="services-background">
  <div id="container">  <?php get_template_part('sections/services-list'); ?>   </div> <div class="clearfix"></div> </div>
  
                        
                        <div id="container">
                        		
                              
                                
                                
                                <div class="official clearfix">
                                		
                                        <div class="home-left-side">                                        
                                                                                              
                                                <?php get_template_part('sections/testimonials'); ?>                                        
                                        </div><!-- home left side -->                                        
                                        
                                                                    
                                                                       
                                </div> <!-- end of official -->
                                
								                          
								
								
                        </div><!-- end of container --> <div class="clearfix"> &nbsp; </div> 
                        
<?php get_footer(); ?>