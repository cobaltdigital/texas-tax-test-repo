<?php get_header(); ?>
                        
                        <hgroup class="page-head">
                                <h1><?php _e('Search Results For', 'framework'); ?> <span><?php the_search_query(); ?></h1>
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
												<h3 class="post-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												
                                                <?php
                                                $post_type = get_post_type( $post->ID );
											    if($post_type == 'post')
											    {
												?>
												<div class="post-meta">
													<span class="author"><?php _e('By', 'framework'); ?> <?php the_author_posts_link() ?></span>
													<span class="date"><?php the_time('d M, Y'); ?></span>
													<span class="category"><?php the_category(', '); ?></span>
													<span class="tag"><?php the_tags( '', ', ', '' ); ?></span>
												</div><!-- end of post meta -->                                                
												<?php
												}
												
												if ( has_post_thumbnail() && $post_type == 'post' )
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
                                                                <div class="comment-count">
                                                                    <span><?php comments_popup_link(__('0 Comments', 'framework'), __('1 Comment', 'framework'), __('% Comments', 'framework')); ?></span>
                                                                </div>													
                                                        </div><!-- end of post thumb -->
                                               			<?php
												}
												?>													
											</header>
                                            <?php
											    if($post_type == 'post')
											    {
												  the_content(__('', 'framework'));
												}
												else
												{	
												    echo '<p>';																				
                                                    framework_excerpt(50); 
													echo '</p>';
												}
											?>                                            
											<a href="<?php the_permalink(); ?>" class="readmore"><?php _e('More', 'framework'); ?></a>																						
										</article>
									
                                    	<?php 
										endwhile;											
											theme_pagination( $wp_query->max_num_pages); 																
										else : 
										?>									
											<h2><?php _e('No Posts Found', 'framework'); ?></h2>
											<p><?php _e('Please try a different search term!', 'framework'); ?></p>																                                    
										<?php 
										endif; 

										?>
										
                                </div>
                                
                                <?php get_sidebar(); ?>                                
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>