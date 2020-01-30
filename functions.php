<?php /* force UTF-8 : éàè */
/**
 * @package WordPress
 * @subpackage _basique-enfant
 **/

/**
 * Configuration et déclaration des fonctionnalités WordPress spécifiques du thème.
 *
 * @since _basique-enfant 0.1.0
 **/
add_action( 'after_setup_theme', '_basique_enfant_setup_theme' );
function _basique_enfant_setup_theme() {
    // Internationalisation du thème.
    // Les fichiers de traduction sont placés dans le dossier "languages" à la racine du thème enfant.
    load_child_theme_textdomain( '_basique-enfant', get_stylesheet_directory() . '/languages' );

    // Utilisation du code HTML5 valide pour les commentaires, les galleries et les légendes.
    add_theme_support( 'html5', array(
        'comment-list',
        'comment-form',
        'gallery',
        'caption',
    ));

    // Ajoute le support des image "à la une", ou vignettes, pour les articles/billets du blog.
    add_theme_support( 'post-thumbnails', array(
        'post',
    ));
    // Définit la taille de la vighette nomée 'post-thumbnail' qui est crée par défaut.
    set_post_thumbnail_size( 100, 100, true );

    // Ajout d'autres tailles si besoin
    //add_image_size( 'type1-thumbnail', 207, 207, true );
    //add_image_size( 'type2-thumbnail', 320, 206, true );
    //add_image_size( 'type3-thumbnail', 154, 99, true );

    // Ajoute le support des flux RSS.
    add_theme_support( 'automatic-feed-links' );
    
    // Ajoute le support du scroll infini de jetpack.
    // @see http://jetpack.me/support/infinite-scroll/
    add_theme_support( 'infinite-scroll', array(
        'container' => 'main',
    ) );

    // Support des anciennes versions d'Internet Explorer.
    // Options :
    //     pour les classes dans le tag html : ltie7 ou ltie8 ou ltie9 ou ltie10
    //     pour les feuilles de styles spécifiques : ie et/ou ie7 et/ou ie8 et/ou ie9
    add_theme_support( 'legacy-ie-support', array(
        'ie', 'ltie10'
    ) );

    // Feuille de style pour Gutenberg
    add_editor_style( 'assets/css/editor-style.css' );
    add_theme_support( 'editor-styles' );

    // Style des blocs en front end
    add_theme_support( 'wp-block-styles' );

    // Support des alignements wide
    add_theme_support( 'align-wide' );

    // Support pour les couleurs de palettes personnalisées
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Primary', '_basique-enfant' ),
            'slug' => 'theme-primary',
            'color' => '#fff',
        ),
        array(
            'name' => __( 'Secondary', '_basique-enfant' ),
            'slug' => 'theme-secondary',
            'color' => '#000',
        ),
    ) );
    // Pas de couleurs personnalisables.
    // Seules les couleurs definies ci-dessus seront accessibles.
    add_theme_support( 'disable-custom-colors' );

    // Support pour les tailles de police personnalisées
    add_theme_support( 'editor-font-sizes', array(
        array(
            'name'      => __( 'Small', '_basique-enfant' ),
            'shortName' => __( 'S', '_basique-enfant' ),
            'size'      => 10, // px
            'slug'      => 'small'
        ),
        array(
            'name'      => __( 'Normal', '_basique-enfant' ),
            'shortName' => __( 'N', '_basique-enfant' ),
            'size'      => 12, // px
            'slug'      => 'normal'
        ),
        array(
            'name'      => __( 'Large', '_basique-enfant' ),
            'shortName' => __( 'L', '_basique-enfant' ),
            'size'      => 14, // px
            'slug'      => 'large'
        ),
        array(
            'name'      => __( 'Extra Large', '_basique-enfant' ),
            'shortName' => __( 'XL', '_basique-enfant' ),
            'size'      => 16, // px
            'slug'      => 'larger'
        )
    ) );
    // Pas de tailles de police personnalisables
    add_theme_support( 'disable-custom-font-sizes' );

    // Embed responsive
    add_theme_support( 'responsive-embeds' );

}


/**
 * Ajout de Google fonts à Gutenberg.
 *
 * @since _basique-enfant 1.0.1
 **/
