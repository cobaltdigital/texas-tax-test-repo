                                                
                                                <?php
                                                $theme_show_doctors = get_option('theme_show_doctors');
								
                                                if($theme_show_doctors == 'true')
								                {
												?>
                                                <section class="team clearfix">
                                                        <h2 class="smart-head"><?php echo stripslashes(get_option('theme_doctors_heading')); ?></h2>
                                                        <p><?php echo stripslashes(get_option('theme_doctors_sub_text')); ?></p>
                                                        
                                                        <ul class="doctors">                                                		
                                                                <?php
                                                                $docs_number_on_home = intval(get_option('theme_docs_number_on_home'));
                                                                $docs_number_on_home = empty($docs_number_on_home)?3:$docs_number_on_home;

                                                                $doctors_arguments  = 	array(
                                                                                            'post_type' => 'doctor',
                                                                                            'posts_per_page' => $docs_number_on_home,
                                                                                            'paged' => $paged
                                                                                        );
                                                        
                                                                $doctors_query = new WP_Query( $doctors_arguments );
                                                        
                                                                if ( $doctors_query->have_posts() ) 
                                                                {																								
                                                                    while ( $doctors_query->have_posts() ) : 												
                                                                    $doctors_query->the_post();																																																		
                                                                        ?>	
                                                                        <li>
                                                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                                                <?php
                                                                                if ( has_post_thumbnail() )
                                                                                {																												
                                                                                        ?>
                                                                                        <figure class="doc-img">													
                                                                                                <?php
                                                                                                $image_id = get_post_thumbnail_id();
                                                                                                $featured_image = wp_get_attachment_image_src( $image_id,'doctor-team-thumb' );	
																																																													
																								echo '<a href="'.get_permalink().'" title="'.get_the_title().'" >'.
																										'<img src="'.$featured_image[0].'" alt="'.get_the_title().'">'.
																									'</a>';
																								
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
                                                                        </li>                                               
                                                                        <?php																																																											 
                                                                    endwhile;															
                                                                }																																							
                                                                ?>                                                                                                        		
                                                        </ul>
                                                        <?php

                                                        $more_doctors_title = get_option('theme_more_doctors_title');
														$more_doc_link = get_option('theme_more_doctors_link');

														if(!empty($more_doc_link) && !empty($more_doctors_title))
														{
															?>
															<a href="<?php echo $more_doc_link; ?>" class="readmore"><?php echo $more_doctors_title; ?></a>
															<?php
														}
														?>
                                                </section>
                                                <?php
												}
												?>