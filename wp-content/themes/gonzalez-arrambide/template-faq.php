<?php
/*
*  Template Name: FAQ Template
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
                        
                        <div id="container" class="clearfix">
								
                                <div id="content">
								
                                		<?php
										if ( have_posts() ) :
										while ( have_posts() ) : 
										the_post();
										
										?>
										<article id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>
										
											<header>
												
												<?php
												if ( has_post_thumbnail() )
												{																												
														?>
														<div class="post-thumb">													
																<?php																
																$image_id = get_post_thumbnail_id();
																$featured_image = wp_get_attachment_image_src( $image_id,'std-service-thumbnail' );
																
																$theme_use_lightbox = get_option('theme_use_lightbox');
																if($theme_use_lightbox == 'true')
																{																	
																	$full_image_url = wp_get_attachment_url($image_id);																																		
																	echo '<a href="'.$full_image_url.'" title="'.get_the_title().'" class="pretty-photo">';																	
																	echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
																	echo '</a>';
																}
																else
																{
																	echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >';
																	echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
																	echo '</a>';
																}
                                                                ?>                                                               												
                                                        </div>
                                               			<?php
												}
												?>													
											</header>			
                                            																			
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
                                            
										</article>
                                        
                                        <?php
                                            wp_reset_postdata();
                                            wp_link_pages(array('before' => '<div class="pages-nav"><strong>'.__('Pages', 'framework').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number')); ?>
									
                                    	<?php 
										endwhile;											
											comments_template();  																										
										endif; 
										?>
										
                                </div>
                                
                                <?php get_sidebar('page'); ?>                                
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>
