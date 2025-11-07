<?php get_header(); ?>
                        
                        <hgroup class="page-head">
                        		<?php                                
								$theme_gallery_title = stripslashes(get_option('theme_gallery_title'));
								$theme_gallery_text = stripslashes(get_option('theme_gallery_text'));								
								?>
                                <h2><?php echo $theme_gallery_title; ?></h2>
                                <h5><?php echo $theme_gallery_text; ?></h5>
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
                                                $enable_slider = get_option('theme_enable_slider');

												if($enable_slider == 'true')
												{
                                                    ?>
                                                    <div class="gallery-slider-wrapper">
                                                        <?php
                                                        $args = array(
                                                            'orderby' => 'menu_order',
                                                            'post_type' => 'attachment',
                                                            'post_parent' => $post->ID,
                                                            'post_mime_type' => 'image',
                                                            'post_status' => null,
                                                            'numberposts' => -1
                                                        );

                                                        $attachments = get_posts($args);
                                                        if( !empty($attachments) ) {
                                                            echo '<div class="gallery-slider">';
                                                            echo '<ul class="slides">';
                                                            $i = 0;
                                                            foreach( $attachments as $attachment ) {

                                                                $featured_image = wp_get_attachment_image_src( $attachment->ID, 'gallery-slider' );
                                                                $full_image_url = wp_get_attachment_url($attachment->ID);

                                                                $caption = $attachment->post_excerpt;
                                                                $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;

                                                                echo '<li><a href="'.$full_image_url.'" title="'.$caption.'" data-rel="prettyPhoto[gallery]"><img src="'.$featured_image[0].'" alt="'.$alt.'" /></a></li>';
                                                            }
                                                            echo '</ul>';
                                                            echo '</div>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                elseif ( has_post_thumbnail() )
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
                                
                                <?php get_sidebar(); ?>                                
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


