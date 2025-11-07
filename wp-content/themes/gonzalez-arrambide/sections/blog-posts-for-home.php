                                                

                                                <section class="team clearfix">

                                                        
                                                        <br>
                                                        <ul class="doctors">
                                                                <?php
                                                                $docs_number_on_home = intval(get_option('theme_docs_number_on_home'));
                                                                $docs_number_on_home = empty($docs_number_on_home)?3:$docs_number_on_home;

                                                                $blog_arguments = 	array(
                                                                                            'post_type' => 'post',
                                                                                            'posts_per_page' => $docs_number_on_home,
                                                                                            'paged' => $paged
                                                                                        );
                                                        
                                                                $blog_query = new WP_Query( $blog_arguments );
                                                        
                                                                if ( $blog_query->have_posts() )
                                                                {																								
                                                                    while ( $blog_query->have_posts() ) :
                                                                        $blog_query->the_post();
                                                                        ?>	
                                                                        <li class="clearfix">
                                                                               
                                                                                
                                                                                <div class="post-title-1">  <?php
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
                                                                                        ?>
                                                                                    </figure>
                                                                                    <?php
                                                                                }
                                                                                ?></div>
                                                                                <div class="post-title-2"> <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                                                <div class="post-meta">
													<span class="author"><?php _e('By', 'framework'); ?> <?php the_author_posts_link() ?></span>
													<span class="date"><?php the_time('d M, Y'); ?></span>
													<span class="category"><?php the_category(', '); ?></span>
													<span class="tag"><?php the_tags( '', ', ', '' ); ?></span>
												</div>
                                                                                <p><?php framework_excerpt(30); ?></p>
                                                                                
                                                                                 <?php
                                                                                      echo '<a href="'.get_permalink().'" title="'.get_the_title().'" class="readmore">'.
                                                                                            'More'.
                                                                                            '</a>';
                                                                                        ?>
                                                                                
                                                                                </div>
                                                                                
                                                                                
                                                                        </li>                                               
                                                                        <?php																																																											 
                                                                    endwhile;															
                                                                }																																							
                                                                ?>                                                                                                        		
                                                        </ul>
                                                        <?php
                                                        $page_for_posts = get_option('page_for_posts');
                                                        if($page_for_posts)
                                                        {
                                                            ?>
                                                            <a href="<?php echo get_permalink($page_for_posts); ?>" class="readmore"><?php _e("More Blog Posts", 'framework'); ?></a>
                                                            <?php
                                                        }
														?>
                                                </section>