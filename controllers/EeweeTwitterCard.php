<?php
if( !class_exists(EeweeTwitterCard)){
	class EeweeTwitterCard{
		
		function __construct(){
                    $this->init();
                    
                    // SHORTCODE
//                  add_shortcode( 'xxx', array($this, 'fct') );
		}//fin constructeur

		// init
		function init(){ 
                    $this->getOptionsAdmin();
                
                    add_action("wp_head", array($this, "render") );
                }

		// execute lors de l'activation du plugin
		function eewee_activate(){}

		// execute lors de la désactivation du plugin
		function eewee_deactivate(){}
		
		/**
		 * Gestion des menus du site
		 */
		function eewee_adminMenu(){
			// main menu
			add_menu_page( "eeweeTwitterCard", "Eewee Twitter Card", "manage_options", "idEeweeTwitterCard", array($this, menu), plugins_url("eewee_twitter_card/img/icon.png") );
			// submenu (into main menu)
			add_submenu_page( "idEeweeTwitterCard", "Setting", "Setting", "manage_options", "idSousMenuTC1", array($this, sousMenu1));
			add_submenu_page( "idEeweeTwitterCard", "Manual", "Manual", "manage_options", "idSousMenuTC2", array($this, sousMenu2));
			
			// menu B
//			add_object_page( "monMenuB", "monMenuB", "manage_options", "idMonMenuB", "fct_b" );
			// submenu (into main menu)
//			add_pages_page( "sousPages", "sous page ici", "manage_options", "idSousMenuPage", "fct_sousMenu");
			
			// appel init
			add_action('admin_init', array($this, 'init'));
		}
		
                
                function render(){
                    /*
                    <meta name="twitter:card" content="summary">
                    <meta name="twitter:site" content="@nytimes">
                    <meta name="twitter:creator" content="@SarahMaslinNir">
                    <meta name="twitter:url" content="http://www.nytimes.com/2012/02/19/arts/music/amid-police-presence-fans-congregate-for-whitney-houstons-funeral-in-newark.html">
                    <meta name="twitter:title" content="Parade of Fans for Houston�s Funeral">
                    <meta name="twitter:description" content="NEWARK - The guest list and parade of limousines with celebrities emerging from them seemed more suited to a red carpet event in Hollywood or New York than than a gritty stretch of Sussex Avenue near the former site of the James M. Baxter Terrace public housing project here.">
                    <meta name="twitter:image" content="http://graphics8.nytimes.com/images/2012/02/19/us/19whitney-span/19whitney-span-articleLarge.jpg">

                    <html prefix="og: http://ogp.me/ns#">
                    <meta name="twitter:card" content="summary">
                    <meta name="twitter:site" content="@nytimesbits">
                    <meta name="twitter:creator" content="@nickbilton">
                    <meta property="og:url" content="http://bits.blogs.nytimes.com/2011/12/08/a-twitter-for-my-sister/">
                    <meta property="og:title" content="A Twitter for My Sister">
                    <meta property="og:description" content="In the early days, Twitter grew so quickly that it was almost impossible to add new features because engineers spent their time trying to keep the rocket ship from stalling.">
                    <meta property="og:image" content="http://graphics8.nytimes.com/images/2011/12/08/technology/bits-newtwitter/bits-newtwitter-tmagArticle.jpg">
                    */
                    
                    
                    if( get_option( "eewee_twittercard_val_enabled" ) == 'on' ){
                        
                        global $post;
                        
                        $content_simple = str_replace('"', "''", $post->post_content);
                        $content_simple = strip_tags($content_simple);
                        $content_simple = substr($content_simple, 0, 500);
                        
                        //$tags = get_meta_tags( get_permalink() );
                        //echo $tags['description'];
                        
                        //htmlentities($post->post_content, ENT_QUOTES, "UTF-8")
                        
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium'); // thumbnail, medium, large, full
                        if( !empty( $img ) ){
                            $metaImgTW      = '<meta name="twitter:image" content="'.esc_attr($img[0]).'">';
                            $metaImgTWOG    = '<meta property="og:image" content="'.esc_attr($img[0]).'">';
                        }
                        
                        // strip_tags(get_the_excerpt())
                        if( get_option( "eewee_twittercard_val_method" ) == 'tw' ){
                            echo '
                            <meta name="twitter:card" content="summary">
                            <meta name="twitter:site" content="@'.get_option( "eewee_twittercard_val_site" ).'">
                            <meta name="twitter:creator" content="@'.get_option( "eewee_twittercard_val_creator" ).'">
                            <meta name="twitter:url" content="'.get_permalink().'">
                            <meta name="twitter:title" content="'.get_the_title().'">
                            <meta name="twitter:description" content="'.$content_simple.'">
                            '.$metaImgTW.'
                            ';
                        }elseif( get_option( "eewee_twittercard_val_method" ) == 'twog' ){
                            echo '
                            <html prefix="og: http://ogp.me/ns#">
                            <meta name="twitter:card" content="summary">
                            <meta name="twitter:site" content="@'.get_option( "eewee_twittercard_val_site" ).'">
                            <meta name="twitter:creator" content="@'.get_option( "eewee_twittercard_val_creator" ).'">
                            <meta property="og:url" content="'.get_permalink().'">
                            <meta property="og:title" content="'.get_the_title().'">
                            <meta property="og:description" content="'.$content_simple.'">
                            <meta property="og:site_name" content="'.get_bloginfo('name').'">
                            '.$metaImgTWOG.'                                
                            ';
                        }
                    }
                }
                
		/**
		 * Page : main menu
		 */
		function menu(){ echo "Main menu here"; }


		/**
		 * Page : submenu 1
		 */
		function sousMenu1(){ include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/twittercard.php'); }
		
		/**
		 * Page : submenu 1
		 */
		function sousMenu2(){ include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/manual.php'); }

		
		
		/**
		 * Shortcode 
		 * @param unknown_type $atts
		 */
		/*
		function xxx( $atts='' ){
			extract( shortcode_atts(array('type'=>''), $atts ));
			include(EEWEE_TWITTERCARD_PLUGIN_DIR.'/view/xxx.php');
		}//fin function
		*/

		
		
		/**
		 * Définition des options
		 */
		function getOptionsAdmin(){
			//assigne les valeurs par défaut aux options d'administration
			$tbl_optionsAdmin = array(
				'f-enabled'	=> true,
				'exclude_ips'	=> ''
			);
			//recup les options stockées en bdd
			$options = get_option($this->adminOptionsName);
			//si les options existent dans la base de données, les valeurs par défaut sont écrasées par celles de la base			
			if( !empty($options) ){
				foreach( $options as $k=>$v ){
					$tbl_optionsAdmin[$k] = $v;
				}
			}
			//les options sont stockées dans la base
			update_option($this->adminOptionsName, $tbl_optionsAdmin);
			//les options sont renvoyées pour être utilisées
			return $tbl_optionsAdmin;
		}

	}//fin class
}//fin if
