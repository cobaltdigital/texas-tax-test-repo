<?php get_header(); ?>
                        
                        <hgroup class="page-head">
                        		<?php                                
								$theme_service_title = stripslashes(get_option('theme_service_title'));
								$theme_service_text = stripslashes(get_option('theme_service_text'));								
								?>
                                <h2><?php echo $theme_service_title; ?></h2>
                                <h5><?php echo $theme_service_text; ?></h5>
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
												<h1 class="post-title detail-page">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h1>
												
                                                
												<?php
												if ( has_post_thumbnail() )
												{																												
														?>
														<div class="post-thumb">													
																<?php																
																$image_id = get_post_thumbnail_id();
																$featured_image = wp_get_attachment_image_src( $image_id,'std-service-thumbnail' );																																
																echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >';
																echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
																echo '</a>';
                                                                ?>												
                                                        </div><!-- end of post thumb -->
                                               			<?php
												}
												?>													
											</header>			
                                            																			
                                            <?php the_content(); ?>																					
                                            
										</article>
									
                                    	<?php 
										endwhile;
																					
											comments_template();  																										
										
										endif; 
										?>
										
                                </div>
                                
                                <?php get_sidebar('service'); ?>
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


