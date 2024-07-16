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


    <?php
    function display_area_content($area)
    {
        if ($area) {
            $src = isset($area['imagen']['sizes']['medium_large']) ? $area['imagen']['sizes']['medium_large'] : '';
            $text = isset($area['text']) ? $area['text'] : '';
    ?>
            <div class="area">
                <img src="<?php echo esc_attr($src); ?>" alt="Imagen <?php echo esc_attr($text); ?>">
                <p><?php echo esc_html($text); ?></p>
            </div>
    <?php
        }
    }

    $i = 1;
    while ($area = get_field('area_' . $i)) {
        display_area_content($area);
        $i++;
    }
    ?>




</section>

<main class="contenedor seccion">
    <h2 class="text-center text-primary title">Nuestras clases</h2>
    <?php gymfitness_lista_clases(4); ?>
    <div class="contenedor-boton">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('clases'))); ?>" class="boton boton-primario">Ver todas las clases</a>
    </div>
</main>

<?php
get_footer();
?>