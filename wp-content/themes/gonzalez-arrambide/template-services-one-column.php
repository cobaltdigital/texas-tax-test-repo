<?php
/*
*	Template Name: Services One Column
*/ 
get_header(); 
?>                        
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
                        
                        <div id="container">                        		                                
                                
                                <?php get_template_part('sections/slogan'); ?>
                                
                                <?php get_template_part('sections/services-list'); ?>                                
                                
                                <section class="service-list single-col">
                                		                                        
                                        		<?php
                                                $services_count = intval(get_option('theme_one_col_services_number'));
                                                $services_count = empty($services_count)?3:$services_count;

												$services_arguments = 	array(
																			'post_type' => 'service',
																			'posts_per_page' => $services_count,
																			'paged' => $paged
																		);
										
												$services_query = new WP_Query( $services_arguments );
										
												if ( $services_query->have_posts() ) 
												{	
													
													echo '<ul>';	
																						
													while ( $services_query->have_posts() ) : 												
													$services_query->the_post();												
														?>	
														<li>
																<?php
																if ( has_post_thumbnail() )
																{																												
																		?>
																		<figure>													
																				<?php
																				$image_id = get_post_thumbnail_id();
																				$featured_image = wp_get_attachment_image_src( $image_id,'one-column-services' );																																						
																				echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >';
																				echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
																				echo '</a>';																			
																				?>																																
																		</figure>
																		<?php
																}
																?>															
																
																<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
																<p>
																	<?php framework_excerpt(40); ?>
																</p>
																<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('More', 'framework'); ?></a>
														</li>
														<?php																																												 
													endwhile;
													
													echo '</ul>';
												}
												
												theme_pagination( $services_query->max_num_pages);
																							
												?>                                        
                                                                                        
                                </section>                               
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


