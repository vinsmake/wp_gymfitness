<?php
get_header();
?>

<main class="contenedor seccion con-sidebar">
    <sections class="contenido-principal">
        <?php
        get_template_part('template-parts/clase');
        ?>
    </sections>

    <?php 
        get_sidebar('aside');
    ?>

</main>

<?php 
    get_footer();
?>