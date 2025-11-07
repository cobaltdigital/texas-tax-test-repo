								<?php 
                                        $theme_show_services = get_option('theme_show_services');
								
                                        if($theme_show_services == 'true')
										{
										    ?>
                                            <ul class="services">
                                            
                                            <h1><?php echo stripslashes(get_option('theme_first_headinga')); ?></h1>
                                            
                                            
                                            
                                            
                                                <?php
                                                $first_image = get_option('theme_first_service_img');
                                                if(!empty($first_image))
                                                {
                                                    ?>
                                		          <li class="service">
                                        		      <figure class="service-thumb"><a href="https://www.texas-tax-cpa.com/quick-books/"><img src="<?php echo $first_image; ?>" alt="<?php echo stripslashes(get_option('theme_first_heading')); ?>"></a></figure>
                                                      <h4><a href="https://www.texas-tax-cpa.com/quick-books/"><?php echo stripslashes(get_option('theme_first_heading')); ?></a></h4>
                                                      <!--<p><?php echo stripslashes(get_option('theme_first_text')); ?></p>-->
													  <p>
														  Make sure your business is managing its financial documentation accurately and efficiently with our assistance and training for Quickbooks.
													  </p>
                                                  </li>
                                                <?php
                                                }

                                                $second_image = get_option('theme_second_service_img');
                                                if(!empty($second_image))
                                                {
                                                    ?>
                                                  <li class="service">
                                        		      <figure class="service-thumb"><a href="https://www.texas-tax-cpa.com/bookkeeping/"><img src="<?php echo $second_image; ?>" alt="<?php echo stripslashes(get_option('theme_second_heading')); ?>"></a></figure>
                                                      <h4><a href="https://www.texas-tax-cpa.com/bookkeeping/"><?php echo stripslashes(get_option('theme_second_heading')); ?></a></h4>
                                                      <!--<p><?php echo stripslashes(get_option('theme_second_text')); ?></p>-->
													  <p>
														  With over fifty years of combined experience, we can protect your time and your money with comprehensive, accurate bookkeeping.
													  </p>
                                                  </li>
                                                <?php
                                                }

                                                $third_image = get_option('theme_third_service_img');
                                                if(!empty($third_image))
                                                {
                                                    ?>
                                                  <li class="service">
                                        		      <figure class="service-thumb"><a href="https://www.texas-tax-cpa.com/tax-preparation/"><img src="<?php echo $third_image; ?>" alt="<?php echo stripslashes(get_option('theme_third_heading')); ?>"></a></figure>
                                                      <h4><a href="https://www.texas-tax-cpa.com/tax-preparation/"><?php echo stripslashes(get_option('theme_third_heading')); ?></a></h4>
                                                      <!--<p><?php echo stripslashes(get_option('theme_third_text')); ?></p>-->
													  <p>
														  Paying taxes is never easy, and that's even more true for businesses. Our experienced CPA can maximize deductions and ensure accurate completion.
													  </p>
                                                  </li>
                                                <?php
                                                }

                                                $fourth_image = get_option('theme_fourth_service_img');
                                                if(!empty($fourth_image))
                                                {
                                                    ?>
                                                  <li class="service">
                                        		      <figure class="service-thumb"><a href="https://www.texas-tax-cpa.com/financial/"><img src="<?php echo $fourth_image; ?>" alt="<?php echo stripslashes(get_option('theme_fourth_heading')); ?>"></a></figure>
                                                      <!-- <h4><a href="https://www.texas-tax-cpa.com/financial/"><?php echo stripslashes(get_option('theme_fourth_heading')); ?></a></h4> -->
													  <h4><a href="https://www.texas-tax-cpa.com/financial/">Financial Planning</a></h4>
                                                      <!--<p><?php echo stripslashes(get_option('theme_fourth_text')); ?></p>-->
													  <p>
														  When it comes to your finances, you should never settle for less than the best. Get the insights you or your business need to succeed.
													  </p>
                                                  </li>
                                                <?php
                                                }

                                                $fifth_image = get_option('theme_fifth_service_img');
                                                if(!empty($fifth_image))
                                                {
                                                    ?>
                                                    <li class="service">
                                                      <figure class="service-thumb"><a href="https://www.texas-tax-cpa.com/property-taxes/"><img src="<?php echo $fifth_image; ?>" alt="<?php echo stripslashes(get_option('theme_fifth_heading')); ?>"></a></figure>
                                                      <h4><a href="https://www.texas-tax-cpa.com/property-taxes/"><?php echo stripslashes(get_option('theme_fifth_heading')); ?></a></h4>
                                                      <p><?php echo stripslashes(get_option('theme_fifth_text')); ?></p>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul><!-- end of services -->
                                            <?php
										}
							    ?>
                                