add_action( 'enqueue_block_editor_assets', '_basique_enfant_enqueue_block_editor_fonts' );
function _basique_enfant_enqueue_block_editor_fonts(){
    wp_enqueue_style( '_basique-enfant-block-editor-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
}


/**
 * Gutenberg scripts and styles
 *
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
add_action( 'enqueue_block_editor_assets', '_basique_enfant_gutenberg_scripts' );
function _basique_enfant_gutenberg_scripts() {
    // Informations sur le thème courrant
    $current_theme = wp_get_theme();

    // Ajoutons un paramètre de valeur différente à chaque rechargement en mode débugage pour éviter les problèmes de cache
    $no_cache = is_debug_mode() ? time() : $current_theme->get( 'Version' );

    wp_register_script( '_basique-enfant-gutenberg-editor', get_stylesheet_directory_uri() . '/assets/js/editor.js', array( 'wp-blocks', 'wp-dom' ), $no_cache, true );
	wp_enqueue_script( '_basique-enfant-gutenberg-editor' );
}


/**
 * Supprime l'inclusion de la feuille de style du thème parent _basique.
 *
 * @since _basique-enfant 0.1.0
 **/
add_action( '_basique_enqueue_styles', '_basique_enfant_disable_parent_styles' );
function _basique_enfant_disable_parent_styles(){
    wp_deregister_style( '_basique-parent-stylesheet' );
}


/**
 * Supprime l'inclusion du fichier Javascript externe du thème parent _basique.
 *
 * @since _basique-enfant 0.1.0
 **/
//add_action( '_basique_enqueue_scripts', '_basique_enfant_disable_parent_scripts' );
add_action( 'wp_enqueue_scripts', '_basique_enfant_disable_parent_scripts', 200 );
function _basique_enfant_disable_parent_scripts(){
    wp_dequeue_script( '_basique-scripts' );
}


/**
 * Déclaration et utilisation des scripts spécifiques au thème enfant
 *
 * @since _basique-enfant 0.1.0
 **/
add_action( 'wp_enqueue_scripts', '_basique_enfant_enqueue_scripts' );
function _basique_enfant_enqueue_scripts() {
    // Informations sur le thème courrant
    $current_theme = wp_get_theme();

    // Ajoutons un paramètre de valeur différente à chaque rechargement en mode débugage pour éviter les problèmes de cache
    $no_cache = is_debug_mode() ? time() : $current_theme->get( 'Version' );

    // Déclaration et utilisation de scripts Javascript spécifiques au thème enfant
    wp_register_script( '_basique-enfant-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), $no_cache, true );
    wp_enqueue_script( '_basique-enfant-scripts' );
    // Localisation des scripts : permet le passage d'information accessibles via PHP vers Javascript
    $_basique_enfant_scripts = array(
        'theme'             => esc_js( $current_theme->get( 'Name' ) . ' ' . $current_theme->get( 'Version' ) ),
        'site_url'          => trailingslashit( home_url() ),
        'parent_theme_url'  => trailingslashit( get_template_directory_uri() ),
        'theme_url'         => trailingslashit( get_stylesheet_directory_uri() ),
        'ajaxurl'           => admin_url( 'admin-ajax.php' ),
        'page_shortlink'    => wp_get_shortlink(),
        'is_debug'          => is_debug_mode() ? true : false,
        // Traduction de chaines de caractères
        'entering_debug'    => esc_attr__( 'Entering debug mode...', '_basique' ),
        'viewport_size'     => esc_attr__( 'Viewport size : ', '_basique' ),
        'screen_size'       => esc_attr__( 'Screen size : ', '_basique' ),
        'self_xss_title'    => esc_attr__( 'Wait! This area is meant for developers!', '_basique' ),
        'self_xss_text'     => esc_attr__( 'If someone told you to type or paste something into this area it could compromise the security of your personal informations. Do not do it unless you know exactly what you are doing !', '_basique' ),
        'self_xss_link'     => esc_attr__( 'More information : https://en.wikipedia.org/wiki/Self-XSS', '_basique' ),
    );
    wp_localize_script( '_basique-enfant-scripts', 'GLOBALS', $_basique_enfant_scripts );
}


/**
 * Désactive les bares latérales.
 *
 * @since _basique-enfant 0.1.0
 **/
//add_action( 'widgets_init', '_basique_enfant_unregister_sidebars', 11 );
function _basique_enfant_unregister_sidebars() {
    unregister_sidebar( 'primary' );
    unregister_sidebar( 'secondary' );
}


/**
 * Désactive le modèle de page livrées par défaut et non prises en charge par le thème enfant.
 *
 * @link http://wptheming.com/2014/04/features-wordpress-3-9/
 *
 * @since _basique-enfant 0.1.0
 *
 * @param array $templates Tableau des modèles de page.
 * @return array $templates Tableau modifié des modèles de page.
 **/
//add_filter( 'theme_page_templates', '_basique_enfant_page_templates_mod' );
function _basique_enfant_page_templates_mod( $templates ) {
    unset( $templates['page-templates/full-page.php'] );
    unset( $templates['page-templates/home-page.php'] );
    unset( $templates['page-templates/news.php'] );
    unset( $templates['page-templates/primary-sidebar-page.php'] );
    return $templates;
}


/**
 * Désactive les tags des articles.
 *
 * @since _basique-enfant 0.1.0
 **/
//add_action( 'init', '_basique_enfant_remove_tags' );
function _basique_enfant_remove_tags(){
    register_taxonomy( 'post_tag', array() );
}


/**
 * Teplate pour les commentaires mélangeant ceux du blog et ceux fait sur facebook.
 *
 * @since _basique-enfant 0.1.0
 **/
//define( 'SOCIAL_COMMENTS_FILE', STYLESHEETPATH . '/partials/comments/social-comments.php' );
//define( 'SOCIAL_COMMENTS_FILE', STYLESHEETPATH . '/partials/comments/comments.php' );


/**
 * Différentes types d'excerpt...
 *
 * @since _basique-enfant 0.1.0
 *
 * Uses :
 * <?php _basique_enfant_excerpt('_basique_enfant_excerptlength_index', '_basique_enfant_excerptmore') ?>
 * // another one
 * <?php _basique_enfant_excerpt('_basique_enfant_excerptlength_teaser', '_basique_enfant_excerptmore', '_basique_enfant_excerptreadmore') ?>
 * 
 * Source : http://wpengineer.com/manage-multiple-excerpt-lengths/
 **/

function _basique_enfant_excerpt( $length_callback = '', $more_callback = '', $readmore_callback = '' ) {
    global $post;
    if ( function_exists( $length_callback ) ) {
        add_filter( 'excerpt_length', $length_callback );
    }
    else {
        add_filter( 'excerpt_length', '_basique_enfant_excerptlength_default' );
    }
    if ( function_exists( $more_callback ) ) {
        add_filter( 'excerpt_more', $more_callback );
    }
    else {
        add_filter( 'excerpt_more', '_basique_enfant_excerptmore_default' );
    }

    $output = get_the_excerpt();

    $output = apply_filters( 'wptexturize', $output );
    $output = apply_filters( 'convert_chars', $output );
    $output = '<p>' . $output . '</p>';
    if ( function_exists( $readmore_callback ) ){
        $output .= $readmore_callback();
    }
    echo $output;
}

// Pre-defined length_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptlength_default( $length ) {
    return 55;
}

// Pre-defined length_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptlength_teaser( $length ) {
    return 45;
}

