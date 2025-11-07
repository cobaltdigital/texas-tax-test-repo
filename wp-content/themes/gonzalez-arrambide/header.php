<!doctype html>
<!--[if IE 7]>    <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
		<head>
			
			<meta name="google-site-verification" content="_pZKhureO89JnvvFSlS45QyLbvKnX9pLP9XLlzdmRyk" />
			
				<!-- META TAGS -->
				<meta charset="<?php bloginfo( 'charset' ); ?>" />
				<meta name="viewport" content="width=device-width" />
				
				<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
                				               				                
                <?php
				$favicon = get_option('theme_favicon');
				if( !empty($favicon) )
				{
					?>
					<!-- FAVICON -->
					<link rel="shortcut icon" href="<?php echo $favicon; ?>" />
					<?php
				}
				?>
                
                <!-- Style Sheet-->
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,700,800,600&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
				<link href='https://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
				<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>                                         
                
                <!-- Pingback URL -->
                <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
                
                <!-- RSS -->
                <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
                <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />                                
                
                <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

                <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
                    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <![endif]-->
                
                <?php 
				// Google Analytics From Theme Options
				echo stripslashes(get_option('theme_google_analytics'));
				?>

            <?php wp_head(); ?>
				
		</head>
		<body <?php body_class(); ?>>				
        
				<!-- Starting Website Wrapper -->
                <div id="wrapper">
                		
                        <!-- Starting Header of the website -->
                        <header id="header">
                        
                        
                        
                        
                        
                        <div class="top-header">
                        
                        <div class="header-left">  
                            <?php
                            // WPML Language Switcher
                            if(function_exists('icl_get_languages')){
                                language_selector_flags();
                            }

                            $logo_path = get_option('theme_sitelogo');

                            if(!empty($logo_path))
                            {
                                ?>
                                <!-- Website Logo Place -->
                                <div id="logo-container">
                                    <a href="<?php echo home_url(); ?>" class="logo"  title="<?php bloginfo( 'name' ); ?>">
                                        <img src="<?php echo $logo_path; ?>" alt="<?php  bloginfo( 'name' ); ?>">
                                      
                                    </a>
                                </div>
                                <?php
                            }
                            else{
                                ?>
                                <div id="logo-container">
                                    <h2 class="logo-heading">
                                        <a href="<?php echo home_url(); ?>"  title="<?php bloginfo( 'name' ); ?>">
                                            <?php  bloginfo( 'name' ); ?>
                                        </a>
                                    </h2>
                                    
                                </div>
                                <?php
                            }
                            ?> </div>
                        <div class="header-right">  <?php
										$show_social = get_option('theme_show_social_menu');
										
										$sl_faceook = get_option('theme_facebook_link');
										$sl_twitter = get_option('theme_twitter_link');
										$sl_flickr = get_option('theme_flickr_link');
										$sl_google = get_option('theme_google_link');
										$sl_linkedin = get_option('theme_linkedin_link');
										$sl_rss = get_option('theme_rss_link');
										$sl_skype = get_option('theme_skype_link');
                                        $sl_pin = get_option('theme_pin_link');
                                        $sl_youtube = get_option('theme_youtube_link');
										$sl_help = get_option('theme_help_link');
										$sl_phone = get_option('theme_phone_link');
										

										
										if($show_social == 'true')
										{
		                        				?>                                   
                                                <ul class="social-nav">
                                                        <?php
                                                                echo ($sl_faceook) ? '<li class="facebook"><a target="_blank" href="'.$sl_faceook.'"></a></li>' : '';
                                                                echo ($sl_twitter) ? '<li class="twitter"><a target="_blank" href="'.$sl_twitter.'"></a></li>' : '';
                                                                echo ($sl_skype) ? '<li class="skype"><a target="_blank" href="'.$sl_skype.'"></a></li>' : '';																	
                                                                echo ($sl_flickr) ? '<li class="flickr"><a target="_blank" href="'.$sl_flickr.'"></a></li>' : '';																	
                                                                echo ($sl_google) ? '<li class="google"><a target="_blank" href="'.$sl_google.'"></a></li>' : '';																
                                                                echo ($sl_linkedin) ? '<li class="linkedin"><a target="_blank" href="'.$sl_linkedin.'"></a></li>' : '';
                                                                echo ($sl_pin) ? '<li class="pin"><a target="_blank" href="'.$sl_pin.'"></a></li>' : '';
                                                                echo ($sl_youtube) ? '<li class="youtube"><a target="_blank" href="'.$sl_youtube.'"></a></li>' : '';
                                                                echo ($sl_rss) ? '<li class="rss"><a target="_blank" href="'.$sl_rss.'"></a></li>' : '';
																echo ($sl_help) ? '<li class="help"><span>'.$sl_help.'</span></li>' : '';	
									echo ($sl_phone) ? '<li class="phone"><span><a href="tel:9564479009">'.$sl_phone.'</a></span></li>' : '';
																													
                                                        ?>
                                                </ul>
                                				<?php 
										} 
										?>                                
								
                                
                                <nav class="main-nav clearfix">

                                		<!-- MAIN NAVIGATION -->
                                		<?php 
										wp_nav_menu( array( 
											'theme_location' => 'main-menu',
                                            'container' => 'div',
                                            'container_class' => 'menu-div'
										)); 
										?>
                                        
                                      
                                </nav> </div>
                        
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                                
                               
                        </header><!-- ending of header of the website --><div class="clearfix"></div>