
<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * The template for displaying the footer
 *
 * @package Baby_Seals_Joyride
 */
?>

    <foki-footer class="foki-footer">
        <div class="foki-footer__container">
            <div class="foki-footer__grid">
                <div class="foki-footer__col">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="foki-footer__logo">
                        <span class="foki-footer__logo-emoji">🦭</span>
                        <span class="foki-footer__logo-text"><?php bloginfo('name'); ?></span>
                    </a>
                    <p class="foki-footer__description">
                        <?php echo esc_html__('Un proyecto divertido y colorido inspirado en la naturaleza polar y nuestros amigos las focas bebés.', 'baby-seals'); ?>
                    </p>
                </div>
                
                <div class="foki-footer__col">
                    <h3 class="foki-footer__heading"><?php echo esc_html__('Enlaces', 'baby-seals'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => '',
                        'menu_class'     => 'foki-footer__menu',
                        'walker'         => new Foki_Footer_Menu_Walker(),
                    ));
                    ?>
                </div>
                
                <div class="foki-footer__col">
                    <h3 class="foki-footer__heading"><?php echo esc_html__('Contacto', 'baby-seals'); ?></h3>
                    <ul class="foki-footer__contact">
                        <li>
                            <span><?php echo esc_html__('Email:', 'baby-seals'); ?></span> info@crazymaraca.com
                        </li>
                        <li>
                            <span><?php echo esc_html__('Teléfono:', 'baby-seals'); ?></span> +34 123 456 789
                        </li>
                        <li>
                            <span><?php echo esc_html__('Dirección:', 'baby-seals'); ?></span> Calle de la Foca 123, Madrid, España
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="foki-footer__bottom">
                <p class="foki-footer__copyright">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo esc_html__('Todos los derechos reservados.', 'baby-seals'); ?>
                </p>
                <div class="foki-footer__credit">
                    <span><?php echo esc_html__('Desarrollado por', 'baby-seals'); ?></span>
                    <strong>@DavidHernan3 - Equipo Los Boquerones</strong>
                </div>
            </div>
        </div>
    </foki-footer>

</div><!-- #foki-page -->

<?php foki_footer(); ?>

</body>
</html>
