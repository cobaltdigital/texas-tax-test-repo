<?php
/*
*	Template Name: Contact Us
*/ 
get_header(); ?>
                        
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
								
                                <div id="content">
								
                                		<?php
										if ( have_posts() ) :
										while ( have_posts() ) : 
										the_post();

												$show_map = get_option('theme_gmap_show');
												if($show_map == 'true')
												{
                                                    $google_address = stripslashes(get_option('theme_google_address'));

                                                    if(!empty($google_address))
                                                    {
                                                        ?>
                                                        <div class="map-container clearfix">
                                                            <div id="map_canvas">
                                                                <?php
                                                                $a  = $google_address;
                                                                $z = intval(get_option('theme_gmap_zoom'));
                                                                $i = 'near';
                                                                $iframe_tag = 'iframe';
                                                                echo '<'.$iframe_tag.' width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q='.$a.'&amp;ie=UTF8&amp;hq=&amp;hnear='.$a.'&amp;z='.$z.'&amp;output=embed&amp;iwloc='.$i.'"></'.$iframe_tag.'>';
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        $map_lati = get_option('theme_gmap_lati');
                                                        $map_longi = get_option('theme_gmap_longi');
                                                        $map_zoom = get_option('theme_gmap_zoom');
                                                        ?>
                                                        <div class="map-container clearfix">

                                                            <div id="map_canvas"></div>

                                                            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                                                            <script type="text/javascript">

                                                                function initialize()
                                                                {
                                                                    var geocoder  = new google.maps.Geocoder();
                                                                    var map;
                                                                    var latlng = new google.maps.LatLng(<?php echo $map_lati; ?>, <?php echo $map_longi; ?>);
                                                                    var infowindow = new google.maps.InfoWindow();
                                                                    var myOptions = {
                                                                        zoom: <?php echo $map_zoom; ?>,
                                                                        mapTypeId: google.maps.MapTypeId.ROADMAP
                                                                    };

                                                                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                                                                    geocoder.geocode( { 'location': latlng },
                                                                            function(results, status) {
                                                                                if (status == google.maps.GeocoderStatus.OK)
                                                                                {
                                                                                    map.setCenter(results[0].geometry.location);
                                                                                    var marker = new google.maps.Marker({
                                                                                        map: map,
                                                                                        position: results[0].geometry.location
                                                                                    });
                                                                                }
                                                                                else
                                                                                {
                                                                                    alert("Geocode was not successful for the following reason: " + status);
                                                                                }
                                                                            });

                                                                }

                                                                initialize();

                                                            </script>
                                                        </div>
                                                        <?php
                                                    }
												} 
										
										
										the_content(); 
										
										$postal_address = stripslashes(get_option('theme_postal_address'));
										
										if(!empty($postal_address))
										{
											?>																					                                                                                
											<address>
											   <?php echo $postal_address; ?>
											</address>
											<?php
										}
										?>
                                        
                                        <div class="contact-form-container">
                                            <h3 class="smart-head"><?php echo stripslashes(get_option('theme_contact_form_heading')); ?></h3>
                                            <p><?php echo stripslashes(get_option('theme_contact_form_text')); ?></p>
                                            <form action="<?php echo site_url(); ?>/wp-admin/admin-ajax.php" id="contact-form" class="clearfix" method="post">
                                                <div class="form-cell">
                                                    <label class="display-ie8" ><?php _e( 'Name:', 'framework'); ?></label>
                                                	<input type="text" placeholder="<?php _e( 'Name', 'framework'); ?>" class="name required" name="author" title="<?php _e( '* Please provide your name', 'framework'); ?>"  /><span>*</span>
                                                </div>
                                                
                                                <div class="form-cell">
                                                     <label class="display-ie8" ><?php _e( 'Phone:', 'framework'); ?></label>
                                                	<input type="text" placeholder="<?php _e( 'Phone No.', 'framework'); ?>" class="phone" name="phone" />
                                                </div>
                                                
                                                <div class="form-cell">
                                                     <label class="display-ie8" ><?php _e( 'Email:', 'framework'); ?></label>
                                                	<input type="text" placeholder="<?php _e( 'Email Address', 'framework'); ?>" class="email required" name="email" title="<?php _e( '* Please enter your email address', 'framework'); ?>" /><span>*</span>
                                                </div>
                                                
                                                <div class="form-cell">
                                                     <label class="display-ie8" ><?php _e( 'Subject:', 'framework'); ?></label>
                                                	<input type="text" placeholder="<?php _e( 'Subject', 'framework'); ?>" class="subject" name="subject" />
                                                </div>																								
                                                
                                                <div class="form-row">
                                                     <label class="display-ie8" ><?php _e( 'Message:', 'framework'); ?></label>
                                                	<textarea name="message" class="message required" cols="30" rows="10" placeholder="<?php _e( 'Message', 'framework'); ?>" title="<?php _e( '* Please enter your message', 'framework'); ?>"></textarea>

                                                    <?php
                                                    $disable_captcha = get_option('theme_disable_captcha');

                                                    if($disable_captcha != 'true')
                                                    {
                                                        ?>
                                                        <div class="captcha-container">
                                                            <label><?php _e( 'Are you human? ', 'framework'); ?></label>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/captcha/captcha.php" alt=""/>
                                                            <input type="text" class="captcha required" name="captcha" maxlength="5" title="<?php _e( '* Please enter the code characters displayed in image!', 'framework'); ?>"/>
                                                        </div>
                                                        <?php
                                                    }

                                                    ?>

                                                	<input type="submit" name="submit" value="<?php _e( 'Submit', 'framework'); ?>" class="submit readmore"/>
                                                    
                                                    <input type="hidden" name="action" value="send_message" />
													<input type="hidden" name="target" value="<?php echo get_option('theme_contact_address'); ?>" />
													<img src="<?php echo get_template_directory_uri(); ?>/images/loading.gif" id="contact-loader" alt="Loader" />
                                                    <p id="message-sent">&nbsp;</p>

                                                </div>
                                                
                                                <div class="error-container">
                                                </div>
                                            </form>
                                        </div>    
										
                                        
                                    	<?php 
										endwhile;					
											
											// comments disabled on contact page. you can enable them if you want.				
											// comments_template();  																										
										
										endif; 
										?>
										
                                </div>
                                
                                <?php get_sidebar('contact'); ?>                                
                                                                
                                <?php get_template_part('sections/twitter'); ?>
								
                        </div><!-- end of container -->
                        
<?php get_footer(); ?>