// Pre-defined length_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptlength_index( $length ) {
    return 25;
}

// Pre-defined more_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptmore_default( $more ) {
    return ' [...]';
}

// Pre-defined more_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptmore( $more ) {
    return '...';
}

// Pre-defined readmore_callback for _basique_enfant_excerpt function
function _basique_enfant_excerptreadmore() {
    return '<p><a class="more-tag" href="'. get_permalink() . '">' . __( 'Read more <span class="meta-nav">&raquo;</span>', '_basique' ) . '</a></p>';
}

/*

// Use this meta key / value to select slideshow posts
add_filter( 'nemus-slider-auto-slide-query', '_basique_enfant_nemus_slider_auto_slide_query' );
function _basique_enfant_nemus_slider_auto_slide_query( $args ) {
    $args['meta_key'] = 'featured_post' ;
    $args['meta_value'] = 1;
    return $args;
}


// Overwrite default shop images size
add_action( 'after_setup_theme', '_basique_enfant_woocommerce_set_image_dimensions' );
function _basique_enfant_woocommerce_set_image_dimensions() {
    // "shop images size set" option not already set
    if ( ! get_option( '_basique_enfant_shop_image_sizes_set' ) ) {
        $catalog = array(
            'width'     => '768',    // px
            'height'    => '',        // px
            'crop'        => 0         // no-crop
        );

        $single = array(
            'width'     => '595',    // px
            'height'    => '',        // px
            'crop'        => 0         // no-crop
        );

        $thumbnail = array(
            'width'     => '',        // px
            'height'    => '127',    // px
            'crop'        => 0         // no-crop
        );

        // Image sizes
        update_option( 'shop_catalog_image_size', $catalog );         // Product category thumbs
        update_option( 'shop_single_image_size', $single );         // Single product image
        update_option( 'shop_thumbnail_image_size', $thumbnail );     // Image gallery thumbs

        // Set "shop images size set" option so they will not be set again
        add_option( '_basique_enfant_shop_image_sizes_set', '1' );
    }
}

*/
