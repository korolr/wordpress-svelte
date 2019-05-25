<!DOCTYPE html>                                                                                                                             
<html <?php language_attributes(); ?>>                                                                                                      
        <head>                                                                                                                              
                <meta charset="<?php bloginfo( 'charset' ); ?>">                                                                            
                <meta name="viewport" content="width=device-width,initial-scale=1">                                                         
                <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/public/favicon.png">                                    
                <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/public/global.css'>                                        
                <link rel='stylesheet' href='<?php echo get_template_directory_uri(); ?>/public/bundle.css'>                                    
                <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
	            <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
	            <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
                <title><?php bloginfo('name')?></title>                                                                                     
                <?php wp_head(); ?>                                                                                                         
        </head>                                                                                                                             
        <body>                                                                                                                              
                                                                                                                                            
                                                                                                                                            
                                                                                                                                            
        <?php wp_footer(); ?>                                                                                                               
                                                                                                                                            
                <script src='<?php echo get_template_directory_uri(); ?>/public/bundle.js'></script>                                        
        </body>                                                                                                                             
</html>                                                                                                                                     
