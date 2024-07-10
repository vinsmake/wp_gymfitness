<?php
get_header();
?>

<main class="contenedor seccion con-sidebar">
    <sections class="contenido-principal">
        <?php
        get_template_part('template-parts/pagina');
        ?>
    </sections>
    <aside>
        <h2>sidebar</h2>
    </aside>
</main>

<?php 
    get_footer();
?>