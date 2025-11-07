<?php
get_header(); 
?>                        
                        <hgroup class="page-head">                         		                      		
                                <h1>
								<?php 
									$current_term = get_term_by( 'slug', get_query_var('term') ,'department' );
									echo '<span>' . $current_term->name . '</span>';
									echo __(' Department','framework');
								?>
                                </h1>

                        </hgroup>
                        
                        <div id="container">                                
                                
                                <section class="doc_list two_col clearfix">
                                		
                                        <?php										
								
										if ( have_posts() ) 
										{	
											
											echo '<ul class="doctors clearfix" >';	
																				
											while ( have_posts() ) : 												
											
											the_post();	
											
																								
												?>	
                                                <li>
                                                		<?php
														if ( has_post_thumbnail() )
														{																												
																?>
																<figure class="doc-img">													
																		<?php
																		$image_id = get_post_thumbnail_id();
																		$featured_image = wp_get_attachment_image_src( $image_id,'doctor-column' );	
																		echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';																																					
																		echo '<a href="'.get_permalink().'" title="'.get_the_title().'"  class="img-hover" >';																		
																		echo '</a>';

                                                                        $department = get_first_term_with_link($post->ID,'department');
                                                                        if(!empty($department))
                                                                        {
                                                                            ?>
                                                                            <span class="doc-type"><?php echo $department; ?></span>
                                                                            <?php
                                                                        }
																		?>
																</figure>
																<?php
														}
														?>                                                        
                                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <p><?php framework_excerpt(16); ?></p>
                                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('More', 'framework'); ?></a>
                                                </li>                                               
												<?php																																												 
											endwhile;
											
											echo '</ul>';
										}
										
										theme_pagination( $wp_query->max_num_pages);
																					
										?>                                                                                 
                                </section>
                                                                                                                 
                          <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>