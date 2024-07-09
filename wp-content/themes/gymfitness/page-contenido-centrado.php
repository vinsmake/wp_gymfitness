<?php
/* 
Template Name: Contenido Centrado (no sidebar)
*/
?>

<!-- Header -->
<?php
get_header();
?>

<!-- WordPress Loop -->
<main class="seccion contenido-centrado">
    <?php
    get_template_part('template-parts/pagina');
    ?>

</main>

<?php 
    get_footer();
?>

