<!-- Head -->
<?php
get_header();
?>
<main class="seccion contenedor">
    <!-- WordPress Loop -->
    <ul class="listado-grid">
        <?php
        while (have_posts()) {
        
            the_post();
            get_template_part('template-parts/blog');
        };
        ?>
    </ul>

</main>

<?php
get_footer();
?>