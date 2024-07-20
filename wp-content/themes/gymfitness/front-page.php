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

<section class="contenedor seccion">
    <h2 class="text-center text-primary title">Nuestros intrusctores</h2>
    <p class="text-center">Instructores que te ayudaran en tu camino.</p>
    <?php gymfitness_instructores(); ?>
</section>

<section class="testimoniales">
    <h2 class="text-center text-blanco title">Testimonios</h2>
    <div class="contenedor_testimoniales swiper">
        <?php gymfitness_testimoniales(); ?>
    </div>
</section>

<section class="contenedor section">
<h2 class="text-center text-primary title">Nuestro blog</h2>
<p class="text-center">Aprende con ayuda de nuestros instructores.</p>
<ul class="listado-grid">
    <?php 
        $args = array(
            'post_type' => 'post',
            'post_per_page' => 4
        );
        $blog = new WP_Query($args);
        while($blog->have_posts()) {
            $blog->the_post();
            get_template_part('template-parts/blog');
        }
        wp_reset_postdata();

    ?>
</ul>
</section>

<?php
get_footer();
?>