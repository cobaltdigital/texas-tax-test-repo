                                                  
                                                  <?php
                                                  $theme_show_testimonials = get_option('theme_show_testimonials');
								
                                                  if($theme_show_testimonials == 'true')
								                  {
												  ?>
                                                  <section class="testi">
                                                        <h2 class="smart-head"><?php echo stripslashes(get_option('theme_testimonials_heading')); ?></h2>
                                                        <p><?php echo stripslashes(get_option('theme_testimonials_sub_text')); ?></p>
                                                        <div class="pslider">
                                                                <ul class="patients cycle-slideshow"
                                                                    data-cycle-fx="fade"
                                                                    data-cycle-timeout="5000"
                                                                    data-cycle-slides="> li"
                                                                    data-cycle-auto-height="container"
                                                                    data-cycle-prev="#testimonial-prev"
                                                                    data-cycle-next="#testimonial-next">
                                                                        <?php
                                                                        $testimonials_number_on_home = intval(get_option('theme_testimonials_number_on_home'));
                                                                        $testimonials_number_on_home = empty($testimonials_number_on_home)?5:$testimonials_number_on_home;

                                                                        $testimonials_arguments = array(
                                                                                                        'post_type' => 'testimonial',
                                                                                                        'posts_per_page' => $testimonials_number_on_home
                                                                                                       );
                                                                        
                                                                        $testimonials_query = new WP_Query( $testimonials_arguments );
                                                                        
                                                                        if ( $testimonials_query->have_posts() ) 
                                                                        {																								
                                                                            while ( $testimonials_query->have_posts() ) : 												
                                                                            $testimonials_query->the_post();
                                                                                                                                                                                                                                                                                    
                                                                                ?>	
                                                                                <li>
                                                                                        <?php
                                                                                        if ( has_post_thumbnail() )
                                                                                        {		
                                                                                            echo '<div class="imgbox">';
                                                                                                    the_post_thumbnail('testimonial-thumb');																																																																																
                                                                                            echo '</div>';																																					
                                                                                        }
                                                                                        ?>  
                                                                                        <div class="detail">
                                                                                                <blockquote>
                                                                                                        <p><?php echo get_post_meta($post->ID,'the_testimonial',true); ?></p>
                                                                                                </blockquote>
                                                                                                <p class="author">
                                                                                                        <a href="<?php echo get_post_meta($post->ID,'testimonial_author_link',true); ?>" class="author"><?php echo get_post_meta($post->ID,'testimonial_author',true); ?>,</a>
                                                                                                        <?php echo get_post_meta($post->ID,'testimonial_department',true); ?>
                                                                                                </p>
                                                                                        </div>                                                                                                             
                                                                                </li>                                               
                                                                                <?php																																																																													 
                                                                            endwhile;															
                                                                        }																																						
                                                                        ?>                                                                
                                                                </ul>
                                                        </div>
                                                        
                                                        <p class="patient-nav">
                                                                <span id="testimonial-prev" class="t_left"></span>
                                                                <span id="testimonial-next" class="t_right"></span>
                                                        </p>
                                                        
                                                </section><!-- end of testi section -->
                                                <?php
												}
												?>