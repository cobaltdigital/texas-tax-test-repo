<?php get_header(); ?>
                        
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
                    
                    <div id="content" class="full-width">								
                    
					<ul id="filter-by" class="clearfix">
							<li><a href="" data-filter="gallery-item" class="active"><?php _e('All', 'framework'); ?></a></li>
							<?php
							$terms = get_terms('gallery-item-type');
							$count = count($terms);							
							if ( $count > 0 ) 
							{
								foreach ($terms as $term) 
								{
									echo '<li><a href="' . get_term_link( $term->slug, $term->taxonomy ) . '" data-filter="'.$term->slug.'" title="' . sprintf(__('View all Gallery Items filed under %s', 'framework'), $term->name) . '">' . $term->name . '</a></li>';									
								}
							}																					
							?>
					</ul>
					
					<div id="gallery-container" class="<?php global $gallery_name; echo $gallery_name; ?> isotope clearfix">
						<?php
						$query_args = array(
				                'post_type' => 'gallery-item',
				                'posts_per_page' => -1
				    		);
						
						$gallery_query = new WP_Query( $query_args );
						
						while ( $gallery_query->have_posts() ) : 
							
							$gallery_query->the_post(); 													 							
							$term_list = '';							
							$terms =  get_the_terms( $post->ID, 'gallery-item-type' );
							
							if ( $terms && !is_wp_error( $terms ) ) :																								
								foreach( $terms as $term ) 
								{
									$term_list .= $term->slug;
									$term_list .= ' ';
								}								
							endif;
							
							if(has_post_thumbnail()):
									?>
									<div <?php post_class("gallery-item isotope-item $term_list"); ?> >
											<?php
												$image_id = get_post_thumbnail_id();
												global $gallery_image_size;
												$featured_image = wp_get_attachment_image_src( $image_id, $gallery_image_size );
												$full_image_url = wp_get_attachment_url($image_id);																									
											?>
											<a class="pretty-photo" href="<?php echo $full_image_url;  ?>"><?php echo '<img src="'.$featured_image[0].'" alt="'.get_the_title().'" >'; ?></a>
											<h5 class="item-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title();?></a></h5>
											<?php
											if ( $terms && !is_wp_error( $terms ) ):
												$i = 0;
												$count = count($terms);
												echo '<span class="item-type-link">';																								
												foreach($terms as $term)
												{
													$i++;													
													echo '<a href="'. get_term_link($term->slug, 'gallery-item-type' ).'">'.$term->name .'</a>';													
													if ($count != $i) 
													echo ', ';
												}
												echo '</span>';			
											endif;							
											?>																							
									</div>						
									<?php
							endif;
						endwhile;
						?>											
					</div><!-- end of gallery container --> 
													
                    </div><!-- end of content -->															                                                             
                                                    
                    <?php get_template_part('sections/twitter'); ?>
                    
            </div><!-- end of container -->
                        
<?php get_footer(); ?>


