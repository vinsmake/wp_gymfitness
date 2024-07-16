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

    <?php 
    gymfitness_lista_clases();
    ?>

    
</main>

<?php
get_footer();
?>