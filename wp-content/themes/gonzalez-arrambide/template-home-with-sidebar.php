<?php
/*
*	Template Name: Home with Sidebar
*/ 
get_header(); 

get_template_part('sliders/slider'); 

?>
                        
                        <div id="container">
                        		
                                <?php get_template_part('sections/slogan'); ?>
                                
                                <?php get_template_part('sections/services-list'); ?>                                                                                                                                                               
                                
								<div class="clearfix">
									<p>&nbsp;</p>
								</div>
								
                                <div class="official clearfix">
                                													
										<div class="home-left-side">
											
																			
												<?php
												if ( have_posts() ) :
												while ( have_posts() ) : 
												the_post();
												
													$check_content = get_the_content();
													if(!empty($check_content))
													{
													?>
													<div id="content">
													<article id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>                                            																			
														<?php the_content(); ?>                                            																					                                                                                        
													</article>
													</div>																							
													<?php 
													}
													
												endwhile;																																					
												endif; 
												?>	
											  
											                                      
											<?php get_template_part('sections/meet-the-team'); ?>                                                
											<?php get_template_part('sections/testimonials'); ?>                                        
										</div><!-- home left side --> 									
																				                                                                               
                                        
                                        <?php get_sidebar('home'); ?>                                        
                                                                       
                                </div> <!-- end of official -->
                                
								<?php get_template_part('sections/twitter'); ?>                              
								
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>