
<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php foki_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="foki-page" class="foki-site">
    <foki-header class="foki-header">
        <div class="foki-header__container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="foki-header__logo">
                <span class="foki-header__logo-emoji">🦭</span>
                <span class="foki-header__logo-text"><?php bloginfo('name'); ?></span>
            </a>
            
            <nav class="foki-nav">
                <div class="foki-nav__desktop">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => '',
                        'items_wrap'     => '%3$s',
                        'walker'         => new Foki_Menu_Walker(),
                    ));
                    ?>
                    
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('juego'))); ?>" class="foki-button foki-button--primary foki-button--play">
                        <?php echo esc_html__('¡Jugar!', 'baby-seals'); ?>
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button class="foki-nav__mobile-toggle" id="mobile-menu-button">
                    <?php echo esc_html__('Menú', 'baby-seals'); ?>
                </button>
                
                <!-- Mobile Menu -->
                <div id="mobile-menu" class="foki-nav__mobile">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-mobile-menu',
                        'container'      => '',
                        'items_wrap'     => '%3$s',
                        'walker'         => new Foki_Mobile_Menu_Walker(),
                    ));
                    ?>
                    
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('juego'))); ?>" class="foki-button foki-button--primary foki-button--play-mobile">
                        <?php echo esc_html__('¡Jugar!', 'baby-seals'); ?>
                    </a>
                </div>
            </nav>
        </div>
    </foki-header>
