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