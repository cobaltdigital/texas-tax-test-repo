<?php get_header(); ?>
                        <hgroup class="page-head">
                            <h1>
                                <?php
                                $current_term = get_term_by( 'slug', get_query_var('term') ,'faq-group' );
                                echo $current_term->name . " <span>" . __('FAQs','framework')."</span>";
                                ?>
                            </h1>
                            <h5><?php echo $current_term->description; ?></h5>
                        </hgroup>

                        <div id="container" class="clearfix">
                            <div id="content">
                                <article>
                                    <div class="faq-container">
                                        <?php
                                        if ( have_posts() ) :
                                            while ( have_posts() ) :
                                                the_post();
                                                ?>
                                                <section class="faq-unit">
                                                    <h4 class="faq-question"><?php the_title(); ?></h4>
                                                    <div class="faq-answer">
                                                        <?php the_content(); ?>
                                                    </div>
                                                </section>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </article>
                            </div>
                            <?php get_sidebar('page'); ?>
                            <?php get_template_part('sections/twitter'); ?>
                        </div><!-- end of container -->

<?php get_footer(); ?>