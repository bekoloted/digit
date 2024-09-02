<?php
    if ( ! function_exists( 'fepes_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since fepes 1.0
     */
    function fepes_setup() {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        register_nav_menu('header', 'En tête du menu');
        //register_nav_menu('footer-perso', 'Pied de page');
        //register_nav_menu('infos-site', 'Infos du site');
    }
    endif; // fepes_setup

    if ( ! function_exists( 'remove_all_default_wp_styles' ) ) :
        function remove_all_default_wp_styles() {
            global $wp_styles;
        
            if (!empty($wp_styles->registered)) {
                foreach ($wp_styles->registered as $style) {
                    wp_dequeue_style($style->handle);
                    wp_deregister_style($style->handle);
                }
            }
        }
    endif;
        
    if ( ! function_exists( 'eg_define_custom_user_agent' ) ) :
        function eg_define_custom_user_agent( $args ) {
            $versions           = ActionScheduler_Versions::instance();
            $args['user-agent'] = 'Action Scheduler/' . $versions->latest_version();
        
            return $args;
        }
    endif;
    
    // tailwinds integration    
    if ( ! function_exists( 'fepes_assets' ) ) :
    function fepes_assets(){
        //wp_register_script('scriptSite', '/wp-content/themes/fepes/assets/js/js.js', [], false, true);
        //wp_register_script('tailwind','/wp-content/themes/fepes/assets/css/fepes-output.css',[],false,true);
        //wp_register_script('tailwindjs','https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js',[],false,true);
        //wp_register_style('style_generate','/wp-content/themes/fepes/assets/css/fepes-output.css');
        //wp_register_style('sora_font','https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300&family=Sora:wght@100..800&display=swap');
        

        wp_enqueue_script('style_generate','https://cdn.tailwindcss.com');
        wp_enqueue_style('style_generate','/wp-content/themes/digital-ls/assets/images/fepes-output.css');

        wp_enqueue_script('google_api');
    }
    endif;


    if ( ! function_exists( 'fepes_class' ) ) :
        function fepes_class($attrib){
            $attrib['class'] = "";
            $attrib['class'] = 'text-md hover:text-[#628e2f] px-4';
            return $attrib;
        }
    endif;

    if ( ! function_exists( 'fepes_links' ) ) :
        function fepes_links($attrs){
            $attrs['class'] = 'flex flex-col items-center px-4 py-2';
            return $attrs;
        }
    endif;

    if ( ! function_exists( 'fepes_init' ) ) :
        function fepes_init(){
            register_taxonomy('type_actualite', 'post', [
                'labels' => [
                    'name' => 'Actualité',
                    'singular_name' => "Type d'actualité",
                    'plural_name' => 'Types actualités',
                    'search_items' => 'Rechercher des actualités',
                    'all_items' => 'Toutes les actualités',
                    'edit_item' => "Editer l'actualité",
                    'update_item' => "Mettre à jour l'actualité",
                    'add_new_item' => "Ajouter une nouvelle actualité",
                    'new_item_name' => "Ajouter une nouvelle actualité",
                    'menu_name' => 'Actualité',
                ],
                'show_in_rest' => true,
                'hierarchical' => true,
                'show_admin_column' => true,
            ]);
            
        }
    endif;
    
    if ( ! function_exists( 'Text_size_reduce' ) ) :
        function Text_size_reduce($text){
            $length = 250;
            if(strlen($text)<$length+10) return $text;//don't cut if too short
        
            $break_pos = strpos($text, ' ', $length);//find next space after desired length
            $visible = substr($text, 0, $break_pos);
            return balanceTags($visible) . " […]";
        } 
    endif;

    add_action('init', 'fepes_init');
    //add_action( 'wpcf7_init', 'wpcf7_add_form_tag_text' );
    add_action( 'after_setup_theme', 'fepes_setup' );
    add_action('wp_enqueue_scripts', 'remove_all_default_wp_styles');
    add_action( 'wp_enqueue_scripts', 'fepes_assets');
    add_filter( 'as_async_request_queue_runner_post_args', 'eg_define_custom_user_agent', 10, 1 );

    add_filter('nav_menu_css_class', 'fepes_class');
    //add_filter('nav_menu_link_attributes', 'fepes_class');
    add_filter("the_excerpt", "Text_size_reduce");
 