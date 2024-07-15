<?php
get_header();
?>

<section class="bienvenida contenedor seccion text-center">
    <h2 class="text-primary title">
        <?php the_field('encabezado'); ?>
    </h2>
    <p><?php the_field('encabezado_leyenda'); ?></p>
</section>

<section class="areas">
    <div class="area">
        <?php
        $area1 = get_field('area_1');

        $src = $area1['imagen']['sizes']['medium_large'];

        $text = $area1['text'];
        ?>

        <img src="<?php echo esc_attr($src); ?>" alt="Imagen <?php echo esc_attr($area1['text']); ?>">
        <p><?php echo esc_html($text); ?></p>

    </div>
</section>

<main class="contenedor seccion">

</main>

<?php
get_footer();
?>