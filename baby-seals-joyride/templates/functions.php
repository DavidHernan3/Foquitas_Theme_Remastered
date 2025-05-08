<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Baby Seals Joyride functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define constants
define('FOKI_VERSION', '1.0.0');
define('FOKI_THEME_DIR', get_template_directory());
define('FOKI_THEME_URI', get_template_directory_uri());

/**
 * Custom function to replace wp_head
 */
function foki_head() {
    wp_head();
    ?>
    <meta name="theme-creator" content="@DavidHernan3 - Equipo Los Boquerones">
    <?php
}

/**
 * Custom function to replace wp_footer
 */
function foki_footer() {
    wp_footer();
}

/**
 * Enqueue scripts and styles.
 */
function foki_enqueue_assets() {
    // Enqueue main stylesheet
    wp_enqueue_style('foki-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), FOKI_VERSION);
    
    // Enqueue Google Fonts
    wp_enqueue_style('foki-google-fonts', 'https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue theme scripts
    wp_enqueue_script('foki-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), FOKI_VERSION, true);
    
    // Game scripts only loaded on game page template
    if (is_page_template('templates/page-game.php')) {
        wp_enqueue_script('foki-game', get_stylesheet_directory_uri() . '/assets/js/game.js', array('jquery'), FOKI_VERSION, true);
        
        // Localize script for translations and variables
        wp_localize_script('foki-game', 'foki_game_data', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('foki_game_nonce'),
            'score' => esc_html__('Puntuación', 'baby-seals'),
            'high_score' => esc_html__('Récord', 'baby-seals'),
            'game_title' => esc_html__('Baby Seal Jump!', 'baby-seals'),
            'press_space_to_jump' => esc_html__('Presiona Espacio para saltar', 'baby-seals'),
            'press_space_to_start' => esc_html__('Presiona Espacio para comenzar', 'baby-seals'),
            'game_over' => esc_html__('¡Juego terminado!', 'baby-seals'),
            'press_space_to_play_again' => esc_html__('Presiona Espacio para jugar de nuevo', 'baby-seals'),
            'restart' => esc_html__('Reiniciar', 'baby-seals'),
            'play_again' => esc_html__('Jugar de nuevo', 'baby-seals')
        ));
    }
}
add_action('wp_enqueue_scripts', 'foki_enqueue_assets');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function foki_setup() {
    // Load text domain
    load_theme_textdomain('baby-seals', FOKI_THEME_DIR . '/languages');

    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'baby-seals'),
        'footer' => esc_html__('Footer Menu', 'baby-seals'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'foki_setup');

/**
 * Register widget area.
 */
function foki_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'baby-seals'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'baby-seals'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer', 'baby-seals'),
        'id'            => 'footer',
        'description'   => esc_html__('Add footer widgets here.', 'baby-seals'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'foki_widgets_init');

/**
 * Add custom menu walkers
 */
class Foki_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="foki-nav__link">' . esc_html($item->title) . '</a>';
    }
}

class Foki_Mobile_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<a href="' . esc_url($item->url) . '" class="foki-nav__mobile-link">' . esc_html($item->title) . '</a>';
    }
}

class Foki_Footer_Menu_Walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $output .= '<li><a href="' . esc_url($item->url) . '" class="foki-footer__link">' . esc_html($item->title) . '</a></li>';
    }
}

/**
 * Add Baby Seal Jump game shortcode
 */
function foki_game_shortcode($atts) {
    ob_start();
    ?>
    <div class="foki-game">
        <canvas id="baby-seal-canvas" width="800" height="400" class="foki-game__canvas"></canvas>
        
        <div class="foki-game__controls">
            <button id="start-game-btn" class="foki-button foki-button--primary"><?php echo esc_html__('Iniciar juego', 'baby-seals'); ?></button>
            <button id="jump-btn" class="foki-button foki-button--secondary" disabled><?php echo esc_html__('Saltar', 'baby-seals'); ?></button>
        </div>
        
        <div class="foki-game__instructions">
            <p><?php echo esc_html__('Utiliza la barra espaciadora o el botón Saltar para evitar obstáculos.', 'baby-seals'); ?></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('baby-seal-game', 'foki_game_shortcode');
