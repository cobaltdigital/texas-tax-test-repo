<?php
/*
*	Template Name: Doctors Two Columns
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
                                <?php
								if ( has_post_thumbnail() )
								{																												
										?>
										<div class="page_featured">													
												<?php																
												$image_id = get_post_thumbnail_id();
												$featured_image = wp_get_attachment_image_src( $image_id,'doctors-template' );																								
												echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';
												?>                                                               												
										</div>
										<?php
								}

								if ( have_posts() ) :
								while ( have_posts() ) : 
								the_post();
								
									?>
									<article id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>                       																	
										<?php the_content(); ?>																														
									</article>
									<?php 
								
								endwhile;																																				
								endif; 
								?>
                                
                                <section class="doc_list two_col clearfix">
                                		
                                        <?php
                                        $doctors_count = intval(get_option('theme_two_col_doc_number'));
                                        $doctors_count = empty($doctors_count)?4:$doctors_count;

										$doctors_arguments = 	array(
																	'post_type' => 'doctor',
																	'posts_per_page' => $doctors_count,
																	'paged' => $paged
																);
								
										$doctors_query = new WP_Query( $doctors_arguments );
								
										if ( $doctors_query->have_posts() ) 
										{	
											
											echo '<ul class="doctors clearfix" >';
                                            $clearfix_counter = 0;
											while ( $doctors_query->have_posts() ) : 												
											    $doctors_query->the_post();
                                                $clearfix_counter++;
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
																																																						
																		echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >';	
																		echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'">';																	
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
                                                        <?php
                                                        $show_intro_text = get_option('theme_show_intro_txt');

                                                        if( $show_intro_text == 'true')
                                                        {
                                                            $doctor_intro_text = get_post_meta($post->ID,'doctor_intro_text',true);
                                                            echo '<p>'. $doctor_intro_text.'</p>';
                                                        }
                                                        else
                                                        {
                                                            ?><p><?php framework_excerpt(18); ?></p><?php
                                                        }
                                                        ?>
                                                        <a href="<?php the_permalink(); ?>" class="readmore"><?php _e('More', 'framework'); ?></a>
                                                </li>                                               
												<?php
                                                if($clearfix_counter%2==0)
                                                {
                                                    echo "<li class='clearfix'></li>";
                                                }
											endwhile;
											
											echo '</ul>';
										}
										
										theme_pagination( $doctors_query->max_num_pages);
																					
										?>                                                                                 
                                </section>
                                                                                                                 
                          <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


