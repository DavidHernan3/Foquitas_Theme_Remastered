<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Template Name: Historia
 *
 * @package Baby_Seals_Joyride
 */

get_header();
?>

<foki-main class="foki-main">
    <foki-section class="foki-page-header">
        <div class="foki-page-header__container">
            <h1 class="foki-page-header__title"><?php echo esc_html__('Nuestra Historia', 'baby-seals'); ?></h1>
            <p class="foki-page-header__description">
                <?php echo esc_html__('Descubre cómo comenzó nuestra aventura con las focas bebés', 'baby-seals'); ?>
            </p>
        </div>
    </foki-section>

    <foki-section class="foki-history">
        <div class="foki-history__container">
            <div class="foki-history__timeline">
                <div class="foki-history__item">
                    <div class="foki-history__year">2020</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('Los inicios', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Todo comenzó con una simple idea: crear experiencias digitales que transmitieran la misma alegría y ternura que nos provocan las focas bebés. Un equipo de desarrolladores apasionados se unió para dar vida a este concepto.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
                
                <div class="foki-history__item">
                    <div class="foki-history__year">2021</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('Primer prototipo', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Desarrollamos el primer prototipo del juego Baby Seal Jump. Las pruebas iniciales mostraron resultados prometedores, con usuarios que quedaban encantados con la ternura de nuestra foca protagonista.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
                
                <div class="foki-history__item">
                    <div class="foki-history__year">2022</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('Expansión del equipo', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Nuestro equipo creció significativamente. Diseñadores, desarrolladores y especialistas en marketing se unieron a nuestra misión de llevar la alegría de las focas bebés a todo el mundo.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
                
                <div class="foki-history__item">
                    <div class="foki-history__year">2023</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('Lanzamiento oficial', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Lanzamos oficialmente Baby Seals Joyride, recibiendo una respuesta increíblemente positiva. Usuarios de todas las edades disfrutaron de nuestro juego y la experiencia que ofrecemos.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
                
                <div class="foki-history__item">
                    <div class="foki-history__year">2024</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('Expansión a Europa', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Comenzamos nuestra expansión por Europa, centrándonos especialmente en España y el sur del continente. Abrimos una nueva oficina en Madrid para coordinar nuestras operaciones europeas.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
                
                <div class="foki-history__item">
                    <div class="foki-history__year">2025</div>
                    <div class="foki-history__content">
                        <h2 class="foki-history__title"><?php echo esc_html__('El futuro', 'baby-seals'); ?></h2>
                        <p class="foki-history__text">
                            <?php echo esc_html__('Seguimos creciendo y expandiendo nuestros horizontes. Estamos desarrollando nuevos juegos y experiencias que mantendrán vivo el espíritu de las adorables focas bebés en el mundo digital.', 'baby-seals'); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </foki-section>
</foki-main>

<?php
get_footer();
?>
