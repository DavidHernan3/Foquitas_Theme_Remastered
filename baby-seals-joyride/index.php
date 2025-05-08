<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * The main template file
 *
 * @package Baby_Seals_Joyride
 */

get_header();
?>

<foki-main class="foki-main">
    <foki-section class="foki-hero">
        <div class="foki-hero__container">
            <h1 class="foki-hero__title">
                <span class="foki-hero__subtitle"><?php echo esc_html__('Bienvenido a', 'baby-seals'); ?></span>
                <?php echo esc_html__('Baby Seals Joyride', 'baby-seals'); ?>
            </h1>
            <p class="foki-hero__description">
                <?php echo esc_html__('Un tema divertido y colorido inspirado en las focas bebés.', 'baby-seals'); ?>
            </p>
            <div class="foki-hero__buttons">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('historia'))); ?>" class="foki-button foki-button--outline">
                    <?php echo esc_html__('Nuestra Historia', 'baby-seals'); ?>
                </a>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('juego'))); ?>" class="foki-button foki-button--primary">
                    <?php echo esc_html__('¡Jugar Ahora!', 'baby-seals'); ?>
                </a>
            </div>
            <div class="foki-hero__image">
                <span class="foki-hero__emoji">🦭</span>
            </div>
        </div>
    </foki-section>

    <foki-section class="foki-features">
        <div class="foki-features__container">
            <h2 class="foki-section__title">
                <?php echo esc_html__('Características', 'baby-seals'); ?> <span><?php echo esc_html__('Destacadas', 'baby-seals'); ?></span>
            </h2>
            
            <div class="foki-features__grid">
                <div class="foki-feature">
                    <div class="foki-feature__icon">🦭</div>
                    <h3 class="foki-feature__title"><?php echo esc_html__('Diseño Adorable', 'baby-seals'); ?></h3>
                    <p class="foki-feature__description"><?php echo esc_html__('Interfaz visualmente atractiva inspirada en bebés focas.', 'baby-seals'); ?></p>
                </div>
                
                <div class="foki-feature">
                    <div class="foki-feature__icon">🎮</div>
                    <h3 class="foki-feature__title"><?php echo esc_html__('Minijuego Divertido', 'baby-seals'); ?></h3>
                    <p class="foki-feature__description"><?php echo esc_html__('¡Juega con Baby Seal Jump y consigue la mejor puntuación!', 'baby-seals'); ?></p>
                </div>
                
                <div class="foki-feature">
                    <div class="foki-feature__icon">🌍</div>
                    <h3 class="foki-feature__title"><?php echo esc_html__('Expansión Europea', 'baby-seals'); ?></h3>
                    <p class="foki-feature__description"><?php echo esc_html__('Centrados en España y el Sur de Europa.', 'baby-seals'); ?></p>
                </div>
                
                <div class="foki-feature">
                    <div class="foki-feature__icon">✨</div>
                    <h3 class="foki-feature__title"><?php echo esc_html__('Efectos Especiales', 'baby-seals'); ?></h3>
                    <p class="foki-feature__description"><?php echo esc_html__('Disfruta de explosiones de emojis en cada clic.', 'baby-seals'); ?></p>
                </div>
            </div>
        </div>
    </foki-section>
    
    <foki-section class="foki-cta">
        <div class="foki-cta__container">
            <h2 class="foki-cta__title">
                <?php echo esc_html__('¿Listo para', 'baby-seals'); ?> <span><?php echo esc_html__('Jugar?', 'baby-seals'); ?></span>
            </h2>
            <p class="foki-cta__description">
                <?php echo esc_html__('Prueba nuestro divertido minijuego Baby Seal Jump y compite por el mejor puntaje.', 'baby-seals'); ?>
            </p>
            
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('juego'))); ?>" class="foki-button foki-button--primary foki-button--large">
                <?php echo esc_html__('¡Jugar Ahora!', 'baby-seals'); ?>
            </a>
        </div>
    </foki-section>
</foki-main>

<?php
get_footer();
?>
