<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Template Name: Juego
 */

include 'header.php';
?>

<foki-main class="foki-main">
    <foki-section class="foki-game-header">
        <div class="foki-game-header__container">
            <h1 class="foki-game-header__title"><?php echo esc_html__('Baby Seal Jump!', 'baby-seals'); ?></h1>
            <p class="foki-game-header__description">
                <?php echo esc_html__('¡Ayuda a nuestra adorable foca bebé a saltar sobre los obstáculos! Presiona la barra espaciadora o el botón para saltar.', 'baby-seals'); ?>
            </p>
        </div>
    </foki-section>
    
    <foki-section class="foki-game-content">
        <div class="foki-game-content__container">
            <?php echo do_shortcode('[baby-seal-game]'); ?>
            
            <div class="foki-game-instructions">
                <h2 class="foki-game-instructions__title">
                    <?php echo esc_html__('Instrucciones del Juego', 'baby-seals'); ?>
                </h2>
                
                <ul class="foki-game-instructions__list">
                    <li>
                        <span class="foki-game-instructions__icon">🎮</span>
                        <span><?php echo esc_html__('Utiliza la barra espaciadora o el botón de saltar para hacer que la foca salte sobre los obstáculos.', 'baby-seals'); ?></span>
                    </li>
                    <li>
                        <span class="foki-game-instructions__icon">🏆</span>
                        <span><?php echo esc_html__('La puntuación aumenta por cada obstáculo que logres esquivar.', 'baby-seals'); ?></span>
                    </li>
                    <li>
                        <span class="foki-game-instructions__icon">🚀</span>
                        <span><?php echo esc_html__('La velocidad del juego aumenta gradualmente para hacerlo más desafiante.', 'baby-seals'); ?></span>
                    </li>
                    <li>
                        <span class="foki-game-instructions__icon">💾</span>
                        <span><?php echo esc_html__('Tu puntuación más alta se guarda localmente en tu navegador.', 'baby-seals'); ?></span>
                    </li>
                </ul>
                
                <div class="foki-game-instructions__buttons">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="foki-button foki-button--outline">
                        <?php echo esc_html__('Volver al inicio', 'baby-seals'); ?>
                    </a>
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('historia'))); ?>" class="foki-button foki-button--primary">
                        <?php echo esc_html__('Conoce nuestra historia', 'baby-seals'); ?>
                    </a>
                </div>
            </div>
        </div>
    </foki-section>
</foki-main>

<?php
include 'footer.php';
?>
