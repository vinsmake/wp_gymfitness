<?php
/* 
Template Name: Listado de Clases
*/
?>

<!-- Header -->
<?php
get_header();
?>

<!-- WordPress Loop -->
<main class="seccion contenedor">

    <?php
    get_template_part('template-parts/pagina');
    ?>

    <ui class="listado-grid">


        <?php

        $args = array(
            'post_type' => 'gymfitness_clases'
        );

        $clases = new WP_Query($args);

        while ($clases->have_posts()) {
            $clases->the_post();

        ?> <!-- args -->

            <li class="card">
                <?php the_post_thumbnail() ?>
                <div class="contenido">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>

                    <?php
                    $hora_inicio = get_field('hora_inicio');
                    $hora_fin = get_field('hora_fin');
                    ?>

                    <p><?php the_field('dias_clase');
                        echo " - " . $hora_inicio . " a " . $hora_fin; ?></p>
                </div> <!-- the title -->
            </li>
        <?php
        }
        wp_reset_postdata();
        ?> <!-- end while, reset postdata -->


    </ui>
</main>

<?php
get_footer();
?>