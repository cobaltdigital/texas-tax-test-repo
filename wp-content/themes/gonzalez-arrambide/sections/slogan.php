<?php
								$theme_show_slogan = get_option('theme_show_slogan');
								
                                if($theme_show_slogan == 'true')
								{
								    ?>
                                    
                                    
                                    
                                    <div class="slogan-bg"> 
                                    <div id="container"> 
                                    <div id="content" class="full-width"> 
                                     <div class="columns"> 
                                     <div class="two-third"> <div class="slog-1">  <img src="https://www.texas-tax-cpa.com/wp-content/uploads/2016/05/time.png"  /> </div>  <h1><?php echo stripslashes(get_option('theme_slogan_tax')); ?></h1> </div>  
                                     <div class="one-third"> <a href="https://www.texas-tax-cpa.com/contact/" class="readmore"> <?php echo stripslashes(get_option('theme_button')); ?></a> </div> </div>  </div></div> <div class="clearfix"></div></div>
                                     
                                     <div class="clearfix"></div>
                                    
                                   <div id="container">   
                                    <section class="slogan">
                                    
                                    <h2><?php echo stripslashes(get_option('theme_slogan_text')); ?></h2>
                                    <div class="columns">
                                        <div class="one-half text-slogan-left">
                                            <h3><?php echo stripslashes(get_option('theme_slogan_sub_text')); ?></h3>
                                        </div>
                                        <div class="one-half">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/UsVju1c1png" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                        
                                    </section> </div>
                                    <?php
								}
								