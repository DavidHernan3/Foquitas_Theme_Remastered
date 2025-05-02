
<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * Template Name: Visión
 */

include 'header.php';
?>

<foki-main class="foki-main">
    <foki-section class="foki-page-header">
        <div class="foki-page-header__container">
            <h1 class="foki-page-header__title"><?php echo esc_html__('Nuestra Visión', 'baby-seals'); ?></h1>
            <p class="foki-page-header__description">
                <?php echo esc_html__('Hacia dónde nos dirigimos y qué queremos lograr', 'baby-seals'); ?>
            </p>
        </div>
    </foki-section>

    <foki-section class="foki-vision">
        <div class="foki-vision__container">
            <div class="foki-vision__content">
                <h2 class="foki-vision__subtitle"><?php echo esc_html__('Nuestra misión', 'baby-seals'); ?></h2>
                <p class="foki-vision__text">
                    <?php echo esc_html__('Nuestra misión es crear experiencias digitales que transmitan alegría, ternura y diversión, inspiradas en la naturaleza y los animales más adorables del planeta. Queremos que cada interacción con nuestros productos deje una sonrisa en el rostro de nuestros usuarios.', 'baby-seals'); ?>
                </p>
                
                <div class="foki-vision__image">
                    <span class="foki-vision__emoji">🦭</span>
                </div>
                
                <h2 class="foki-vision__subtitle"><?php echo esc_html__('Nuestros valores', 'baby-seals'); ?></h2>
                <ul class="foki-vision__values">
                    <li>
                        <span>✨</span>
                        <div>
                            <h3><?php echo esc_html__('Creatividad', 'baby-seals'); ?></h3>
                            <p><?php echo esc_html__('Buscamos constantemente ideas innovadoras que nos permitan crear productos únicos y memorables.', 'baby-seals'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span>❤️</span>
                        <div>
                            <h3><?php echo esc_html__('Empatía', 'baby-seals'); ?></h3>
                            <p><?php echo esc_html__('Nos ponemos en el lugar de nuestros usuarios para entender sus necesidades y deseos.', 'baby-seals'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span>🌱</span>
                        <div>
                            <h3><?php echo esc_html__('Sostenibilidad', 'baby-seals'); ?></h3>
                            <p><?php echo esc_html__('Nos comprometemos con prácticas empresariales responsables y sostenibles.', 'baby-seals'); ?></p>
                        </div>
                    </li>
                    <li>
                        <span>🔍</span>
                        <div>
                            <h3><?php echo esc_html__('Calidad', 'baby-seals'); ?></h3>
                            <p><?php echo esc_html__('Nos esforzamos por ofrecer productos de la más alta calidad en todos los aspectos.', 'baby-seals'); ?></p>
                        </div>
                    </li>
                </ul>
                
                <h2 class="foki-vision__subtitle"><?php echo esc_html__('Hacia el futuro', 'baby-seals'); ?></h2>
                <p class="foki-vision__text">
                    <?php echo esc_html__('En los próximos años, planeamos expandir nuestra presencia global, comenzando por Europa y luego el resto del mundo. Estamos desarrollando nuevos juegos y experiencias interactivas que mantendrán vivo el espíritu de Baby Seals Joyride, siempre con el objetivo de brindar momentos de alegría y diversión a nuestros usuarios.', 'baby-seals'); ?>
                </p>
                <p class="foki-vision__text">
                    <?php echo esc_html__('También estamos comprometidos con la responsabilidad social. Una parte de nuestros beneficios se destina a organizaciones dedicadas a la conservación de focas y otros animales marinos en peligro.', 'baby-seals'); ?>
                </p>
            </div>
        </div>
    </foki-section>
</foki-main>

<?php
include 'footer.php';
?>
