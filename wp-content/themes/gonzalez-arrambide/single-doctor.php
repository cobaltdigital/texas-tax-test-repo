<?php get_header(); ?>                        
                        
                        <hgroup class="page-head">
                        		<?php
                                	$doctor_name = get_post_meta($post->ID,'doctor_name',true);
									$doctor_education = get_post_meta($post->ID,'doctor_education',true);
									$doctor_intro_text = get_post_meta($post->ID,'doctor_intro_text',true);																		
								?>                                                       		
                                <h1><?php echo $doctor_name; ?></h1>
                                <h3 class="education"><?php echo $doctor_education; ?></h3>
                                <h5><?php echo $doctor_intro_text; ?></h5>                                
                        </hgroup>
                        
                        <div id="container" class="clearfix">
								
                                <div id="content" class="doctor-page ">
								
                                		<?php
										if ( have_posts() ) :
										while ( have_posts() ) : 
										the_post();
										
										?>
										<article id="post-<?php the_ID(); ?>" <?php post_class("clearfix"); ?>>
										
											<?php
                                            if ( has_post_thumbnail() )
                                            {																												
                                                    ?>
                                                    <div class="doctor-img">													
                                                            <?php																
                                                            $image_id = get_post_thumbnail_id();
                                                            $featured_image = wp_get_attachment_image_src( $image_id,'doctor-profile' );																																																
                                                            $full_image_url = wp_get_attachment_url($image_id);
                                                                                                                                                                    
                                                            echo '<a href="'.$full_image_url.'" title="'.get_the_title().'" class="pretty-photo">';																	
                                                            echo '<img class="img-border" src="'.$featured_image[0].'" alt="'.get_the_title().'">';
                                                            echo '</a>'; 
															
															$twitter_url = get_post_meta($post->ID,'twitter_link',true);
															$facebook_url = get_post_meta($post->ID,'facebook_link',true);   
															
															if(!empty($twitter_url))
															{                                                        
																?>      
																<a href="<?php echo $twitter_url; ?>" class="twitter"></a>
																<?php
															}
															
															if(!empty($facebook_url))
															{
																?>
																<a href="<?php echo $facebook_url; ?>" class="facebook"></a>
																<?php
															}
															?>
                                                    </div>
                                                    <?php
                                            }
                                            ?>															
                                            																			
                                            <?php the_content(); ?>																					
                                            
										</article>
									
                                    	<?php 
										endwhile;											 																										
										endif; 
										?>
										
                                </div>
                                
                                <?php get_sidebar('doctor'); ?>
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


