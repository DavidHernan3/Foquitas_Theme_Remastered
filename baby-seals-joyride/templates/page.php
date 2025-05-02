
<?php
/**
 * @DavidHernan3 - Equipo Los Boquerones
 * 
 * The template for displaying all pages
 */

include 'header.php';

$post = get_post();
?>

<foki-main class="foki-main">
    <foki-page>
        <div class="foki-page__container">
            <h1 class="foki-page__title"><?php echo esc_html($post->post_title); ?></h1>
            
            <div class="foki-page__content">
                <?php echo apply_filters('the_content', $post->post_content); ?>
            </div>
        </div>
    </foki-page>
</foki-main>

<?php
include 'footer.php';
?>
