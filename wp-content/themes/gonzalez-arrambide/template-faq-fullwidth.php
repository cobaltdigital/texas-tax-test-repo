<?php
/*
*  Template Name: FAQ Fullwidth Template
*/ 
get_header(); ?>
                        
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
                                <h5><?php echo $page_sub_title; ?></h5>
                        </hgroup>
                        
                        <div id="container" class="clearfix" >
								
                                <div id="content" class="full-width">								
                                		<?php
										if ( have_posts() ) :
										while ( have_posts() ) : 
										the_post();
										
										?>
													
                                            																			
                                            <?php the_content(); ?>
											
											<div class="faq-container">
												<?php
												$faq_query = new WP_Query(array(
																			'post_type' => 'faq',
																			'posts_per_page' => -1
																		));
												if ( $faq_query->have_posts() ) :
												while ( $faq_query->have_posts() ) : 
													$faq_query->the_post();
													?>
													<section class="faq-unit">
														<h4 class="faq-question"><?php the_title(); ?></h4>
														<div class="faq-answer">
																<?php the_content(); ?>
														</div>
													</section>
													<?php
												endwhile;
												endif;
												?>												
											</div>                                            																					                                                                                        
                                        									
                                    	<?php
                                        wp_reset_postdata();
										endwhile;											
											comments_template();  																										
										endif; 
										?>
										
                                </div>
                                                              
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>
